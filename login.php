<?php
session_start();
$_SESSION['login_check']=-1;
$_SESSION['login_active_id']=-1;
$con=mysqli_connect("localhost","tpunjab","PuNjab1305","talentedpunjab");
  //deleting unauthorised users
  mysqli_query($con,"delete from top_users where verified=''");

?>
<!doctype html>
<html>
<head><link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<title>
punjabitalent login
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
		form_chk();
	}
}
function usr_chk()
{
	if(login_form.user_id.value=="")
	{
		document.getElementById("nm_span").style.visibility="visible";
	}
	else
	{
		document.getElementById("nm_span").style.visibility="hidden";
	}
}
function pswd_chk()
{
	
	if(login_form.user_pswd.value=="")
	{
		document.getElementById("pswd_span").style.visibility="visible";
	}
	else
	{
		document.getElementById("pswd_span").style.visibility="hidden";
	}
}
function form_chk()
{
	usr_chk();
	pswd_chk();
	if(document.getElementById("nm_span").style.visibility=="hidden"&&
	   document.getElementById("pswd_span").style.visibility=="hidden")
	   {
		   document.login_form.submit();
	   }
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
			<br>
			<hr class="style18">
			<form action="log_chk.php" method="POST" name="login_form">
			<?php
			$x=$_GET['err'];
			$y=$_GET['prev_user'];
			if($y>0)
			{
				$query=mysqli_query($con,"select user_id from top_users where id='$y'");
                $fetched=mysqli_fetch_array($query);
				?>
				<div style="background-color:#47476b;color:white;text-align:center;	border-radius:25px;letter-spacing:1px;"><b><?php echo $fetched['user_id']; ?> is Logged Out</b></div>
			<?php
			}
			if($x==1)
			{
			?>
			<div style="background-color:#6400e6;color:white;text-align:center;	border-radius:25px;letter-spacing:1px;"><b>You Must LogIn First</b></div>
			<?php
			}
			if($x==2)
			{?>
			<div style="background-color:#cc0000;color:white;text-align:center;	border-radius:25px;"><b>Invalid User ID or Password</b></div>
			<?php
			}
			?>
			<table align="center">
			<tr><td></td><td>
			<div id="nm_span" style="color:red;visibility:hidden;">Enter UserID</div></td>
			</tr>
			<tr><th>
			<span id="fields">User ID:</span></th><td>
			<input type="text" name="user_id" placeholder="enter user id" style="height:30px;border:1.5px solid #3300b2;border-radius:6px;color:#3300b2;font-weight:bold;" onblur="usr_chk()"></td>
			</tr>
			<tr><td></td><td>
			<div id="pswd_span" style="color:red;visibility:hidden;">Enter Password</div></td></tr>
			<tr><th><span id="fields">Password:</span></th>
			<td>
			<input type="password" name="user_pswd" style="height:30px;border:1.5px solid #3300b2;border-radius:6px;color:#3300b2;font-weight:bold;" placeholder="enter password" onblur="pswd_chk()"></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td></td><td>&nbsp;&nbsp;&nbsp;
			<span id="click_button" onclick="form_chk()">
			&nbsp;&nbsp;LogIn&nbsp;&nbsp;</span></td></tr>
			
			</table>
		
			</form>
			<br>

			<hr class="style18">
			<table>
			<tr><td><p style="font-size:17px;color:#3300B2;text-decoration:underline;"><b>Not Registered Yet?<b></p></td>
			</tr>
	         <tr><td>&nbsp;</td></tr>
			<tr><td>			
			<span id="click_button"><a href="reg.php">Register Here</a></span>
			</td></tr>
			</table>
			<hr>
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
			<a href="#"><i class="fa fa-user"></i>&nbsp;<strong>&nbsp;&nbsp;Profile&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
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