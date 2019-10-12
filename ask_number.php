<?php
session_start();
$user=$_GET['for_user'];
if($_SESSION[login_check]!=1)
{
	header("location:login.php?err=1");
}
else
{
$con=mysqli_connect("localhost","tpunjab","PuNjab1305","talentedpunjab");
$login_active_id=$_SESSION['login_active_id'];
$query_by=mysqli_query($con,"select user_id,phone from top_users where id='$login_active_id'");
$fetched_by=mysqli_fetch_array($query_by);
$user_by=$fetched_by[user_id];
$mobile_by=$fetched_by[phone];
$query_for=mysqli_query($con,"select user_id,phone from top_users where user_id='$user'");
$fetched_for=mysqli_fetch_array($query_for);
$user_for=$fetched_for[user_id];
$mobile_for=$fetched_for[phone];
mysqli_query($con,"insert into top_contact_queries(by_user,by_mobile,for_user,for_mobile) values('$user_by','$mobile_by','$user_for','$mobile_for')");
header("location:user_info.php?usr_id=$user&asked=ok");
}
?>


