<?php
$usr=$_POST['usernm'];
$pswd=$_POST['pass'];
if($usr!="top_adminin"&&$pswd!="#include<top.h>")
{
header("location:index.php");
}
$con=mysqli_connect("localhost","tpunjab","PuNjab1305","talentedpunjab");

?>

<html>
<head>
<script language="javascript">
function second_verification()
{
var val=prompt("enter second password");
if(val!="#include<talent.h>")
{
location.href="index.php";
}


}
</script>





<style>
.tbl tr td
{
font-size:3em;
padding:20px;
background:green;
}
.tbl tr td a
{
color:white;
}
</style>
</head>

<body style="background:black" onload="second_verification()">

<table class="tbl" align="center">

<tr>
<td>
<a href="video_thumb_verify.php">
<div>video verification</div>
</a>
</td>
</tr>

<tr>
<td>
<a href="admin_all_users.php">
<div>All Users</div>
</a>
</td>
</tr>



<tr>
<td>
<a href="admin_feedback.php">
<div>Feedback</div>
</a>
</td>
</tr>



<tr>
<td>
<a href="admin_contact_req.php">
<div>Contact reqs</div>
</a>
</td>
</tr>
</table>


</body>

</html>