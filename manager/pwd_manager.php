<?php
require_once(dirname(__FILE__) .'/common_functions.php');
require_once(dirname(__FILE__,2) .'/config/config.php');
require_once(dirname(__FILE__,2) .'/config/db.php');


use PHPMailer\PHPMailer;
use PHPMailer\SMTP;
use PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer as PHPMailerPHPMailer;


require_once(dirname(__FILE__,2).'/vendor/phpmailer/phpmailer/src/Exception.php');
require_once(dirname(__FILE__,2).'/vendor/phpmailer/phpmailer/src/PHPMailer.php');
require_once(dirname(__FILE__,2).'/vendor/phpmailer/phpmailer/src/SMTP.php');

//-----------------------------
date_default_timezone_set('UTC');
$entry_time = (new DateTime())->format('d-m-Y h:i A');
header('Content-Type: application/json');

if (isset($_POST)) {
	$POSTJ = json_decode(file_get_contents('php://input'),true);

	if(isset($POSTJ['action_type'])){
		if ($POSTJ['action_type'] == "send_pwd_reset")
			sendPwdReset($conn, $POSTJ);
		if ($POSTJ['action_type'] == "do_change_pwd")
			doChangePwd($conn, $POSTJ);
	}
}
else
	die();

//-----------------------------

function sendPwdReset($conn, &$POSTJ){
	$email = $POSTJ['email'];
	if(isUserExist($conn, $email)==1){

		if(sendNewReset($conn, $email)==1){
			$new_token = md5(uniqid(rand(), true));
			$curr_time = time();
			$stmt = $conn->prepare("UPDATE users SET token=?, token_time=? WHERE email=?");
			$stmt->bind_param('sss', $new_token,$curr_time,$email);
			$stmt->execute();
			initResetMail($conn,$new_token,$email);
		}else{	
			$stmt = $conn->prepare("SELECT token FROM users WHERE email = ?");
			$stmt->bind_param("s", $email);
			$stmt->execute();
			$result = $stmt->get_result()->fetch_assoc();
			initResetMail($conn,$result['token'],$email);
		}

		echo json_encode(['result' => 'success','msg'=>'We will send you reset password link ! Thank You']);	     //send success irrespectively.
	}else{
		echo json_encode(['result' => 'error','msg'=>"Email Does'nt Exist!"]);	     //send success irrespectively.
	}

	
}

function isUserExist($conn, $email){
	$stmt = $conn->prepare("SELECT token_time FROM users WHERE email = ?");
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$result = $stmt->get_result();
	if($result->num_rows > 0)
		return true;
	else
		return false;
}

function sendNewReset($conn, $email){
	$stmt = $conn->prepare("SELECT token,token_time FROM users WHERE email = ?");
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$result = $stmt->get_result()->fetch_assoc();
	if(empty($result['token']) || $result['token_time'] + 86400*2 < time()) //>2 days ==> expired
		return true;
	else
		return false;		
}

function initResetMail($conn, $token, $email){

		$msg='
		<!DOCTYPE html>
		<html lang="en">
			<head>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<title>Document</title>
			</head>
			<body  marginheight="0" marginwidth="0" rightmargin="0" topmargin="0">
				<table bgcolor="#f9f9f9"  border="0" cellspacing="0" cellpadding="0" align="center" style="width:100%; margin:0;">
					<tbody>
						<tr>
						<td>
							<table bgcolor="#fff"   border="0" cellspacing="0" cellpadding="0" align="center" style="max-width:650px; width:100%; margin:0px auto;">
								<tbody>
									<tr>
									<td>
										<table bgcolor="#fff" border="0" cellspacing="0" cellpadding="0" align="center" style="max-width:650px; width:100%; margin:0px auto;">
											<tbody>
											
												<tr>
												<td bgcolor="#ffc000" height="10"></td>
												</tr>
												<tr>
												<td>
													
													<table  bgcolor="#ffc000"  align="center"  border="0" cellspacing="0" cellpadding="0" style="max-width:650px ; width: 100%;  display: table; text-align: center;"  >
														<tr>
															
															<td bgcolor="#fff" height="50"></td>
															
														</tr>
													</table>
													<table   align="center"  border="0" cellspacing="0" cellpadding="0" style="max-width:600px;"  >
														
														<tr>
															<td  style="text-align:left;">
															<p style="font-family:Arial,Helvetica,sans-serif;font-size:15x; ">
															It looks you requested for '.Project_name.' password reset.Click Here
															</p>
															<p style="text-align:center;">
															<b>
															<form action="'.App.'ChangePwd?token='.$token.'" method="POST">
															<input type="hidden" name="token" 
															value="'.$token.'">
															<button class="btn btn-primary" style="text-align:center;" type="submit"> Change Password</button>  
															</form>
															</b>
															</p>

															</td>
														</tr>
													</table>                                       

													<table  align="center"  border="0" cellspacing="0" cellpadding="0" style="max-width:600px; "  >
														
														<tr>
															<td bgcolor="#fff" height="50"></td>
														</tr>
													</table>

												</td>
												</tr>
											</tbody>
										</table>
									</td>
									</tr>

									<tr>
										<td bgcolor="#ffc000" height="10"></td>
									</tr>
									
								</tbody>
							</table>
						</td>
						</tr>
					</tbody>
				</table>
			</body>
		</html>
        ';

	$headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	$mail = new PHPMailerPHPMailer();
	$mail->isSMTP();
	$mail->Host = 'sandbox.smtp.mailtrap.io';
	$mail->SMTPAuth = true;
	$mail->Port = 2525;
	$mail->Username = '4b0a288aa5f005';
	$mail->Password = 'd3dbbc8fc96c12';
	
        // Sender and recipient settings
        $mail->setFrom('mamtajangid.yuany@gmail.com', Project_name);
        $mail->addAddress($email ,'Test');
        $mail->IsHTML(true);
        $mail->Subject = Project_name;
        $mail->Body = $msg;
        $ismailsent = $mail->send();

        if(!$ismailsent) {
			die(json_encode(['error' => 'Mail sending failed!'])); 
          }
}

//-----------------------------------

function doChangePwd($conn, &$POSTJ){
	if(!(isset($POSTJ['new_pwd']) && isset($POSTJ['token'])))
		die(json_encode(['error' => 'Invalid request']));

	$new_pwd_hash = hash("sha256", $POSTJ['new_pwd'], false);
	$token = $POSTJ['token'];

	$stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE token = ?");
	$stmt->bind_param("s", $token);
	$stmt->execute();
	$row = $stmt->get_result()->fetch_row();
	if($row[0] > 0){
		$stmt = $conn->prepare("UPDATE users SET password=?, token=null, token_time=null WHERE token = ?");
		$stmt->bind_param('ss', $new_pwd_hash,$token);
		if ($stmt->execute() === TRUE)
			echo json_encode(['result' => 'success']);
		else 
			echo json_encode(['error' => 'Password change failed!']);	
	}
}
?>