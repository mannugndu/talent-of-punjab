<?php
$g=$_GET['un'];
$con=mysqli_connect("localhost","tpunjab","PuNjab1305","talentedpunjab");
$v_id=$_GET['v_id'];
$qu=mysqli_query($con,"select * from top_users where user_id='$g'");
$row=mysqli_fetch_array($qu);
if(empty($row))
{
	echo "available";
}
else
{
	echo "not available";
}
?>