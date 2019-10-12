<?php
session_start();
$con=mysqli_connect("localhost","tpunjab","PuNjab1305","talentedpunjab");
$_SESSION['from_step2']=1;
$session_id=$_SESSION['login_active_id'];
if($_SESSION['login_check']==1)
{
	if($_SESSION['from_step1']==2)
	{
		$_SESSION['from_step1']=-1;
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
upload video punjabitalent
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
 <link rel="stylesheet" href="css/cover_browse_button_css.css">
 <script language="javascript">
 function enter_detect(e)
{
	if(e.keyCode==13)
	{
		next_check();
	}
}
 function title_check()
 {
	 if(upload_video_step2_form.title.value=="")
	 {
		 document.getElementById("title_err").style.visibility="visible";
	 }
	 else
	 {
		  document.getElementById("title_err").style.visibility="hidden";
	 }
 }
 function next_check()
 {
	 title_check();
	 if( document.getElementById("title_err").style.visibility=="hidden")
	 {
		 upload_video_step2_form.submit();
	 }
 }
 
 
 
 

 
	



 
 
 

 
 
 

 
 </script>
</head>
<body background="images\back5.jpg" onkeypress="enter_detect(event)">

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
				<br><br>		<ul class="progress-indicator">
 <li class="completed">
 <span class="bubble"></span>Step 1.<span style="font-size:9px;">(select media)</span></li> 
<li class="completed">
 <span class="bubble"></span> Step 2. <span style="font-size:9px;">(enter info.)</span></li>
 <li>  <span class="bubble"></span>Step 3.<span style="font-size:9px;">(select file)</span></li> 
  <li>  <span class="bubble"></span>Finish</li>
 </ul>
			<hr class="style18">
			<div align="center" style="color:#3300b2;text-decoration:underline">Your Video will be displayed by the given title</div>
			<form method="get" action="upload_video_step3.php" name="upload_video_step2_form">
			<table align="center">
			<tr>
			<td>
			</td>
			<td>
			<div id="title_err" style="color:red;visibility:hidden">! enter title</div>
			</td>
			</tr>
			<tr>
			<td>
			<div id="fields" align="center"><b>Title:</b></div></td><td>
			<input type="text" name="title" style="border-radius:10px" onblur="title_check()"></td>
			</tr>
		
			<tr>
			<td>
			<div id="fields" align="center"><b>category:</b></div></td>
			<td><select name="category" style="border-radius:10px;border-color:black;">
			<option value="song">Song</option>
			<option value="talent">Talent</option>
			<option value="innovation">Innovations</option>
			<option value="funny">Funny</option>
			<option value="other" selected>Other</option>
			</select>
			</td>
			</tr>
			<tr>
			<td></td><td>&nbsp;</td>
			</tr>
			<tr>
			<td>
			<div id="fields" align="center"><b>Description:</b></div></td>
			<td><textarea  rows="3" cols="25" name="description" style="border-radius:10px"></textarea></td>
			</tr>
			<tr>
			<td>
			</td>
			<td>
			<div id="click_button" align="center" onclick="next_check()">Next</div>
			</td>
			</tr>
			</table>
			</form>
			<hr class="style18">
			<ul class="progress-indicator">
 <li class="completed">
 <span class="bubble"></span>Step 1.<span style="font-size:9px;">(select media)</span></li> 
<li class="completed">
 <span class="bubble"></span> Step 2. <span style="font-size:9px;">(enter info.)</span></li>
 <li>  <span class="bubble"></span>Step 3.<span style="font-size:9px;">(select file)</span></li> 
  <li>  <span class="bubble"></span>Finish</li>
 </ul>
			</div>
			</div>
		
        <div class="col-md-2">
		    <div class="other_buttons">
			<ul>
			<li><a href="upload_step1.php"><i class="fa fa-upload"></i>&nbsp;<strong>UPLOAD&nbsp;&nbsp;</strong></a></li>
			<li>
			<?php
			if($_SESSION['login_check']==1)
			{
			?>
			<a href="profile.php"><i class="fa fa-user"></i>&nbsp;<strong>&nbsp;&nbsp;Profile&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
			<?php
			}
			else
			{
			?>
			<a href="login.php"><i class="fa fa-sign-in"></i>&nbsp;<strong>&nbsp;&nbsp;Log In&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
			<?php
			}
			?>
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

<?php

include ("footer.php");


?>
</body>
</html>
<?php
	}
	else
	{
			$_SESSION['from_step1']=-1;
			$_SESSION['from_step2']=-1;
		header("location:upload_step1.php");
	}
}
			else
			{
			
				header("location:login.php?err=1");
			}
			?>