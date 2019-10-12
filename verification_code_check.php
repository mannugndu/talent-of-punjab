<?php
session_start();
$con=mysqli_connect("localhost","tpunjab","PuNjab1305","talentedpunjab");
$code_entered=$_GET['v_code'];
$code_to_match=$_SESSION["verification_code"];
if($code_entered==$code_to_match)
{
	//echo "available";
	$query_id=mysqli_query($con,"select * from top_users where id=(select MAX(id) from top_users)");
	$fetched_id=mysqli_fetch_array($query_id);
	$max_id=$fetched_id['id'];
	$_SESSION['login_active_id']=$fetched_id['id'];
	$_SESSION['login_check']=1;
	mysqli_query($con,"update top_users set verified='ok' where id='$max_id'");
	$_SESSION["verification_code"]=-1;
	$_SESSION["verification_number"]="";
	
	echo "available";
	
}
else
{
	echo "not available";
}



?>