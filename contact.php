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
talent of punjab punjabi talent contact
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

 
 
  <script language="javascript">
 function enter_detect(e)
{
	if(e.keyCode==13)
	{
		form_check();
	}
}

 function phone_check(evt)
 {
 var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }	 
 }
 /*function phone_length_check(phn)
{
	var l=phn.length;
	if(!phn||l<10)
	{
		document.getElementById('phone_err').style.visibility="visible";
	}
	else
	{
		
		document.getElementById('phone_err').style.visibility="hidden";
	}
}*/
 function feedback_data_check()
 {
	var data=feedback_form.feedback_data.value; 
	if(data=="")
	{
		document.getElementById("data_err").style.visibility="visible";
	}
	else
	{
		document.getElementById("data_err").style.visibility="hidden";
	}
		
 }
 function form_check()
 {
	feedback_data_check();
	
	if(document.getElementById("data_err").style.visibility=="hidden")
	   {
		   feedback_form.submit();
	   }
	
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
			
			
			<div class="active_user">Logged in as:<a href="profile.php" style="color:white"><b><?php echo $current_user; ?></b></a></div>


<br>

<hr class="style18">
			
			
			<center>
	<h3 style="background-color:#d1d1ff;width:50%;border-radius:5px;font-weight:bold" align="center">Our Contacts</h2>			
				</center>
				
				
				
				
			<div align="center" style="color:#3300b2;font-size:1.5em">
			
			Manpreet singh<br>
			Khalsa college Garhdiwala<br>
			Mobile :- +91-9592343443<br>
			e-mail:- manjit.galaxy@gmail.com<br>
			Facebook:- facebook.com/manjit.kazal
			
			<div class="c_bubble">
	       <a href="http://www.facebook.com/manjit.kazal" target="_blank"><i class="fa fa-facebook-square"></i></a>
			</div>
			
			</div>
		
		

				
				
				
				
		
		
		
		
		
		
		
		
		
<hr class="style18">
<?php
			if(isset($_POST['e_mail'])&&isset($_POST['feedback_data']))
			{
			?>
			<span style="display:table;margin:0 auto;width:80%;padding:5px;text-align:center;color:#3300b2;word-wrap:break-word;font-size:1.5em;font-weight:bold;border-radius:15px;">Your Feedback is Submitted Successfully.&nbsp;<i class="fa fa-check-circle-o"></i></span>
			<?php
			}
			?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="feedback_form">
			<div style="width=50%;text-align:center;color:#3300b2;word-wrap:break-word;font-size:1.1em;text-decoration:underline">Send us Suggestion/Feedback if you found this website needs any improvement</div>
			<table align="center">
			<tr>
			<td>
			</td>
			<td><span id="mail_err" style="color:#e60000;visibility:hidden">! Invalid e-mail address</span>
			</td>
			</tr>
			<tr><td>
			<div id="fields" align="center" name="e_mail">E-Mail</div></td><td>
			<input type="text" name="e_mail" size="28" placeholder="ex:-example@abc.com" style="height:40px;border-radius:5px;border:1px solid #3300b2"></td>
			</tr>
						<tr>
			<td>
			</td>
			<td><span id="phone_err" style="color:#e60000;visibility:hidden">! Invalid mobile number</span>
			</td>
			</tr>
			<tr><td><div id="fields" align="center">Phone no.</div></td>
			<td>
			<input type="text" name="ph_no" placeholder="  Optional" size="28" maxlength="10" style="height:40px;border-radius:5px;border:1px solid #3300b2" onkeypress="phone_check(event)"></td>
			</tr>
			<tr>
			<td>
			</td>
			<td><span id="data_err" style="color:#e60000;visibility:hidden">! you must write here</span>
			</td>
			</tr>
			<tr><th>
			<div id="fields" align="center">Write Here</div>
			</th>
			<td>
			<textarea rows="5" cols="30" style="border-radius:5px;border:2px solid #3300b2" placeholder="type your text here" name="feedback_data" onblur="feedback_data_check()"></textarea>
			</td>
			</tr>
			<tr><td>&nbsp;
			</td>
			</tr>
			<tr>
			<td></td>
			<?php
			if(isset($_POST['e_mail'])&&isset($_POST['feedback_data']))
			{
			?>
			<td>
			<a href="index.php"><div id="click_button" align="center">
			Home</div></a>
			</td>
			<?php
			}
			else
			{
			?>
			<td>
			<div id="click_button" onclick="form_check()" align="center">
			Submit</div>
			</td>
			<?php
			}
			?>
			</tr>
			</table>
			</form>
			

		
		
		
		
		
			
				
				
				
				
				
				
				
				
						
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
