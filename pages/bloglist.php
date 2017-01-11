<?php

include("../header.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div id="row">
	<div id="main-content" class="col-md-8">
		<div id="blog-content-container">
			<?php  listBlogContent(10); ?>
		</div>
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
		<a href="/uberblog/pages/bloglist.php?page=<?php 
		 if(isset($_GET['page'])){
			 $nextPage = $_GET['page']-1;
			 if($nextPage > 0){
			 	echo $nextPage; 
			 }else{
			 	echo "0";
			 }
			}else{ echo "0";}
		 ?>"
		   class="btn btn-primary" role="button"> < </a>

		<?php 
			for($x = 0; $x < $numberOfPages; $x++){
				echo '<a href="/uberblog/pages/bloglist.php?page='.$x.'" class="btn btn-primary" role="button"> '.($x+1).' </a> ';
			}
		 ?>
		 <a href="/uberblog/pages/bloglist.php?page=<?php 
		 if(isset($_GET['page'])){
			 $nextPage = $_GET['page']+1;
			 if($nextPage < $numberOfPages){
			 	echo $nextPage; 
			 }else{
			 	echo $numberOfPages;
			 }
			}else{ echo "1";}
		 ?>"
		   class="btn btn-primary" role="button"> > </a>
	<?php
	}
	echo "number of pages = $numberOfPages";
	?>
</div>
</body>
<?php include("../footer.php"); ?>
</html>
