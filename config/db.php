<?php

  $curr_db = "task_manager";
  $conn = mysqli_connect("localhost","root","",$curr_db);

  if (mysqli_connect_errno()) {
    die("DB connection failed!");
  } 
?>
