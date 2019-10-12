<?php
session_start();
$_SESSION['store_cat_a']="null";
$_SESSION['store_cat_v']="null";
$_SESSION['store_cat_q']="null";
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
$cat=$_GET['category'];
?>
    <div class="row">
        <div class="col-md-2">
            <div class="category_bar">
                     
					 
					 
					 	<div align="center"><ul>
			
			<a href="?category=mix"><li><span style="<?php if($cat=='mix') { echo 'background:#3300b2;color:white;border-radius:5px;padding:2px;'; } ?>">
			Mix</span>
			</li>
			</a>
			<a href="?category=art">
			<li><span style="<?php if($cat=='art') { echo 'background:#3300b2;color:white;border-radius:5px;padding:2px;'; } ?>">
			Art</span>
			</li>
			</a>
			
			<a href="?category=funny">
			<li><span style="<?php if($cat=='funny') { echo 'background:#3300b2;color:white;border-radius:5px;padding:2px;'; } ?>">
			Funny</span>
			</li>
			</a>
			
			<a href="?category=quotes">
			<li><span style="<?php if($cat=='quotes') { echo 'background:#3300b2;color:white;border-radius:5px;padding:2px;'; } ?>">
			Quotes
			</span>
			</li>
			</a>
			
			<a href="?category=nature">
			<li><span style="<?php if($cat=='nature') { echo 'background:#3300b2;color:white;border-radius:5px;padding:2px;'; } ?>">
			Nature
			</span>
			</li>
			</a>
			<a href="?category=wallpaper">
			<li><span style="<?php if($cat=='wallpaper') { echo 'background:#3300b2;color:white;border-radius:5px;padding:2px;'; } ?>">
			Wallpapers</span>
			</li>
			</a>
			<a href="?category=other">
			<li><span style="<?php if($cat=='other') { echo 'background:#3300b2;color:white;border-radius:5px;padding:2px;'; } ?>">
			Other</span>
			</li>
			</a>
			
			
			
			</ul>
			</div>
		
					 
					 
					 
					 
					 
					 
					 
			</div>
		</div>
        <div class="col-md-8">
	        <div class="work_area">
			<br>
			
			<div class="active_user">Logged in as:<a href="profile.php" style="color:white"><b><?php echo $current_user; ?></b></a></div>
			
			
	
<?php
$query1=mysql_connect("localhost","tpunjab","PuNjab1305");
mysql_select_db("talentedpunjab",$query1);

if($cat=="mix")
{
$rows=mysql_num_rows(mysql_query("select * from top_photos"));
$_SESSION['store_cat_p']="mix";
}
elseif($cat=="art")
{
$rows=mysql_num_rows(mysql_query("select * from top_photos where category='art'"));
$_SESSION['store_cat_p']="art";
}
elseif($cat=="funny")
{
$rows=mysql_num_rows(mysql_query("select * from top_photos where category='funny'"));
$_SESSION['store_cat_p']="funny";
}
elseif($cat=="quotes")
{
$rows=mysql_num_rows(mysql_query("select * from top_photos where category='quotes'"));
$_SESSION['store_cat_p']="quotes";
}
elseif($cat=="nature")
{
$rows=mysql_num_rows(mysql_query("select * from top_photos where category='nature'"));
$_SESSION['store_cat_p']="nature";
}
elseif($cat=="wallpaper")
{
$rows=mysql_num_rows(mysql_query("select * from top_photos where category='wallpaper'"));
$_SESSION['store_cat_p']="wallpaper";
}
elseif($cat=="other")
{
$rows=mysql_num_rows(mysql_query("select * from top_photos where category='other'"));
$_SESSION['store_cat_p']="other";
} 
else
{
	$rows=mysql_num_rows(mysql_query("select * from top_photos"));
}
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
if($cat=="mix")
{
$query=mysql_query("select * from top_photos LIMIT $start, $limit");
}
elseif($cat=="art")
{
	$query=mysql_query("select * from top_photos where category='art' LIMIT $start, $limit");
}
elseif($cat=="funny")
{
	$query=mysql_query("select * from top_photos where category='funny' LIMIT $start, $limit");
}
elseif($cat=="quotes")
{
	$query=mysql_query("select * from top_photos where category='quotes' LIMIT $start, $limit");
}
elseif($cat=="nature")
{
	$query=mysql_query("select * from top_photos where category='nature' LIMIT $start, $limit");
}
elseif($cat=="wallpaper")
{
	$query=mysql_query("select * from top_photos where category='wallpaper' LIMIT $start, $limit");
}
elseif($cat=="other")
{
	$query=mysql_query("select * from top_photos where category='other' LIMIT $start, $limit");
}
else
{
	$query=mysql_query("select * from top_photos LIMIT $start, $limit");
}


?>
<table>
<?php
while($query2=mysql_fetch_array($query))
{
?>
<tr>
			<td>
			<a href="photo_detail.php?p_id=<?php echo $query2[p_id];?>">
			
			<img src="photo_thumbs\<?php echo $query2[name]; ?>" width="130" height="120">
			</a>
			</td>
			<td>
<div style="padding-left:7px;color:#0000b3">
<a href="photo_detail.php?p_id=<?php echo $query2[p_id];?>">
<b style="color:#3300b2;text-decoration:underline">
<?php echo $query2[title]; ?>
</b>
</a>
<br>
<?php echo "size: ".$query2[size]." kb"; ?>
<br>
cat.-<a href="photos.php?category=<?php echo $query2[category]; ?>">
<?php echo $query2[category]; ?>
</a>
<p style="font-size:12px;">
By:-<a href="user_info.php?usr_id=<?php echo $query2[user_id]; ?>" style="color:#3300b2;"><?php echo $query2[user_id]; ?></a>
</p>			
</div>
			</td>
			</tr><tr><td>&nbsp;</td></tr>
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
$cat_store=$_SESSION["store_cat_p"];
if($id>1)
{
	?>
	<a href="?id=<?php echo ($id-1) ; ?>&category=<?php echo $cat_store; ?>"" style="background:#3300b2;padding:5px 20px 5px 20px;margin:15px;border-radius:15px;font-weight:bold;color:white">BACK</a>
<?php
}
if($id!=$total&&$total>1)
{
	if($id==0)
	{
		$id=1;
	}
	?>
	<a href="?id=<?php echo ($id+1) ; ?>&category=<?php echo $cat_store; ?>"" style="background:#3300b2;padding:5px 20px 5px 20px;margin:15px;border-radius:15px;font-weight:bold;color:white">NEXT</a>
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
			<li><?php
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
			?></li>
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