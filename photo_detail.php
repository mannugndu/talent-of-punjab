<?php 
session_start();
$con=mysqli_connect("localhost","tpunjab","PuNjab1305","talentedpunjab");
$id=$_GET['p_id'];
$qu=mysqli_query($con,"select * from top_photos where p_id='$id'");
$row=mysqli_fetch_array($qu);
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
<head><link rel="shortcut icon" type="image/x-icon" href="favicon.ico"><title>
photos punjabitalent talent of punjab
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
			<br><hr class="style18">
			<div align="center" style="background:#d1d1ff;border-radius:10px;padding-top:10px;">
			<table>
			<tr>
			<td>
               <div class="box">
				    <img class="img-responsive" src="photo_thumbs\<?php echo $row[name]; ?>" alt="photo" width=250>
                </div>	
             </td>
			 </tr>
			  <tr><td>&nbsp;</td>
			 </tr>
			 <tr>
			 <td>
			
			 <div style="color:#3300b2;font-size:20px" align="center">
			 <?php echo $row[title];?>
			 </div>
			 </td>
			 </tr>
			 
 <tr>
			 <td>
<div style="color:#3300b2;font-size:15px" align="center">
			 Uploaded by:<a href="user_info.php?usr_id=<?php echo $row[user_id];?>" style="color:#3300b2;font-weight:bold"><?php echo $row[user_id];?></a>
			 </div>
			 </td>
			 </tr>
 <tr><td>&nbsp;</td>
			 </tr>			 
<tr>
			 <td align="center">
			<a style="text-decoration:none" href="photos/<?php echo $row[name];?>">
			 <div align="center" style="margin:auto;color:white;font-weight:bold;font-size:20px;padding:5px;width:200px;background:#003300;cursor:pointer;border-radius:5px">
			 Download
			 </div>
			 </a>
			 </td>
			 </tr>
			 <tr>
			 <td>
			 
			 </td>
			 </tr>
			 <tr>
			 <td>
			 <div align="center" style="padding-top:10px;color:#3300b2;">
			 More Features are coming soon..
			 </div>
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