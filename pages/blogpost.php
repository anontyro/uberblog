<?php

include("../header.php");
$post_rs = loadBlogPost();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div id="main-content">
	<div id="blog-content-container">
	<!-- Index list of most recent blog posts-->
		<div id="blog-title">
			<H2><?php echo $post_rs['title']; ?></H2><br>
		</div>
		<div id="blog-sub-head">
		<h4>
		<?php 
			echo strtoupper($post_rs['author']);
			$date = DateTime::createFromFormat('Y-m-d', $post_rs['published']);
			$newDateString = $date->format('d M, Y');
			echo ", ".$newDateString;
		?>
		</h4>
		</div>
		<div id="blog-body">
			<p><?php echo $post_rs['body']; ?></p>
		</div>
	<!-- Index list of most recent blog posts END-->
	</div>
</div>

</body>
<?php include("../footer.php"); ?>
</html>
