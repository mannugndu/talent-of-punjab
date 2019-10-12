<?php
session_start();
$con=mysqli_connect("localhost","tpunjab","PuNjab1305","talentedpunjab");
$login_active_id=$_SESSION['login_active_id'];
$query=mysqli_query($con,"select user_id from top_users where id='$login_active_id'");
$fetched=mysqli_fetch_array($query);
$current_user=$fetched[user_id];
if($current_user=="")
{
	$current_user="Guest";
}
$d_time=date('(j-m-Y) h:m A');
$d_feedback=$_GET['fed_data'];
$d_phone=$_GET['fed_phone'];
$d_email=$_GET['fed_mail'];

if($d_feedback!="")
{
	mysqli_query($con,"insert into top_feedback(feedback,user,phone,email,time)values('$d_feedback','$current_user','$d_phone','$d_email','$d_time')");
	echo "posted";
}

?>