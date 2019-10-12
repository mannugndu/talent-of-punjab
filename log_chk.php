<?php
session_start();
$u_id=$_POST['user_id'];
$ps=$_POST['user_pswd'];
$con=mysqli_connect("localhost","tpunjab","PuNjab1305","talentedpunjab");
$query=mysqli_query($con,"select id from top_users where user_id='$u_id' and password='$ps'");
$fetched=mysqli_fetch_array($query);
if(empty($fetched))
{
	header("location:login.php?err=2");
}
else
{
	$_SESSION['login_check']=1;
	$_SESSION['login_active_id']=$fetched['id'];
    header("location:user_home.php");
}
?>