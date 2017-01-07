<?php

include("../header.php");
$blogList = listBlogContent(10);
echo "total blog list = ".count($blogList);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div id="main-content">
	<div id="bloglist-content-container">
	<!-- Index list of most recent blog posts-->
	<?php foreach ($blogList as $key => $value) {
		echo "{$key} => {$value}";
	} ?>
		<?php for ($i=0; $i < count($blogList) ; $i++) { ?>
			<div class='col-md-3' id='index-latest-blogs'>
			
			<?php
				echo "<img src='/uberblog/$blogList[mainimage]' class='img-responsive'/>";
				?> 
			</div>
			<div class="col-md-4"> <?php
				echo "<a href='pages/blogpost.php/?post=".$blogList['id']."'> <h3 id='title-blog-index'>".$blogList['title'].'<br></h3></a>';
				
				echo strtoupper("<p id='author-blog-index'>by ".$blogList['author']);
				$date = DateTime::createFromFormat('Y-m-d', $blogList['published']);
				$newDateString = $date->format('d M, Y');

				echo ", ".strtoupper($newDateString).'</p>';

				echo "<p id='body-blog-index'>".substr($blogList['body'],0,250)."...</p>";
			
			?>
			</div>
			<div class="col-md-5"></div>
			<?php } ?>
				
	<!-- Index list of most recent blog posts END-->
	</div>
</div>

<div id="bloglist-pagination">
	<?php 
	$postsPerPage = 10;
	$output = totalNumberOfBlogPosts(); 
	if($output > $postsPerPage){
		$numberOfPages = ceil(($output / $postsPerPage));
	}
	$numberOfPages = ceil(($output / $postsPerPage));
	echo "number of pages = $numberOfPages";
	?>
</div>
</body>
<?php include("../footer.php"); ?>
</html>
