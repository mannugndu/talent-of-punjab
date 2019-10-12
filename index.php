<?php
session_start();
$_SESSION['store_cat_a']="null";
$_SESSION['store_cat_v']="null";
$_SESSION['store_cat_p']="null";
$con=mysqli_connect("localhost","tpunjab","PuNjab1305","talentedpunjab");
//deleting empty records
   
   //deleting unauthorised users
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
	
if($_SESSION['login_check']==1)
{
	header("location:user_home.php");
}
else
{
	
	
	
	//SELECT * FROM `top_videos` order by v_id desc limit 3
	
	$query_videos=mysqli_query($con,"SELECT * FROM top_videos where verified='ok' order by v_id desc limit 4");
	$query_photos=mysqli_query($con,"SELECT * FROM top_photos order by p_id desc limit 4");
	$query_audios=mysqli_query($con,"SELECT * FROM top_audios order by a_id desc limit 4");
	$query_quotes=mysqli_query($con,"SELECT * FROM top_quotes order by q_id desc limit 4");

	
	
	?>

<!doctype html>
<html>
<head>

 

<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<title>
punjabi talent talent of punjab
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
 <link rel="stylesheet" href="css/feedback_slide_css.css">
 <script src="lib/jquery.min.js"></script>
<script> 
$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideToggle("slow,swing");
    });
});


function send_feedback()
{
	var mobile=document.slide_feedback.phone.value;
	var mail=document.slide_feedback.e_mail.value;
    var feedback=document.slide_feedback.data.value;

var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
 
 xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		if(xmlhttp.responseText=="posted")
		{
			document.slide_feedback.data.value="";
			document.slide_feedback.e_mail.value="";
			document.slide_feedback.phone.value="";
			posted();
		}
		else
		{
		
		}
		
	}
  };
  
   xmlhttp.open("GET","feedback_thru_jquery.php?fed_data="+feedback+"&fed_phone="+mobile+"&fed_mail="+mail,true);
     xmlhttp.send();

}
function posted()
{
	$("#div1").fadeIn("fast");
	$("#div1").fadeOut(1000);
	$("#panel").slideToggle(2000,"linear");

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
			<div class="content_heading">Videos</div><br>
			<ul id="contents">
			<?php
			while($fetch_videos=mysqli_fetch_array($query_videos))
			{	?>
			<li>
			<a href="video_detail.php?v_id=<?php echo $fetch_videos[v_id];?>">
			<img src="images/video_thumb4.png" width="120" height="100" style="position:absolute;z-index:1;">
			<img src="video_thumbs/<?php echo $fetch_videos[v_id].".png"; ?>" width="120" height="100" >
			</a>
			</li>
			<?php 
			}
			?>
			<li>
			<a href="videos.php?category=mix"><img id="more_button" src="images/more1.png" width="100" height="100"></a>
			</li>
			
			</ul>
			
			<hr class="style18">
			<div class="content_heading">Photos</div><br>
			
			<ul id="contents">
			<?php
			while($fetch_photos=mysqli_fetch_array($query_photos))
			{	?>
			<li style="display:inline;">
			<a href="photo_detail.php?p_id=<?php echo $fetch_photos[p_id]; ?>"><img src="photo_thumbs/<?php echo $fetch_photos[name]; ?>" width="120" height="100">
			</a>
			</li>
			<?php 
			}
			?>
			<li>
			<a href="photos.php?category=mix"><img id="more_button" src="images/more1.png" width="100" height="100"></a>
			</li>
			</ul>
			
			
			
			<hr class="style18">
			<div class="content_heading">Audios</div><br>
			
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
			?>
			<li>
			<a href="audios.php?category=mix"><img id="more_button" src="images/more1.png" width="100" height="100"></a>
			</li>
			
			</ul>
			
			
			<hr class="style18">
			<div class="content_heading">Quotes</div><br>
			
			
			
			
			
			
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
			?>
			<li>
			<a href="quotes.php?category=mix">
			<img id="more_button" src="images/more1.png" width="100" height="100"></a>
			</li>
			
			</ul>
			
			
			
			
			
			
			
			
			</div>
			</div>
		
        <div class="col-md-2">
		
<!--  other buttons  -->		
		
		    <div class="other_buttons">
			<ul>
			<li><a href="upload_step1.php"><i class="fa fa-upload"></i>&nbsp;<strong>UPLOAD&nbsp;&nbsp;</strong></a></li>
			<li>
			
			
			
			<a href="login.php"><i class="fa fa-sign-in"></i>&nbsp;<strong>&nbsp;&nbsp;Log In&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
			
			</li>
			<li><a href="reg.php"><i class="fa fa-registered"></i>&nbsp;<strong>Register&nbsp;&nbsp;&nbsp;&nbsp;</strong></a></li>
			<li><a href="about.php"><i class="fa fa-newspaper-o"></i>&nbsp;<strong>About Us&nbsp;&nbsp;</strong></a></li>
			<li><a href="feedback.php"><i class="fa fa-commenting"></i>&nbsp;<strong>Suggestion</strong></a></li>
			<li><a href="contact.php"><i class="fa fa-phone"></i>&nbsp;<strong>Contact Us&nbsp;</strong></a></li>
			</ul>
			</div>
			
		


		<div id="slide_container">
<div id="flip">Feedback</div>
<div id="panel">
<div id="div1" style="border:2px solid #3300b2;border-radius:20px;color:white;font-weight:bold;font-size:1.6em;padding:20px;display:none;background:linear-gradient(#d1d1ff,#3300b2,#d1d1ff);position:absolute;z-index:7;width:150px;top:90px;margin-left:50px;margin-top:20px;" align="center">
SENT
</div>
<form name="slide_feedback">
<table>
<tr>
<td id="feedback_text">
Enter E-mail:
</td>
</tr>
<tr>
<td>
<input type="text" name="e_mail" placeholder="abc@example.com" style="width:250px;height:30px;border-radius:5px;color:#3300b2;font-size:1em;text-align:center">
</td>
</tr>
<tr>
<tr>
<td id="feedback_text">
Mobile(optional):
</td>
</tr>
<td>
<input type="text" name="phone" style="width:250px;height:30px;border-radius:5px;color:#3300b2;font-size:1em;text-align:center">
</td>
</tr>
<tr>
<td id="feedback_text">
Write here:
</td>
</tr>
<tr>
<td>
<textarea rows="3" cols="25" name="data" style="border-radius:5px;color:#3300b2;font-size:1.2em;font-weight:bold;"></textarea>
</td>
</tr>
<tr>
<td>
<div align="center" style="background:linear-gradient(#800000,#4d0000);padding:3px;width:50%;margin:auto;color:white;font-weight:bold;font-size:1.2em;border-radius:5px;cursor:pointer" onclick="send_feedback()">Send</div>
</td>
</tr>
</table>
</form>
</div>
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
?>