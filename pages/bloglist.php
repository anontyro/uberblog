<?php

include("../header.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div id="main-content">
	<div id="blog-content-container">
		<?php  listBlogContent(10); ?>
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
