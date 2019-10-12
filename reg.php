<?php
$con=mysqli_connect("localhost","tpunjab","PuNjab1305","talentedpunjab");
session_start();

  //deleting unauthorised users
  mysqli_query($con,"delete from top_users where verified=''");

if($_SESSION['login_check']==1)
{
	header("location:index.php");
}
?>
<!doctype html>
<html>
<head><link rel="shortcut icon" type="image/x-icon" href="favicon.ico"><title>
signup punjabitalent talent of punjab
</title>
<script>
function enter_detect(e)
{
	if(e.keyCode==13)
	{
		chk_form();
	}
}
function chk_form()
{
	/*if(reg_form.f_nm.value==""&&reg_form.f_gnd.value==""&&reg_form.f_no.value==""&&reg_form.f_mail.value==""&&reg_form.f_id.value==""&&reg_form.f_pswd1.value==""&&reg_form.f_pswd2.value=="")
	{
		document.getElementById('n').style.visibility="visible";
		document.getElementById('g').style.visibility="visible";
		document.getElementById('p').style.visibility="visible";
		document.getElementById('e').style.visibility="visible";
		document.getElementById('uid').style.visibility="visible";
		document.getElementById('ps1').style.visibility="visible";
		document.getElementById('ps2').style.visibility="visible";
	}
	else
	{
		alert("form is going to be submitted");
	}
	*/
	if(reg_form.f_nm.value=="")
	{
		document.getElementById('n').style.visibility="visible";
	}
	if(reg_form.f_gnd.value=="")
	{
		document.getElementById('g').style.visibility="visible";
	}
	if(reg_form.f_no.value=="")
	{
		document.getElementById('p').style.visibility="visible";
	}
	if(reg_form.f_mail.value=="")
	{
		document.getElementById('e').style.visibility="visible";
	}
	if(reg_form.f_id.value=="")
	{
	document.getElementById('uid').style.visibility="visible";	
	}
	if(reg_form.f_pswd1.value=="")
	{
		document.getElementById('ps1').style.visibility="visible";
	}
	if(reg_form.f_pswd2.value=="")
	{
		document.getElementById('ps2').style.visibility="visible";
	}
	var pass1 = reg_form.f_pswd1.value;
	var pass2 = reg_form.f_pswd2.value;
	if(pass1!=pass2)
	{
	 document.getElementById('c').style.visibility="visible";	
	}
	else
	{
		document.getElementById('c').style.visibility="hidden";	
	}
	if(document.getElementById('n').style.visibility=="hidden"&&
		document.getElementById('g').style.visibility=="hidden"&&
		document.getElementById('p').style.visibility=="hidden"&&
		document.getElementById('e').style.visibility=="hidden"&&
		document.getElementById('uid').style.visibility=="hidden"&&
		document.getElementById('ps1').style.visibility=="hidden"&&
		document.getElementById('ps2').style.visibility=="hidden"&&
		document.getElementById('c').style.visibility=="hidden"&&
		document.getElementById('l').style.color=="green"&&
		document.getElementById('availability').style.color=="green")
		{
		document.reg_form.submit();
		}
}
function chk_nm()
{
	if(reg_form.f_nm.value=="")
	{
		document.getElementById('n').style.visibility="visible";
	}
	else
	{
		document.getElementById('n').style.visibility="hidden";
	}
}
function chk_gnd()
{
	if(!reg_form.f_gnd.value)
	{
		document.getElementById('g').style.visibility="visible";
	}
	else
	{
		document.getElementById('g').style.visibility="hidden";
	}
}
function validate(evt) {

  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
 
}
function no_chk(phn)
{
	var l=phn.length;
	if(!phn||l<10)
	{
		document.getElementById('p').style.visibility="visible";
	}
	else
	{
		
		document.getElementById('p').style.visibility="hidden";
	}
}
function checkmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(!regex.test(email))
  {
 document.getElementById('e').style.visibility="visible";
}
else
{
 document.getElementById('e').style.visibility="hidden";
}
}
function chk_uid()
{
	if(!reg_form.f_id.value)
	{
		document.getElementById('uid').style.visibility="visible";
		document.getElementById('availability').style.visibility="hidden";
	}
	else
	{
		document.getElementById('availability').style.visibility="visible";
		document.getElementById('uid').style.visibility="hidden";
	}
}
function chk_pswd1()
{
	var len_p=reg_form.f_pswd1.value;
	if(!reg_form.f_pswd1.value)
	{
		document.getElementById('ps1').style.visibility="visible";  
	}
	else
	{
	document.getElementById('ps1').style.visibility="hidden";	
	}
	if(len_p.length<6)
	{
	 document.getElementById('l').style.color="red";
	}
	else
	{
		document.getElementById('l').style.color="green";
	}
}
function chk_pswd2()
{
	if(!reg_form.f_pswd2.value)
	{
		document.getElementById('ps2').style.visibility="visible";
	}
	else
	{
	document.getElementById('ps2').style.visibility="hidden";	
	}
}
function chk_pass()
{
	var pass1 = reg_form.f_pswd1.value;
	var pass2 = reg_form.f_pswd2.value;
	if(pass1!=pass2)
	{
	 document.getElementById('c').style.visibility="visible";	
	}
	else
	{
		document.getElementById('c').style.visibility="hidden";	
	}
}
function chk_avail(usr)
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
		document.getElementById('availability').innerHTML=xmlhttp.responseText;
		if(xmlhttp.responseText=="available")
		{
                               document.getElementById('uid').style.visibility="hidden";
                               document.getElementById('avail_wait_btn').style.visibility="hidden";
                               document.getElementById('availability').style.visibility="visible";
				document.getElementById('availability').style.color="green";
		}
		else
		{
document.getElementById('availability').style.visibility="visible";
document.getElementById('uid').style.visibility="hidden";
document.getElementById('avail_wait_btn').style.visibility="hidden";
			document.getElementById('availability').style.color="red";
		}
	}
  };
