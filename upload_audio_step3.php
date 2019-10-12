<?php
session_start();
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
$title=$title;
mysqli_query($con,"insert into top_audios(title,category,description,user_id,time)values('$title','$category','$description','$user_id','$upload_time')");
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
upload song punjabitalent
</title>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="lib/bootstrap.min.css">

  <!--
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
-->
<link rel="stylesheet" href="css/browse_css.css">
<link rel="stylesheet" href="css/home_css.css">
<link rel="stylesheet" href="css/step_bar_css.css">
<script language="javascript">
function enter_detect(e)
{
	if(e.keyCode==13)
	{
		uploadFile();
	}
}
function file_check()
{
	if(upload_video_step3_form.file1.value=="")
	{
		document.getElementById("file_name").innerHTML="";
		document.getElementById("file_err").style.visibility="visible";
		//upload_video_step3_form.file1.focus();
	}
	else
	{
		document.getElementById("file_err").style.visibility="hidden";
		document.getElementById("file_name").innerHTML=upload_video_step3_form.file1.value;
	}
}
 function _(el){
	return document.getElementById(el);
}
function uploadFile()
{
	file_check();
	if(document.getElementById("file_err").style.visibility=="hidden")
	{
				document.getElementById("loading").style.visibility="visible";
document.getElementById("wait_button").innerHTML="<div id='click_button' align='center'>Please wait..</div>";
document.getElementById("p_bar").style.visibility="visible";
document.getElementById("file1").style.visibility="hidden";
	var file = _("file1").files[0];
	// alert(file.name+" | "+file.size+" | "+file.type);
	var formdata = new FormData();
	formdata.append("file1", file);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "audio_upload_parser.php");
	ajax.send(formdata);
    }
}
function progressHandler(event){
	_("loaded_n_total").innerHTML = "Uploaded "+Math.round(event.loaded/1024)+"KB of "+Math.round(event.total/1024)+"KB";
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").value = Math.round(percent);
	_("status").innerHTML = Math.round(percent)+"% uploaded...";
}
function completeHandler(event){
	document.getElementById("loading").style.visibility="hidden";
	document.getElementById("wait_button").innerHTML="<a href='index.php' style='text-decoration:none'><div id='click_button' align='center'>Home</div></a>";
	//document.getElementById("p_bar").style.visibility="hidden";
	document.getElementById("browse").innerHTML=event.target.responseText;
	document.getElementById("finish").setAttribute("class","completed");
	document.getElementById("finish2").setAttribute("class","completed");
}
function errorHandler(event){
	_("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
	_("status").innerHTML = "Upload Aborted";
}
</script>
</head>
<body background="images/back5.jpg" onkeypress="enter_detect(event)">

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
 <span class="bubble"></span>Step 1.<span style="font-size:9px;">(select media)</span> </li> 
<li class="completed">
 <span class="bubble"></span> Step 2.<span style="font-size:9px;">(enter info.)</span> </li>
 <li class="completed">  <span class="bubble"></span>Step 3.<span style="font-size:9px;">(select file)</span></li> 
 <li id="finish">  <span class="bubble"></span>Finish</li> 
 </ul>
			<form id="upload_form" name="upload_video_step3_form" enctype="multipart/form-data" method="post">
			<table align="center">
            <tr>
			<td>
			<div style="margin-left:50px;margin-right:50px">
			<div id="fields" align="center">
			<b>Select file</b></div>
			</div>
			</td>
			</tr>
			<tr>
			<td><div style="color:red" align="center">Extensions alloweded:- .mp3</div>
			</td>
			</tr>
			<tr>
			<td>&nbsp;
			</td>
			</tr>
			<tr>
			<td>
			<div class="browse_background">
			<div class="myLabel" align="center">
            <input type="file" name="file1" id="file1" onchange="file_check()" accept="audio/*">
            <span class="browse" id="browse"><i class="fa fa-folder-open"></i>&nbsp;&nbsp;&nbsp;<b>Browse File</b></span>
            </div>
			<div id="loading" style="position:relative;z-index:1;top:10px;visibility:hidden;" align="center">
			<img src="images/loading3.gif" width=20 height=20>
			</div>
			<div id="file_name" style="margin-top:20px;color:#3300b2" align="center">
			</div>
			<div id="file_err" style="margin-top:10px;color:red;visibility:hidden;" align="center">
			! select file
			</div>
			
			<div align="center" id="p_bar" style="visibility:hidden"><progress id="progressBar" value="0" max="100" style="width:300px;"></progress></div>
			<div id="status" style="color:#c9302c;font-weight:bold" align="center"></div>
			<p id="loaded_n_total" style="color:#3300B2" align="center">&nbsp;</p>
			</div>
			</td></tr>
			<tr>
			<td>&nbsp;
			</td>
			</tr>
			<tr>
			
			<td>
			<div style="margin-left:50px;margin-right:50px">
			<div id="wait_button"><div id="click_button" align="center" onclick="uploadFile()">Upload</div></div>
			</div>
			<hr>
			
            
            </td>
			</tr>
			</table>
			</form>
			<ul class="progress-indicator">
 <li class="completed">
 <span class="bubble"></span>Step 1.<span style="font-size:9px;">(select media)</span> </li> 
<li class="completed">
 <span class="bubble"></span> Step 2.<span style="font-size:9px;">(enter info.)</span> </li>
 <li class="completed">  <span class="bubble"></span>Step 3.<span style="font-size:9px;">(select file)</span></li> 
 <li id="finish2">  <span class="bubble"></span>Finish</li> 
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

<?php

include ("footer.php");


?>
</body>
</html>
<?php
	}
	else
	{
		
	$prev_name=mysqli_query($con,"select name,a_id from top_audios where a_id=(select MAX(a_id) from top_audios)");
    $fetched_name=mysqli_fetch_array($prev_name);
	$name=$fetched_name[name];
	$aud_id=$fetched_name[a_id];
	if(empty($name))
	{
	mysqli_query($con,"delete from top_audios where name=''");
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