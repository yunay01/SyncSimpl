<?php

if (session_status() === PHP_SESSION_NONE) {
   @ob_start();
   session_start();
   session_write_close();	//prevent access denied lock error
}

	//shows if login page is opened before install 
require_once(dirname(__FILE__,2).'/config/config.php');
require_once(dirname(__FILE__,2).'/config/db.php');

date_default_timezone_set('UTC');
$entry_time = (new DateTime())->format('d-m-Y h:i A');
error_reporting(E_ERROR | E_PARSE); //Disable warnings
//-----------------------------

if (isset($_POST)) {
	$POSTJ = json_decode(file_get_contents('php://input'),true);
    $first_name=$POSTJ['first_name'];
    $last_name=$POSTJ['last_name'];
    $email=$POSTJ['email'];
    $pass = hash("sha256", $POSTJ['password'], false);
    $dob=$POSTJ['dob'];
    $terms=$POSTJ['term']=='on'?1:0;
    $user_code=$first_name.$dob;

    $stmt = $conn->prepare("SELECT COUNT(*) FROM users where email='$email'");
	$stmt->execute();
    $row = $stmt->get_result()->fetch_row();
    if($row[0] == 0){
    
        $stmt = $conn->prepare("INSERT INTO `users` ( `first_name`, `last_name`, `password`, `email`, `dob`, `terms`, `user_code`) VALUES ( '$first_name', '$last_name', '$pass', '$email', '$dob','$terms','$user_code')");
        $stmt->execute();

        echo "success";
	}
	else{
        echo 'error';
    }
}
else
	die();








    
        
