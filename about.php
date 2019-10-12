<?php
session_start();

$con=mysqli_connect("localhost","tpunjab","PuNjab1305","talentedpunjab");
//$query_videos=mysqli_query($con,"SELECT * FROM top_photos");
$login_active_id=$_SESSION['login_active_id'];
$query=mysqli_query($con,"select user_id from top_users where id='$login_active_id'");
$fetched=mysqli_fetch_array($query);
$current_user=$fetched[user_id];
if($current_user=="")
{
	$current_user="Guest";
}

//inserting feedback into database

if(isset($_POST['e_mail'])&&isset($_POST['feedback_data']))
{
$d_feedback=$_POST['feedback_data'];
$d_phone=$_POST['ph_no'];
$d_email=$_POST['e_mail'];
$d_time=date('(j-m-Y) h:m A');
if($d_feedback!=""&&$d_email!="")
{
mysqli_query($con,"insert into top_feedback(feedback,user,phone,email,time)values('$d_feedback','$current_user','$d_phone','$d_email','$d_time')");
}

}

?>
<!doctype html>
<html>
<head><link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<title>
about talent of punjab
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


<br>

<hr class="style18">
	<center>		
<h2 style="background-color:#d1d1ff;width:50%;border-radius:5px;font-weight:bold" align="center">About Us</h2>			
		</center>
		<div style="color:#3300b2;font-size:1.2em">				
			
			<br>
 		<p style="text-align:justify">The objective of this website is to make the people able to share their talent over the world so that more audience can watch them.
		The users who uploaded their videos on the website can also manage them. They can delete them also. 
		Registered user can edit their profile. They also can get the chance to make their talent as their profession.
		So this website also provides job opportunity for the user. There are following objectives of this website:-
		</p>
		
		
		<ul>	
		<li>Sharing videos, images, audios and quotes.</li>
<li>	Making talented people best in their field.</li>
<li>	Providing a chance to show their creativity.</li>
	<li>Providing user friendly GUI.</li>
	<li>Establishing relationship.</li>
	<li>Increasing Curiosity.</li>
	<li>Inspiring people to do new things to share.</li>
	<li>Delivering innovative ideas of people.</li>
	<li>Verification before displaying data.</li>
	<li>Management of uploaded files/data.</li>
	<li>Categorized display.</li>
</ul>
			</div>	
				
				
				
				
				
				
		    
				
				
				
				
				
				
				
				
				
						
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
