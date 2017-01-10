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
	if($numberOfPages > 1){
	?>
		<button class="btn btn-default"><</button>
		<?php 
			for($x = 0; $x < $numberOfPages; $x++){
				echo '<a href="/uberblog/pages/bloglist.php?page='.$x.'" class="btn btn-primary" role="button"> '.($x+1).' </a> ';
			}
		 ?>
		 <a href="/uberblog/pages/bloglist.php?page=<?php echo ($_GET['page']+1); ?>"  class="btn btn-primary" role="button"> > </a>
	<?php
	}
	echo "number of pages = $numberOfPages";
	?>
</div>
</body>
<?php include("../footer.php"); ?>
</html>
