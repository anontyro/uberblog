<?php

include("header.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div id="main-content">
	<!-- Index landing content on the page-->
	<div id="content-container">
		<div id="landing-content">
			<p>
			<?php  landingcontent(); ?>
			</p>
		</div>
	<!-- Index landing content on the page END-->

	<!-- Index list of most recent blog posts-->
		<div id="index-blog-posts">
			<H2>Latest Posts</H2><br>
			<?php 

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

				echo "<p id='body-blog-index'>".substr($blog_rs['body'],0,250)."</p>";
				
				?>
				</div>
				<?php

				$count++;

			}while($blog_rs = mysqli_fetch_assoc($blog_query));
			echo "<br><p>$count total number of posts pulled<p/>";

			 ?>
		</div>
	<!-- Index list of most recent blog posts END-->
	</div>
</div>
</body>
<?php include("footer.php"); ?>
</html>
