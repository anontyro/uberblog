<?php 

function landingcontent(){
	include("dbconnect.php");
	$content_sql = "SELECT landingcontent FROM sitecontent WHERE id=1";
	$content_query = mysqli_query($dbconnect, $content_sql);
	$content_rs = mysqli_fetch_assoc($content_query);
	echo $content_rs['landingcontent'];
}


 ?>