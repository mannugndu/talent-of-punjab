<?php
session_start();
$_SESSION['from_step1']=2;
$con=mysqli_connect("localhost","tpunjab","PuNjab1305","talentedpunjab");
$session_id=$_SESSION['login_active_id'];

//deleting empty records
    $prev_name=mysqli_query($con,"select name from top_videos where v_id=(select MAX(v_id) from top_videos)");
    $fetched_name=mysqli_fetch_array($prev_name);
	$name=$fetched_name[name];
	if(empty($name))
	{
	mysqli_query($con,"delete from top_videos where name=''");
	}
	
	$prev_p_name=mysqli_query($con,"select name from top_photos where p_id=(select MAX(p_id) from top_photos)");
    $fetched_p_name=mysqli_fetch_array($prev_p_name);
	$name_p=$fetched_p_name[name];
	if(empty($name_p))
	{
	mysqli_query($con,"delete from top_photos where name=''");
	}
	
	$prev_a_name=mysqli_query($con,"select name from top_audios where a_id=(select MAX(a_id) from top_audios)");
    $fetched_a_name=mysqli_fetch_array($prev_a_name);
	$name_a=$fetched_a_name[name];
	if(empty($name_a))
	{
	mysqli_query($con,"delete from top_audios where name=''");
	}
	
	$prev_q_name=mysqli_query($con,"select name from top_quotes where q_id=(select MAX(q_id) from top_quotes)");
    $fetched_q_name=mysqli_fetch_array($prev_q_name);
	$name_q=$fetched_q_name[name];
	if(empty($name_q))
	{
	mysqli_query($con,"delete from top_quotes where name=''");
	}
$login_active_id=$_SESSION['login_active_id'];
$query=mysqli_query($con,"select user_id from top_users where id='$login_active_id'");
$fetched=mysqli_fetch_array($query);
$current_user=$fetched[user_id];
if($current_user=="")
{
	$current_user="Guest";
}
if($_SESSION['login_check']==1)
{
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
<br><br><ul class="progress-indicator">
 <li class="completed">
 <span class="bubble"></span>Step 1.<span style="font-size:9px;">(select media)</span></li> 
<li>
 <span class="bubble"></span> Step 2.<span style="font-size:9px;">(enter info.)</span></li>
 <li>  <span class="bubble"></span>Step 3.<span style="font-size:9px;">(select file)</span></li> 
  <li>  <span class="bubble"></span>Finish</li>
 </ul>
 

 
			<div style="background:#d1d1ff;padding:20px;border-radius:20px;" align="center">
			
			
			
			<div style="width:250px;"><a href="upload_video_step2.php" style="text-decoration:none"><div id="click_button" align="center"><i class="fa fa-video-camera"></i>&nbsp;&nbsp;&nbsp;Video</div></a></div>
			<div style="width:250px;"><a href="upload_audio_step2.php" style="text-decoration:none"><div id="click_button" align="center"><i class="fa fa-music"></i>&nbsp;&nbsp;&nbsp;Audio</div></a></div>
			<div style="width:250px;"><a href="upload_photo_step2.php" style="text-decoration:none"><div id="click_button" align="center"><i class="fa fa-camera-retro"></i>&nbsp;&nbsp;&nbsp;Photo</div></a></div>
			<div style="width:250px;"><a href="upload_quote_step2.php" style="text-decoration:none"><div id="click_button" align="center"><i class="fa fa-pencil-square"></i>&nbsp;&nbsp;&nbsp;Quote</div></a></div>
		    
			
			
			</div>
			<br>
			<ul class="progress-indicator">
 <li class="completed">
 <span class="bubble"></span>Step 1.<span style="font-size:9px;">(select media)</span></li> 
<li>
 <span class="bubble"></span> Step 2.<span style="font-size:9px;">(enter info.)</span></li>
 <li>  <span class="bubble"></span>Step 3.<span style="font-size:9px;">(select file)</span></li> 
  <li>  <span class="bubble"></span>Finish</li>
 </ul>
			</div>
			</div>
		
        <div class="col-md-2">
		    <div class="other_buttons">
			<ul>
			<li><a href="upload.php"><i class="fa fa-upload"></i>&nbsp;<strong>UPLOAD&nbsp;&nbsp;</strong></a></li>
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
			<?php
			if($_SESSION['login_check']==1)
			{?>
			<a href="logout.php"><i class="fa fa-power-off"></i>&nbsp;<strong>&nbsp;&nbsp;LogOut&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
			<?php
			}
			else
			{
			?>
			<a href="reg.php"><i class="fa fa-registered"></i>&nbsp;<strong>Register&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
			<?php
			}
			?>
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
				header("location:login.php?err=1");
			}
			?>