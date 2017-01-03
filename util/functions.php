<?php 

//function to read the database and pull the landing content to display on the index page
function landingcontent(){
	include("dbconnect.php");
	$content_sql = "SELECT landingcontent FROM sitecontent WHERE id=1";
	$content_query = mysqli_query($dbconnect, $content_sql);
	$content_rs = mysqli_fetch_assoc($content_query);
	echo $content_rs['landingcontent'];
}

// function to read the database and display the latest six blog posts
function indexPostDisplay(){

			include("dbconnect.php");
			$blog_sql = "SELECT * FROM `blog` WHERE `draft`=0 ORDER BY `published` DESC limit 6";
			$blog_query = mysqli_query($dbconnect, $blog_sql);
			$blog_rs = mysqli_fetch_assoc($blog_query);

			$count = 0;

			do{ ?> 
			<div class='col-md-4' id='index-latest-blogs'>
			<?php
				echo "<img src='$blog_rs[mainimage]' class='img-responsive'/>";
				echo "<h3 id='title-blog-index'>".$blog_rs['title'].'<br></h3>';
				
				echo strtoupper("<p id='author-blog-index'>by ".$blog_rs['author']);
				$date = DateTime::createFromFormat('Y-m-d', $blog_rs['published']);
				$newDateString = $date->format('d M, Y');

				echo ", ".strtoupper($newDateString).'</p>';

				echo "<p id='body-blog-index'>".substr($blog_rs['body'],0,250)."...</p>";
				
				?>
				</div>
				<?php

				$count++;

			}while($blog_rs = mysqli_fetch_assoc($blog_query));
			echo "<br><p>$count total number of posts pulled<p/>";
}


 ?>