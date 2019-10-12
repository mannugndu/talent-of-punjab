<?php
$con=mysqli_connect("localhost","tpunjab","PuNjab1305","talentedpunjab");
$prev_v_id=mysqli_query($con,"select v_id,title from top_videos where v_id=(select MAX(v_id) from top_videos)");
    $fetched_v_id=mysqli_fetch_array($prev_v_id);
	$vid_id=$fetched_v_id[v_id];
	$title=$fetched_v_id[title];
	$fileName=$_FILES["file1"]["name"];
	$fileName = strtolower($fileName);
$ext = pathinfo($fileName,PATHINFO_EXTENSION); 
$fileNameinfolder = $vid_id.$title.".".$ext; // The file name
$fileNameinfolder = strtolower($fileNameinfolder);
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = round($_FILES["file1"]["size"]/1024);

 // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true
if (!$fileTmpLoc) { // if file not chosen
    
    $prev_v_id=mysqli_query($con,"select v_id from top_videos where v_id=(select MAX(v_id) from top_videos)");
    $fetched_v_id=mysqli_fetch_array($prev_v_id);
	$vid_id=$fetched_v_id[v_id];
	mysqli_query($con,"delete from top_videos where name=''");
	echo "failed to upload try again";
	exit();
}
else
{
if($ext=="mp4"||$ext=="wmv"||$ext=="avi"||$ext=="mkv"||$ext=="flv"||$ext=="vob"||$ext=="3gp"||$ext=="mov")
{
if(move_uploaded_file($fileTmpLoc, "videos/$fileNameinfolder"))
{
	//testing to find duration
	//$filename_duration="videos".$fileNameinfolder;
	//$getID3=new ID3;
	//$file=$getID3->analyze($filename_duration);
	//echo("Duration:".$file['playtime_string']);
	
	
	
	
	mysqli_query($con,"update top_videos set name='$fileNameinfolder',size='$fileSize',extension='$ext' where v_id='$vid_id'");
    echo "Upload is completed";
	exit();
}
}
else
{
	$prev_name=mysqli_query($con,"select name,v_id from top_videos where v_id=(select MAX(v_id) from top_videos)");
    $fetched_name=mysqli_fetch_array($prev_name);
	$name=$fetched_name[name];
	$vid_id=$fetched_name[v_id];
	if(empty($name))
	{
	mysqli_query($con,"delete from top_videos where name=''");
	}
	echo "invalid video file (try again)";
}
}	
?>