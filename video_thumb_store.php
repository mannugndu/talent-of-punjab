<?php
$con=mysqli_connect("localhost","tpunjab","PuNjab1305","talentedpunjab");
$video_id=$_POST['vid_id'];
$fileName = $_FILES["thumb"]["name"]; // The file name
$fileName = strtolower($fileName);
$ext = pathinfo($fileName,PATHINFO_EXTENSION);
$fileNameinfolder=$video_id.".".$ext;
$fileTmpLoc = $_FILES["thumb"]["tmp_name"]; // File in the PHP tmp folder
if (!$fileTmpLoc) { // if file not chosen
    	echo "failed to upload try again";
}
else
{
if($ext=="png")
{
if(move_uploaded_file($fileTmpLoc, "video_thumbs/$fileNameinfolder"))
{	mysqli_query($con,"update top_videos set verified='ok' where v_id='$video_id'");
	    echo "Upload is completed";
		echo "<script> window.location.href='video_thumb_verify.php'; </script>";
}
}
else
{
	echo "choose png file";
}
}	


?>