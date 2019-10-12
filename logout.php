<?php
session_start();
$login_active=$_SESSION['login_active_id'];
$_SESSION['login_check']=-1;
$_SESSION['login_active_id']=-1;
header("location:login.php?prev_user=$login_active");
?> 
         

