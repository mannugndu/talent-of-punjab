<?php
session_start();
$_SESSION["from_step3"]=1;
$con=mysqli_connect("localhost","tpunjab","PuNjab1305","talentedpunjab");
$title=$_GET["title"];
if($_SESSION['login_check']==1)
{
	if($_SESSION['from_step2']==1&&!empty($title))
	{
		$_SESSION['from_step2']=-1;
		$login_active_id=$_SESSION['login_active_id'];
$upload_time=date('(j-m-Y) h:m A');
$category=$_GET["category"];
$description=$_GET["description"];
$query_user_id=mysqli_query($con,"select user_id from top_users where id='$login_active_id'");
$fetched_user_id=mysqli_fetch_array($query_user_id);
$user_id=$fetched_user_id[user_id];
mysqli_query($con,"insert into top_quotes(title,category,description,user_id,time)values('$title','$category','$description','$user_id','$upload_time')");
$login_active_id=$_SESSION['login_active_id'];
$query=mysqli_query($con,"select user_id from top_users where id='$login_active_id'");
$fetched=mysqli_fetch_array($query);
$current_user=$fetched[user_id];
if($current_user=="")
{
	$current_user="Guest";
}
?>
<!doctype html>
<html>
<head><link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<title>
upload quote
</title>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="lib/bootstrap.min.css">

  <!--
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
-->
<link rel="stylesheet" href="css/home_css.css">
<link rel="stylesheet" href="css/step_bar_css.css">
<script language="javascript">
function quote_check()
{
	if(upload_quote_step3_form.quote.value=="")
	{
		document.getElementById("quote_err").style.visibility="visible";
	}
	else
	{
		document.getElementById("quote_err").style.visibility="hidden";
	}
}
function post_check()
{
	quote_check();
	if(document.getElementById("quote_err").style.visibility=="hidden")
	{
		upload_quote_step3_form.submit();
	}
}
</script>
</head>
<body background="images/back5.jpg">

<!-- including header -->
<?php

include("header.php");

?>
    <div class="row">
        <div class="col-md-2">
            <div class="category_bar">
			
			</div>
		</div>
        <div class="col-md-8">
	        <div class="work_area">
			<div class="active_user">Logged in as:<a href="profile.php" style="color:white"><b><?php echo $current_user; ?></b></a></div>
		<br><br>	<ul class="progress-indicator">
 <li class="completed">
 <span class="bubble"></span>Step 1. <span style="font-size:9px;">(select media)</span></li> 
<li class="completed">
 <span class="bubble"></span> Step 2. <span style="font-size:9px;">(enter info.)</span></li>
 <li class="completed">  <span class="bubble"></span>Step 3.<span style="font-size:9px;">(type quote)</span></li> 
 <li>  <span class="bubble"></span>Finish</li> 
 </ul>
 
 
 
 
 
			<form id="upload_form" name="upload_quote_step3_form" action="quote_upload_parser.php" method="post">
			<table align="center">
            <tr>
			<td>
			
			<div id="fields" align="center">
			<b>Type Your Quote</b></div>

			</td>
			</tr>
			<tr>
			<td>
			<div id="quote_err" style="color:red;font-weight:bold;visibility:hidden">! Enter Quote</div>
			</td>
			</tr>
			<tr>
			<td>
			<div style="background:#3300b2;padding:7px 3px 3px 3px;border-radius:10px">
			<textarea placeholder="type your quote here" rows="6" cols="35" name="quote" style="border-radius:2px;background:#e5eeff" onblur="quote_check()" autofocus></textarea>
			</div>
			</td>
			</tr>
			<tr>
			<td>
			<div id="click_button" align="center" onclick="post_check()">Post</div>
			</td>
			</tr>
			</table>
			</form>
			
			
			<ul class="progress-indicator">
 <li class="completed">
 <span class="bubble"></span>Step 1. <span style="font-size:9px;">(select media)</span></li> 
<li class="completed">
 <span class="bubble"></span> Step 2. <span style="font-size:9px;">(enter info.)</span></li>
 <li class="completed">  <span class="bubble"></span>Step 3.<span style="font-size:9px;">(type quote)</span></li> 
 <li>  <span class="bubble"></span>Finish</li> 
 </ul>


 </div>
			</div>
		
        <div class="col-md-2">
		    <div class="other_buttons">
			<ul>
			<li><a href="upload_step1.php"><i class="fa fa-upload"></i>&nbsp;<strong>UPLOAD&nbsp;&nbsp;</strong></a></li>
			<li>
			<a href="profile.php"><i class="fa fa-user"></i>&nbsp;<strong>&nbsp;&nbsp;Profile&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
			
			</li>
						<li>
			
			<a href="logout.php"><i class="fa fa-power-off"></i>&nbsp;<strong>&nbsp;&nbsp;LogOut&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
			</li>
			<li><a href="about.php"><i class="fa fa-newspaper-o"></i>&nbsp;<strong>About Us&nbsp;&nbsp;</strong></a></li>
			<li><a href="feedback.php"><i class="fa fa-commenting"></i>&nbsp;<strong>Suggestion</strong></a></li>
			<li><a href="contact.php"><i class="fa fa-phone"></i>&nbsp;<strong>Contact Us&nbsp;</strong></a></li>
			</ul>
			</div>
	    </div>
	</div>

</body>
<?php

include ("footer.php");


?>
</html>
<?php
	}
	else
	{
		
	$prev_name=mysqli_query($con,"select name from top_quotes where q_id=(select MAX(q_id) from top_quotes)");
    $fetched_name=mysqli_fetch_array($prev_name);
	$name=$fetched_name[name];
	if(empty($name))
	{
	mysqli_query($con,"delete from top_quotes where name=''");
	}
	$_SESSION['from_step2']=-1;
		header("location:upload_step1.php");
	}
}
			else
			{
				header("location:login.php?err=1");
			}
			?>