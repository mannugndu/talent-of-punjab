<?php
session_start();
$con=mysqli_connect("localhost","tpunjab","PuNjab1305","talentedpunjab");
$quote=$_POST["quote"];
if($_SESSION['login_check']==1)
{
	if($_SESSION['from_step3']==1&&!empty($quote))
	{
		$_SESSION['from_step3']=-1;
		$fetch_q_info_query=mysqli_query($con,"select q_id,title from top_quotes where q_id=(select MAX(q_id) from top_quotes)");
		$fetch_q_info=mysqli_fetch_array($fetch_q_info_query);
		$title=$fetch_q_info[title];
		$q_id=$fetch_q_info[q_id];
		$fileName=$title.$q_id;
		echo $name;
		$myfile=fopen("quotes/$fileName.txt","w");
		fwrite($myfile,$quote);
		fclose($myfile);
		mysqli_query($con,"update top_quotes set name='$fileName' where q_id='$q_id'");	
?>
<!doctype html>
<html>
<head><link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
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
			<ul class="progress-indicator">
 <li class="completed">
 <span class="bubble"></span>Step 1. </li> 
<li class="completed">
 <span class="bubble"></span> Step 2. </li>
 <li class="completed">  <span class="bubble"></span>Step 3.</li> 
 <li class="completed">  <span class="bubble"></span>Finish</li> 
 </ul>
 
 
 <?php
        $fetch_q_info_query=mysqli_query($con,"select name from top_quotes where q_id=(select MAX(q_id) from top_quotes)");
		$fetch_q_info=mysqli_fetch_array($fetch_q_info_query);
        $fileName_read_nm=$fetch_q_info[name]; 
		$myfile_read=fopen("quotes/$fileName_read_nm.txt","r");
?>
		
		<table align="center">
		<tr>
		<td>
		<div align="center" id="fields"><i class="fa fa-check-circle-o"></i>&nbsp;&nbsp;&nbsp;posted</div>
        </td>
		</tr>
		<tr>
		<td>
		<div style="background:#e5e5ff;padding:5px;border-radius:10px;word-wrap:break-word;width:200px;text-align:left;">
				<?php
		echo fread($myfile_read,filesize("quotes/$fileName_read_nm.txt"));
		fclose($myfile_read);
		?>
		</div>
        
        </td>
</tr>
<tr>
<td>
<a href="user_home.php" style="text-decoration:none"><div id="click_button" align="center">
Home</div></a>
</td>
</tr>
</table>		
				
 
			
			
			
			
			
			<ul class="progress-indicator">
 <li class="completed">
 <span class="bubble"></span>Step 1. </li> 
<li class="completed">
 <span class="bubble"></span> Step 2. </li>
 <li class="completed">  <span class="bubble"></span>Step 3.</li> 
 <li class="completed">  <span class="bubble"></span>Finish</li> 
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
			<li><a href="#"><i class="fa fa-newspaper-o"></i>&nbsp;<strong>About Us&nbsp;&nbsp;</strong></a></li>
			<li><a href="#"><i class="fa fa-commenting"></i>&nbsp;<strong>Suggestion</strong></a></li>
			<li><a href="#"><i class="fa fa-phone"></i>&nbsp;<strong>Contact Us&nbsp;</strong></a></li>
			</ul>
			</div>
	    </div>
	</div>

</body>
</html>
<?php
	}
	else
	{
	$_SESSION['from_step3']=-1;
	$prev_name=mysqli_query($con,"select name from top_quotes where q_id=(select MAX(q_id) from top_quotes)");
    $fetched_name=mysqli_fetch_array($prev_name);
	$name=$fetched_name[name];
	if(empty($name))
	{
	mysqli_query($con,"delete from top_quotes where name=''");
	}
	
		header("location:upload_step1.php");
	}
}
			else
			{
				header("location:login.php?err=1");
			}
			?>