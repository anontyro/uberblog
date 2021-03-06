<?php 

//function to read the database and pull the landing content to display on the index page
function getContent($content){
	include("dbconnect.php");
	$content_sql = "SELECT content FROM sitecontent WHERE contenttype = '$content' ";
	$content_query = mysqli_query($dbconnect, $content_sql);
	$content_rs = mysqli_fetch_assoc($content_query);
	echo $content_rs['content'];
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
		echo "<a href='pages/blogpost.php/?post=".$blog_rs['id']."'> <h3 id='title-blog-index'>".$blog_rs['title'].'<br></h3></a>';
		
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
			
}

//function to call the blog post to display it taking the blog id from the url
function loadBlogPost(){
	$blogID = $_GET['post'];
	include("dbconnect.php");
	$post_sql = "SELECT * FROM `blog`WHERE draft=0 AND id=$blogID";
	$post_query = mysqli_query($dbconnect, $post_sql);
	$post_rs = mysqli_fetch_array($post_query);

	return($post_rs);
}

//list 10 posts starting with the startIndex to display
function listBlogContent($postsPerPage){
	include("dbconnect.php");
	$pageNumber = 0;

	if(isset($_GET['page'])){
		$pageNumber = $_GET['page']*10;
	}

	$blogList_sql = "SELECT * FROM blog WHERE draft=0 ORDER BY published DESC LIMIT $postsPerPage OFFSET $pageNumber";
	$blogList_query = mysqli_query($dbconnect,$blogList_sql);
	$blogList_rs = mysqli_fetch_assoc($blogList_query);

	//<!-- List of blog posts logic goes here -->
	do{ ?>
		<div class="row bloglist-post-row" >
			<div id="bloglist-image" class="col-md-5"'>
			<?php 
				echo "<img src='/uberblog/$blogList_rs[mainimage]' class='img-responsive'/>";
			 
			?>
			</div>
			<div id="bloglist-content" class="col-md-6">
			<?php  
			echo "<a href='/uberblog/pages/blogpost.php/?post=".$blogList_rs['id']."'> <h3 id='title-blog-index'>".$blogList_rs['title'].'<br></h3></a>';
			echo strtoupper("<p id='author-blogList-index'>by ".$blogList_rs['author']);
			$date = DateTime::createFromFormat('Y-m-d', $blogList_rs['published']);
			$newDateString = $date->format('d M, Y');

			echo ", ".strtoupper($newDateString).'</p>';

			echo "<p id='body-blog-index'>".substr($blogList_rs['body'],0,250)."...</p>";
			?>
			</div>
		</div>			
	
	<!-- List of blog posts END-->
	<?php
	} while($blogList_rs = mysqli_fetch_assoc($blogList_query));
}


function totalNumberOfBlogPosts(){
	include("dbconnect.php");
	$blogCount_sql = "SELECT COUNT(*) FROM blog";
	$blogCount_query = mysqli_query($dbconnect, $blogCount_sql);
	$blogCount_rs = mysqli_fetch_array($blogCount_query);

	return $blogCount_rs[0];
}

?>