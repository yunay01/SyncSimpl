<?php

if (session_status() === PHP_SESSION_NONE) {
   @ob_start();
   session_start();
   session_write_close();	//prevent access denied lock error
}
	//shows if login page is opened before install 
require_once('common_functions.php');
require_once(dirname(__FILE__,2).'/config/db.php');
require_once(dirname(__FILE__,2).'/config/config.php');
date_default_timezone_set('UTC');
$entry_time = (new DateTime())->format('d-m-Y h:i A');
error_reporting(E_ERROR | E_PARSE); //Disable warnings
//-----------------------------

function validateLogin($email,$pwd){	
	global $conn;
	$pwdhash = hash("sha256", $pwd, false);
	$stmt = $conn->prepare("SELECT COUNT(*) FROM users where email='$email' AND password='$pwdhash'");
	// $stmt->bind_param('ss', $email,$pwdhash);
	$stmt->execute();
	$row = $stmt->get_result()->fetch_row();
	if($row[0] > 0){
		return true;
	}
	else
		return false;
}
function getlogindetails($email,$pwd){	
	global $conn;
	$pwdhash = hash("sha256", $pwd, false);
	$stmt = $conn->prepare("SELECT * FROM users where email='$email' AND password='$pwdhash'");
	$stmt->execute();
	$row = $stmt->get_result()->fetch_assoc();
	if(count($row) > 0){
		return $row;
	}
	else
		return false;
}

function isSessionValid($f_redirection=false){	//this check refreshes session expiry
	
	if (isset($_SESSION['email'])) {
		createSession(false,$_SESSION['email']);
		return true;
	}
	else{
		terminateSession($f_redirection); //redirect to home if true
		return false;
	}
}

function createSession($f_regenerate,$email){
	
	unset($_SESSION["email"]);
	unset($_SESSION["user"]);
	session_set_cookie_params([
            'lifetime' => 86400,	//86400=1 day
            'secure' => false,
            'httponly' => true,
            'samesite' => 'Strict'
        ]);

	session_start();
	if($f_regenerate)
		session_regenerate_id(true);

      	$_SESSION['email'] = $email;

	global $conn;
	$email=$_SESSION['email'];
	$stmt = $conn->prepare("SELECT * FROM users where email='$email'");
	$stmt->execute();
	$row = $stmt->get_result()->fetch_row();

	$_SESSION['user'] = $row;
}


function terminateSession($redirection=true){
	session_destroy();

	if($redirection){
		ob_end_clean();   // clear output buffer
		$redirecturl = App;
		header("Location:$redirecturl/welcome.php");
		die();
	}
}




?>