<?php
session_start();
if($_SESSION['registered']==1)
{
	$_SESSION['registered']=-1;
$current_user=$_GET['new_user'];
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
 
 <script language="javascript">
function enter_detect(e)
{
	if(e.keyCode==13)
	{
		
		match_code();
	}
}
function validate_code(evt) 
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
function code_length_check()
{
	var code_length=document.verification_form.code.value;
	if(code_length=="")
	{
		document.getElementById("code_err").style.visibility="visible";
	}
	else
	{
		document.getElementById("code_err").style.visibility="hidden";
	}
}

function match_code()
{
	code_length_check();
	if(document.getElementById("code_err").style.visibility=="hidden")
	{
var code=document.verification_form.code.value;
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
    {document.getElementById("avail_wait_btn").style.visibility="hidden";
		if(xmlhttp.responseText=="available")
		{
  
			document.getElementById('verify_text').style.color="green";
			document.getElementById('verify_text').innerHTML="Successfully Verified. You can upload your stuff now";
			document.getElementById("verified").style.visibility="visible";
			document.getElementById("mobile_logo").style.visibility="hidden";
			document.getElementById("instruction").innerHTML="<a href='index.php' style='color:#3300b2'>Go to home page</a>";
			document.getElementById('button_changer').innerHTML="<a href='index.php' style='color:white'><div>HOME</div></a>"
			
		}
		else
		{

			document.getElementById('verify_text').style.color="red";
			document.getElementById('verify_text').innerHTML="Wrong code (try again)";
			document.getElementById("verified").style.visibility="hidden";
			document.getElementById("mobile_logo").style.visibility="hidden";
		    document.getElementById("button_changer").innerHTML="<div onclick='match_code()'>Verify</div>";
		}
	}
  };
  document.getElementById("avail_wait_btn").style.visibility="visible";
   xmlhttp.open("GET","verification_code_check.php?v_code="+code,true);
     xmlhttp.send();

	 }
}










function code_generator()
{
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
		if(xmlhttp.responseText=="available")
		{
			
		}
		
	}
  };
  
   xmlhttp.open("GET","http://203.129.203.243/blank/sms/user/urlsmstemp.php?username=kcgarh&pass=khalsa&senderid=KCGARH&dest_mobileno=<?php echo $_SESSION["verification_number"]; ?>&%20tempid=29105&F1=<?php echo $_SESSION["verification_code"]; ?>&f2=a&f3=a&f4=a&f5=a&f6=a&f7=a&f8=a&f9=a&f10=a&f11=a&f12=a&f13=a&f14=a&f15=a&f16=a&f17=a&f18=a&f19=a&f20=atesting%20message&response=Y",true);
     xmlhttp.send();


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
			
<div style="font-size:20px;color:#3300B2;" align="center">Welcome <b><?php echo $current_user; ?></b></div>
				
			<hr class="style18">	
				
				
				<div style="padding:2px;color:#3300b2;text-decoration:underline">Just One more Step to go:</div>
				
				
				
				
				

<div align="center" style="background-color:#d1d1ff;color:green;border-radius:10px;padding-top:50px;padding-bottom:50px;width:100%">
            <form method="get" action="" name="verification_form">
			<span>
			<span id="verified" style="visibility:hidden;"><img src="images/verified_thumb.png" width=50 height=40></span>
			<span id="mobile_logo" style="visibility:visible"><!--<img src="images/mobile_thumb.png" width=30 height=40>--></span>
			</span>
			<div id="verify_text" style="font-size:1.2em;font-weight:bold">Enter this code in the box to verify</div>

<div id="instruction" style="width=50%;text-align:center;color:#3300b2;word-wrap:break-word;font-size:1.2em;padding:10px;"><?php echo $_SESSION["verification_code"]; ?>
<div style="visibility:visible;margin:auto;visibility:hidden;" id="avail_wait_btn" align="center"><img src="images/wait_loader.gif" width="18" height="18">			
</div>
</div>
			<span id="code_err" style="color:red;visibility:hidden">Enter code here</span>
			<div>
			<input name="code" type="text" maxlength="5" style="height:40px;width:40%;text-align:center;color:#3300b2;font-weight:bold;font-size:1.6em;border-radius:20px;border:2px solid #3300b2;" onkeypress="validate_code(event)">
            </div>
			<br>
			
			<div id="button_changer" style="background:linear-gradient(#3300b2,#00004d);width:25%;padding:8px;border-radius:20px;font-size:1.2em;color:white;cursor:pointer;">
			<div onclick="match_code()">Verify</div>
			</div>
			
			
			</form>	<!--<div align="center"> 
				<ul style="list-style:none;color:red;font-weight:bold;">
				<li>&nbsp;
				</li>
				<li>Please do not reload the page.
				</li>
				<li>Process may take 1-2 minutes to deliever the message.
				</li>
				</ul>
				</div>	-->
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
			<li><a href="about.php"><i class="fa fa-newspaper-o"></i>&nbsp;<strong>About Us&nbsp;&nbsp;&nbsp;</strong></a></li>
			<li><a href="feedback.php"><i class="fa fa-commenting"></i>&nbsp;<strong>Suggestion</strong></a></li>
			<li><a href="contact.php"><i class="fa fa-phone"></i>&nbsp;<strong>Contact Us</strong></a></li>
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
	$_SESSION["registered"]=-1;
	header("location:reg.php");
}
?>
