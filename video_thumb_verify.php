<?php
$con=mysqli_connect("localhost","tpunjab","PuNjab1305","talentedpunjab");

$query_videos=mysqli_query($con,"select * from top_videos where verified =''");


?>
<!doctype html>
<html>
<head><link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<style>
table
{
	background:green;

}
table tr{
	background:white;
}
table td
{
	border:2px solid #3300b2;
}
</style>
<script language="javascript">
function submit_form(form_no_parse)
{
	
	var form_no=form_no_parse;
	if(form_no.thumb.value!=""&&confirm("upload thumb"))
		form_no.submit();
	
}
function confirm_delete(vid_id)
{
	var video_id=vid_id;
	if(confirm("are you sure?"))
	{
		
		window.location.href="del_video.php?v_id="+video_id;
	}
}
</script>
</head>
<body background="images/back5.jpg">

<table align="center" style="border:2px solid #3300b2;">
<?php
$sr_counter=1;
$toggle=1;
while($fetched_videos=mysqli_fetch_array($query_videos))
{
?>
<tr>
<td align="center"><b>
<?php
echo $sr_counter.".";

?></b>
</td>
<td align="center">
<img src="images/video_thumb4.png" width="100" height="80">

</td>
<td>
<div style="font-size:15px;">
<?php
echo $fetched_videos['name'];
?>
</td>
<td align="center">
<a href="videos/<?php echo $fetched_videos['name']; ?>">
<input type="button" value="view" style="margin:5px">

</a>
</td>
<td>
<form action="video_thumb_store.php" name="<?php echo "video_thumb_form".$sr_counter;?>" enctype="multipart/form-data" method="post" >
<input type="hidden" name="vid_id" value="<?php echo $fetched_videos['v_id']; ?>">
<input type="file" name="thumb">
<input type="button" value="Go" onclick="submit_form(<?php echo "video_thumb_form".$sr_counter; $sr_counter++; ?>)" style="float:right;padding:5px;">


</form>
</td>
<td align="center">

<input type="button" value="delete" style="margin:20px;" onclick="confirm_delete(<?php echo $fetched_videos['v_id']; ?>)">

</td>
<td align="center">
<?php


echo $fetched_videos['user_id'];


?>
</td>
</tr>

<?php
}
?>

</table>

</body>
</html>