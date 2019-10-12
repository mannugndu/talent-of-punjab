<?php
$con=mysqli_connect("localhost","tpunjab","PuNjab1305","talentedpunjab");
$prev_a_id=mysqli_query($con,"select a_id,title from top_audios where a_id=(select MAX(a_id) from top_audios)");
    $fetched_a_id=mysqli_fetch_array($prev_a_id);
	$aud_id=$fetched_a_id[a_id];
	$title=$fetched_a_id[title];
	$fileName=$_FILES["file1"]["name"];
$ext = pathinfo($fileName,PATHINFO_EXTENSION);
	$fileNameinfolder = $aud_id.$title.".mp3"; // The file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = round($_FILES["file1"]["size"]/1024);
 
 // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true
if (!$fileTmpLoc) { // if file not chosen
    
    $prev_a_id=mysqli_query($con,"select a_id from top_audios where a_id=(select MAX(a_id) from top_audios)");
    $fetched_a_id=mysqli_fetch_array($prev_a_id);
	$aud_id=$fetched_a_id[a_id];
	mysqli_query($con,"delete from top_audios where name=''");
	echo "failed to upload try again";
}
else
{
if($ext=="mp3")
{
if(move_uploaded_file($fileTmpLoc, "audios/$fileNameinfolder"))
{
	
	mysqli_query($con,"update top_audios set name='$fileNameinfolder',size='$fileSize',extension='$ext' where a_id='$aud_id'");
    echo "Upload is completed";
}
}
else
{
	$prev_name=mysqli_query($con,"select name,a_id from top_audios where a_id=(select MAX(a_id) from top_audios)");
    $fetched_name=mysqli_fetch_array($prev_name);
	$name=$fetched_name[name];
	$aud_id=$fetched_name[a_id];
	if(empty($name))
	{
	mysqli_query($con,"delete from top_audios where name=''");
	}
	echo "invalid audio file (try again)";
}
}	
?>