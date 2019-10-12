<?php

session_start();
if($_SESSION['login_check']!=1)
{
	header("location:index.php");
}
$_SESSION['store_cat_a']="null";
$_SESSION['store_cat_p']="null";
$con=mysqli_connect("localhost","tpunjab","PuNjab1305","talentedpunjab");
//$query_photos=mysqli_query($con,"SELECT * FROM top_photos");
$login_active_id=$_SESSION['login_active_id'];
$query=mysqli_query($con,"select user_id from top_users where id='$login_active_id'");
$fetched=mysqli_fetch_array($query);
$current_user=$fetched[user_id];
?>
<!doctype html>
<html>
<head><link rel="shortcut icon" type="image/x-icon" href="favicon.ico"><title>
user more photos punjabi talent talent of punjab
</title>
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
			<br>
			<div class="active_user">Logged in as:<a href="profile.php" style="color:white"><b><?php echo $current_user; ?></b></a></div>
			
			
			
			
	
<?php
$query1=mysql_connect("localhost","tpunjab","PuNjab1305");
mysql_select_db("talentedpunjab",$query1);

$rows=mysql_num_rows(mysql_query("select * from top_photos where user_id='$current_user'"));

$limit=4;
$start=$rows-$limit;
if($start<0)
	{
		$start=0;
	}
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$start=$rows-($id*4);
	if($start<0)
	{
		$start=0;
	}
}

	$query=mysql_query("select * from top_photos where user_id='$current_user' LIMIT $start, $limit");


?>
<table>
<?php
while($query2=mysql_fetch_array($query))
{
?>
<tr>
			<td>
			<a href="photo_detail.php?p_id=<?php echo $query2[p_id];?>">
			
			<img src="photo_thumbs\<?php echo $query2[name]; ?>" width="130" height="120" style="border:1px solid grey; margin:1px;">
			</a>
			</td>
			<td><div style="padding-left:7px;color:#0000b3"><b style="color:#3300b2;text-decoration:underline"><?php echo $query2[title]; ?></b><br>
			<?php echo "size: ".$query2[size]." kb"; ?><br>
			<?php echo "cat.-".$query2[category]; ?><br>
			</div>
			</td>
			</tr>
<?php
}
?>
</table>
<div align="center">
<?php

$total=ceil($rows/$limit);
echo "<br><table><tr>";
?>
<td>
<div style="margin:10px;font-size:15px;color:#3300B2;font-weight:bold;" align="center">Current page:<?php
	$cp=$_GET["id"];
	if($cp=="")
	{
		echo 1;
	}
	else
	{
	echo $cp;
	}
	?>
</div>

	</td>
	</tr>
	<tr>
	<td>
<?php

if($id>1)
{
	?>
	<a href="?id=<?php echo ($id-1) ; ?>&category=<?php echo $cat_store; ?>" style="background:#3300b2;padding:5px 20px 5px 20px;margin:15px;border-radius:15px;font-weight:bold;color:white">BACK</a>
<?php
}
if($id!=$total&&$total>1)
{
	if($id==0)
	{
		$id=1;
	}
	?>
	<a href="?id=<?php echo ($id+1) ; ?>&category=<?php echo $cat_store; ?>" style="background:#3300b2;padding:5px 20px 5px 20px;margin:15px;border-radius:15px;font-weight:bold;color:white">NEXT</a>
<?php
	}
?>
</td>
</tr>
<tr>
<td align="center">
<select style="border:1px solid #3300b2;border-radius:10px;margin:10px;width:140px" onchange="window.location.href=this.value;">
<option>Jump to:</option>
<?php
		for($i=1;$i<=$total;$i++)
		{
			if($i==$id)
				
			{ echo "<option value='?id=".$i."&category=".$cat_store."'>".$i."</option>"; }
	

			else 
			{ echo "<option value='?id=".$i."&category=".$cat_store."'>".$i."</option>"; }
		}
		?>
	
	 
	</select>
	</td>
	</tr>

</table>
	</div>		
			<br>
			
			
		
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
			{
			?>
			<a href="logout.php"><i class="fa fa-power-off"></i>&nbsp;<strong>logout&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
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