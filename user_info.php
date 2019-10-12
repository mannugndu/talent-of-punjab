<?php
session_start();
$con=mysqli_connect("localhost","tpunjab","PuNjab1305","talentedpunjab");
$login_active_id=$_SESSION['login_active_id'];
$query_cu=mysqli_query($con,"select * from top_users where id='$login_active_id'");
$fetched_cu=mysqli_fetch_array($query_cu);
$current_user=$fetched_cu[user_id];
if($current_user=="")
{
	$current_user="Guest";
}
$id=$_GET[usr_id];
$query=mysqli_query($con,"select * from top_users where user_id='$id'");
$fetched=mysqli_fetch_array($query);

?>
<!doctype html>
<html>
<head><link rel="shortcut icon" type="image/x-icon" href="favicon.ico"><title>
profile punjabitalent talent of punjab
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

		
				
				<div align="center" style="margin:auto;width:200px;font-weight:bold;"><div id="fields">User Profile Detail</div></div>
				<hr class="style18">
				
				<div style="background:#d1d1ff;border-radius:10px;">
				<table align="center"> 
				<tr>
				<td>
				<div id="fields">
				Name
				</div>
				</td>
				<td style="font-weight:bold">
				<?php
				echo $fetched['name'];
				
				?>
				</td>
				</tr>
				<tr>
				<td>
				<div id="fields">
				User-ID
				</div>
				</td>
				<td style="font-weight:bold">
				<?php
				echo $fetched['user_id'];
				
				?>
				</td>
				</tr>
				<tr>
				<td>
				<div id="fields">
				Mobile
				</div>
				</td>
				<td style="font-weight:bold">
<?php
$ask=$_GET['asked'];
if($ask=='ok')
{
?>
<div style="background:green;border-radius:5px;color:white;text-align:center">
	Request Sent			
</div>
<?php
}
else
{
?>
<a href="ask_number.php?for_user=<?php echo $fetched['user_id']; ?>">
				<div style="background:#a72825;;color:white;border-radius:5px;text-align:center">Ask For Number</div>
				</a>
<?php
}
?>
				</td>
				</tr>
				<tr>
				<td>
				<div id="fields">
				E-mail
				</div>
				</td>
				<td style="font-weight:bold;font-size:12px">
				<?php
				echo $fetched['email'];
				
				?>
				</td>
				</tr>
				<tr>
				<td>
				<div id="fields">
				State
				</div>
				</td>
				<td style="font-weight:bold;">
				<?php
				echo $fetched['state'];
				
				?>
				</td>
				</tr>
				<tr>
				<td>&nbsp;
				</td>
			
				</tr>
			
				</table>
				</div>
				
				
				
				
				<hr class="style18">
				
				
				
			
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
			<a href="index.php"><i class="fa fa-home"></i>&nbsp;<strong>&nbsp;&nbsp;Home&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
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