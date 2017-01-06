<?php

include("../header.php");
listBlogContent(10);
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
