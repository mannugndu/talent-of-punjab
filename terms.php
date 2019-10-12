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
talent of punjab punjabi talent terms and conditions
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
	<h3 style="background-color:#d1d1ff;width:50%;border-radius:5px;font-weight:bold" align="center">Terms and Conditions</h2>			
				</center>
				<p style="font-size:1.2em;">
				punjabitalent.com provide a wide range of services like sharing, downloading,uploading of pictures, videos, songs and written quotes together on the same website.
				You should familier with the privacy, safety, protection of data etc. while uploadig the contents on this website.
				the user will be responsible for any dispute/problem if raised by their uploaded data. </p>
				<h4><b>Uploading</b></h4>
				<p style="font-size:1.2em;">
				When you publish contents on punjabitalent.com it means that you are allowing visitors of the website to view and download your contents. So make sure that you 
				will be responsible for your privacy and safety because punjabitalent does not provide any security against your data.<br>
				You can give us feedback/suggestion or contact us if you face any difficulty while uploading, fetching data on this website. We are always available for your service.
				So feel free to share your moments on punjabitalent.com.
				</p>
				<h4><b>Safety</b></h4>
				<p style="font-size:1.2em;">
				We do our best to keep this website safe but we cannot gurantee it because the uploaded contents may hurt someone's feelings. Users are prohibited to post unauthorized data/contents on the website.
				The appropriate actions may be taken if found. Keep the thing in your mind before uploading that you are not intimidate or harass any user/visitor. 
				</p>
				<h4><b>Registration</b></h4>
				<p style="font-size:1.2em;">
				You must provide legal information while creating the account on punjabitalent.com. Provide us legal mobile number of yours in which we will send you a One time password on your number to verify you,
                 your mobile number will be private to you. appropriate names of the files that are going to be uploaded on the website to identify them easily.
				This is forcely recomemded to not share your username and password with anyone who can use your credentials to upload wrong contents on punjabitalent.com, which may take you in the problem.
				
				</p>
				
				
						
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
