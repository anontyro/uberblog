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
		<div class="row">
			<div id="landing-image" class="col-md-4">
				<img src="assets/images/blog/default.jpeg" class="img-responsive"/>
			</div>
			<div id="landing-content" class="col-md-8">
				<p>
				<?php  getContent('landingcontent'); ?>
				</p>
			</div>
		</div>
	<!-- Index landing content on the page END-->

	<!-- Index list of most recent blog posts-->
		<div id="index-blog-posts">
			<H2>Latest Posts</H2><br>
			<div class="row">
				<?php indexPostDisplay(); ?>
			</div>
		</div>
	<!-- Index list of most recent blog posts END-->
	</div>
</div>

</body>
<div>
<?php include("footer.php"); ?>
</div>
</html>
