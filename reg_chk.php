<?php
session_start();
$con=mysqli_connect("localhost","tpunjab","PuNjab1305","talentedpunjab");
$name=$_POST['f_nm']." ".$_POST['l_nm'];
$gender=$_POST['f_gnd'];
$phone=$_POST['f_no'];
$email=$_POST['f_mail'];
$state=$_POST['f_state'];
$user_id=$_POST['f_id'];
$password=$_POST['f_pswd1'];
$reg_time=date('(j-m-Y) h:m A');
if(!empty($name)&&!empty($gender)&&!empty($phone)&&!empty($email)&&!empty($user_id)&&!empty($password))
{
mysqli_query($con,"insert into top_users(name,gender,phone,email,state,user_id,password,time)values('$name','$gender','$phone','$email','$state','$user_id','$password','$reg_time')");

$query=mysqli_query($con,"select * from top_users where user_id='$user_id' and password='$password'");
$fetched=mysqli_fetch_array($query);
$new_user=$fetched[name];
$_SESSION['registered']=1;
$_SESSION['verification_number']=$phone;
$generated_code=mt_rand(10000,99999);
$_SESSION["verification_code"]=$generated_code;

header("location:reg_after.php?new_user=$new_user");
}
else
{
	$_SESSION['registered']=-1;
	$_SESSION['login_check']=-1;
   header("location:login.php?err=1");		
}
?>