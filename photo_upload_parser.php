<?php
$con=mysqli_connect("localhost","tpunjab","PuNjab1305","talentedpunjab");
$prev_p_id=mysqli_query($con,"select p_id,title from top_photos where p_id=(select MAX(p_id) from top_photos)");
    $fetched_p_id=mysqli_fetch_array($prev_p_id);
	$pho_id=$fetched_p_id[p_id];
	$title=$fetched_p_id[title];
$fileName = $_FILES["file1"]["name"]; // The file name
$fileName = strtolower($fileName);
$ext = pathinfo($fileName,PATHINFO_EXTENSION);
$fileNameinfolder = $pho_id.$title.".jpeg";
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = round($_FILES["file1"]["size"]/1024);
 // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true
if (!$fileTmpLoc) { // if file not chosen
    
    $prev_p_id=mysqli_query($con,"select p_id from top_photos where p_id=(select MAX(p_id) from top_photos)");
    $fetched_p_id=mysqli_fetch_array($prev_p_id);
	$pho_id=$fetched_p_id[p_id];
	mysqli_query($con,"delete from top_photos where name=''");
	echo "failed to upload try again";
}
else
{
if($ext=="jpg"||$ext=="jpeg")
{
	move_uploaded_file($fileTmpLoc, "photos/$fileNameinfolder");
	 $source_photo='photos/'.$fileNameinfolder;
 $dest_photo='photo_thumbs/'.$fileNameinfolder;
 compress_image($source_photo,$dest_photo,10);


	
	mysqli_query($con,"update top_photos set name='$fileNameinfolder',size='$fileSize',extension='$ext' where p_id='$pho_id'");

 echo "Upload is completed";

}
else
{
	$prev_name=mysqli_query($con,"select name,p_id from top_photos where p_id=(select MAX(p_id) from top_photos)");
    $fetched_name=mysqli_fetch_array($prev_name);
	$name=$fetched_name[name];
	$pho_id=$fetched_name[p_id];
	if(empty($name))
	{
	mysqli_query($con,"delete from top_photos where name=''");
	}
	echo "invalid image file (try again)";
}
}	
function compress_image($source_url,$destination_url,$quality)
{

		$image=imagecreatefromjpeg($source_url);
	
	
	imagejpeg($image,$destination_url,$quality);
	//return(0);
}
?>