document.getElementById('avail_wait_btn').style.visibility="visible";
xmlhttp.open("GET","chk_avail.php?un="+usr,true);
     xmlhttp.send();
}
</script>
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
			<br>
			<p align="center"><strong style="color:red;text-decoration:underline;background:linear-gradient(transparent,#d1d1ff)">NOTE:- All Fields Are Mandatory</strong></p>
<form method="post" action="reg_chk.php" name="reg_form">
<table align="center">
<tr>
<td><span id="fields"><strong>&nbsp;&nbsp;&nbsp;Name:&nbsp;&nbsp;&nbsp;</strong></span></td>
<td><input type="text" name="f_nm" size="10" placeholder="First Name" onfocusout="chk_nm()">&nbsp;&nbsp;<input type="text" size="10" name="l_nm" placeholder="Last Name">
<span id="n" style="visibility:hidden;position:relative;color:red;">Enter name</span>
</td>
</tr>
<tr><td><br></td></tr>
<tr>
<td>
<span id="fields"><strong>&nbsp;&nbsp;Gender:&nbsp;&nbsp;</strong></span>
</td>
<td>
<input type="radio" name="f_gnd" value="m" onblur="chk_gnd()">Male
<input type="radio" name="f_gnd" value="f" onblur="chk_gnd()">Female<span id="g" style="visibility:hidden;position:relative;color:red;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;select option</span>
</td>
</tr>
<tr><td><br></td></tr>
<tr><td><span id="fields"><strong>&nbsp;&nbsp;&nbsp;Phone:&nbsp;&nbsp;&nbsp;</strong></span></td><td><input type="text" placeholder="10 digit mobile number" maxlength="10" name="f_no" onkeypress="validate(event)" onblur="no_chk(this.value)"><span id="p" style="visibility:hidden;position:relative;color:red;">invalid number</span></td></tr>
<tr><td><br></td></tr>
<tr>
<td><span id="fields"><strong>&nbsp;&nbsp;&nbsp;E-mail:&nbsp;&nbsp;&nbsp;</strong></span></td><td><input type="text" placeholder="e.g:- abc@example.com" name="f_mail" onblur="checkmail(this.value)"> <span id="e" style="visibility:hidden;position:relative;color:red;">invalid email</span></td>
</tr>
<tr><td><br></td></tr>
<tr>
<td><span id="fields"><strong>&nbsp;&nbsp;&nbsp;&nbsp;State:&nbsp;&nbsp;&nbsp;&nbsp;</strong></span></td>
<td><select name="f_state">
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Orissa">Orissa</option>
<option value="Pondicherry">Pondicherry</option>
<option value="Punjab" selected>Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Tripura">Tripura</option>
<option value="Uttaranchal">Uttaranchal</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="West Bengal">West Bengal</option>
</select></td>
</tr>
<tr><td></td><td>
<div style="visibility:visible;position:absolute;visibility:hidden;" id="avail_wait_btn"><img src="images/wait_loader.gif" width="18" height="18">
</div>
<div id="availability" style="position:relative;">&nbsp;</div>

</td></tr>
<tr>
<td>
<span id="fields"><strong>&nbsp;&nbsp;User-ID:&nbsp;&nbsp;</strong></span></td><td><input type="text" name="f_id" maxlength=30 onblur="chk_uid()" onfocusout="chk_avail(this.value)" onkeyup="chk_avail(this.value)"><span id="uid" style="visibility:hidden;position:relative;color:red;">Create UserID</span></td>
</tr>
<tr><td></td><td><span id="l" style="visibility:visible;position:relative;color:green;"><b>Enter Minimum 6 Characters</b></span></td></tr>
<tr>
<td>
<span id="fields"><strong>Password:</strong></span></td><td><input type="password" name="f_pswd1" placeholder="password" onblur="chk_pswd1()"><span id="ps1" style="visibility:hidden;position:relative;color:red;text-style:bold;">Enter Password</span></td></tr>
<tr><td><br></td></tr>
<tr>
<td>
<span id="fields"><strong>&nbsp;&nbsp;Confirm:&nbsp;&nbsp;</strong></span></td><td><input type="password" placeholder="confirm password" name="f_pswd2" onblur="chk_pswd2()" onfocusout="chk_pass()"><span id="ps2" style="visibility:hidden;position:relative;color:red;">Confirm Password</span></td>
</tr>
<tr><td></td><td><span id="c" style="visibility:hidden;position:relative;color:red;"><b>! Password doesn't match</b></span></td></tr>
<tr>
<tr><td>&nbsp;</td></tr>
<td></td>
<td>
<span id="click_button" onclick="chk_form()">&nbsp;&nbsp;Register&nbsp;&nbsp;</span></td>
</tr>
</table>
</form>
<br>
<hr>
<table>
			<tr><td><p style="font-size:17px;color:#3300B2;text-decoration:underline;"><b>Already Registered ?<b></p></td>
			</tr>
	         <tr><td>&nbsp;</td></tr>
			<tr><td>			
			<a href="login.php" style="text-decoration:none"><span id="click_button">Login Here</span></a>
			<?php
			if($_SESSION['login_check']==1)
			{?>
			<span style="font-size:14px;color:#3300B2;letter-spacing:-1px">with another account</span>
            <?php
			}
			?>
			</td></tr>
			</table><hr>
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
			<li><a href="reg.php"><i class="fa fa-registered"></i>&nbsp;<strong>Register&nbsp;&nbsp;&nbsp;&nbsp;</strong></a></li>
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