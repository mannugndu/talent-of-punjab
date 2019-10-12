<?php
$video_id=$_GET['v_id'];
$con=mysqli_connect("localhost","tpunjab","PuNjab1305","talentedpunjab");
mysqli_query($con,"delete from top_videos where v_id='$video_id'");
header("location:video_thumb_verify.php");



?>