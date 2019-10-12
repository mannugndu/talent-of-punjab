<?php
session_start();
$_SESSION['store_cat_a']="null";
$_SESSION['store_cat_v']="null";
$_SESSION['store_cat_p']="null";
$con=mysqli_connect("localhost","tpunjab","PuNjab1305","talentedpunjab");
//deleting empty records

      // deleting unauthorised users
	  mysqli_query($con,"delete from top_users where verified=''");


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
$query_videos=mysqli_query($con,"select * from top_videos where user_id='$current_user' and verified='ok' limit 4");
$query_photos=mysqli_query($con,"select * from top_photos where user_id='$current_user' limit 4");
$query_audios=mysqli_query($con,"select * from top_audios where user_id='$current_user' limit 4");
$query_quotes=mysqli_query($con,"select * from top_quotes where user_id='$current_user' limit 4");
if($_SESSION['login_check']==1)
{
?>
<!doctype html>
<html>
<head><link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="lib/bootstrap.min.css">

  <script src="lib/bootstrap.min.js"></script>
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
			
						<div style="background:linear-gradient(#3300b2,black);color:white;font-weight:bold;width:120px;padding:5px;border-radius:20px;" align="center">
						Your Uploads
						
                      </div><br>
			
			<div class="content_heading">videos</div><br>
			<ul id="contents">
			<?php
			while($fetch_videos=mysqli_fetch_array($query_videos))
			{	?>
			<li>
			<a href="video_detail.php?v_id=<?php echo $fetch_videos[v_id];?>">
			<img src="images/video_thumb4.png" width="120" height="100" style="position:absolute;z-index:1;">
			<img src="video_thumbs/<?php echo $fetch_videos[v_id].".png"; ?>" width="120" height="100">
			</a>
			</li>
			<?php 
			}
			
		$query_videos_chk=mysqli_query($con,"select * from top_videos where user_id='$current_user' and verified='ok'");
		$fetch_videos_chk=mysqli_fetch_array($query_videos_chk);
			?>
			<li>
			<?php
			if(!(empty($fetch_videos_chk[name])))
			{
				?>
			
			<a href="user_more_videos.php">
			<img id="more_button" src="images/more1.png" width="100" height="100">
			</a>
			
			<?php
			}
			else
			{
			?>
			<div class="content_empty">No video uploaded by you</div>
			<?php
			}
			?>
			</li>
			</ul>
			<hr class="style18">
			<div class="content_heading">Photos</div><br>
			
			<ul id="contents">
			<?php
			while($fetch_photos=mysqli_fetch_array($query_photos))
			{	?>
			<li>
			<a href="photo_detail.php?p_id=<?php echo $fetch_photos[p_id]; ?>">
			<img src="photo_thumbs\<?php echo $fetch_photos["name"]; ?>" width="120" height="100"></a>
			</li>
			<?php 
			}
		$query_photos_chk=mysqli_query($con,"select * from top_photos where user_id='$current_user'");
		$fetch_photos_chk=mysqli_fetch_array($query_photos_chk);
			?>
			<li>
			<?php
			if(!(empty($fetch_photos_chk[name])))
			{
				?>
			
			<a href="user_more_photos.php"><img id="more_button" src="images/more1.png" width="100" height="100"></a>
			
			<?php
			}
			else
			{
				?>
			<div class="content_empty">No Photo uploaded by you</div>
			<?php
			}
			?>
			</li>
			</ul>
		
			
			<hr class="style18">
			<div class="content_heading">Audio</div>
			<br>
			
			<ul id="contents">
			<?php
			while($fetch_audios=mysqli_fetch_array($query_audios))
			{	?>
			<li>
			<span>
			<a href="audio_detail.php?a_id=<?php echo $fetch_audios[a_id];?>">
			<span style="position:absolute;z-index:1;color:white;font-size:15px;text-align:center;font-weight:bold;border-radius:10px;width:120px;word-wrap:break-word;background:linear-gradient(black,#1a1a1a);"><?php echo $fetch_audios[title]; ?></span>
			<img src="images/audio_thumb.png" width="120" height="100">
			
			</a>
			</span>
			</li>
			<?php 
			}
		$query_audios_chk=mysqli_query($con,"select * from top_audios where user_id='$current_user'");
		$fetch_audios_chk=mysqli_fetch_array($query_audios_chk);
			?>
			<li>
			<?php
			if(!(empty($fetch_audios_chk[name])))
			{
				?>
			<a href="user_more_audios.php"><img id="more_button" src="images/more1.png" width="100" height="100"></a>
		
			
			<?php   
}				
else
{
	?>
	<div class="content_empty">No Audio uploaded by you</div>
	<?php
}
?>
		</li>			
			
			</ul>
			<hr class="style18">
			<div class="content_heading">Quotes</div>
			
			
			
			
			
			<ul id="contents">
			<?php
			while($fetch_quotes=mysqli_fetch_array($query_quotes))
			{	?>
			<li>		
		   <a href="quote_detail.php?q_id=<?php echo $fetch_quotes[q_id];?>" style="text-decoration:none;color:#3300b2">
			<div style="padding:5px;display:inline-block;height:100px;width:160px;overflow:hidden;">
            <div style="background:#dcdcdc;width:150px;word-wrap:break-word;border-radius:5px;box-shadow:0px 4px 8px 0px black;">
			<?php
			$fileName_read_nm=$fetch_quotes[name]; 
		    $myfile_read=fopen("quotes/$fileName_read_nm.txt","r");  
			echo fread($myfile_read,filesize("quotes/$fileName_read_nm.txt"));
			
		    fclose($myfile_read);
			?>
			</div>
			</div>
			</a>
			
			</li>
			<?php 
			}
		$query_quotes_chk=mysqli_query($con,"select * from top_quotes where user_id='$current_user'");
		$fetch_quotes_chk=mysqli_fetch_array($query_quotes_chk);
			?>
			<li>
			<?php
			if(!(empty($fetch_quotes_chk[name])))
			{
				?>
			<a href="user_more_quotes.php"><img id="more_button" src="images/more1.png" width="100" height="100"></a>
		
			
			<?php   
}				
else
{
	?>
	<div class="content_empty">No Quote uploaded by you</div>
	<?php
}
?>
		</li>			
			
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
	include("footer.php");
	
	?>
</body>
</html>
<?php
}
else
{
	header("location:index.php");
}
?>