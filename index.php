<?php 
require_once(dirname(__FILE__).'/manager/session_manager.php');
require_once(dirname(__FILE__).'/config/config.php');
isSessionValid(true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(dirname(__FILE__).'/components/header.php'); ?>
</head>
<body class="form" align="center">
    <div>
      <p><b>Welcome <?php echo $_SESSION['email'];?></b></p>
      <a href="logout.php" >Log Out</a>
    </div>
    <?php include(dirname(__FILE__).'/components/script.php'); ?>
</body>
</html>