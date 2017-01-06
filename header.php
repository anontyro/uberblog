<?php

include("util/dbconnect.php");
include("util/functions.php");

?>

<script src="//code.jquery.com/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
	integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<link href="/uberblog/style/style.css" rel="stylesheet" type="text/css" />

<!--Navigation bar -->
<div class="container-fullwidth" id="header-container">
	<div class="row" id="header-logo">

		<div class="col-xs-6"><center><a href="index.php"><img src="images/HWDesign.png"></center></a></div>
		<div class="col-xs-3"></div>

	</div>
	<div class="container-fluid" id="navbar-container">
		<div name="nav bar">
			<nav class="navbar navbar-default">
			<div class="container-fluid">
			    <div class="navbar-header">
		     		 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        	<span class="sr-only">Toggle navigation</span>
		        	<span class="icon-bar"></span>
		       		<span class="icon-bar"></span>
		        	<span class="icon-bar"></span>
	     			</button>

	   			</div>

	   			<div class="collapse navbar-collapse" id="nav-bar">
					<ul class="nav navbar-nav">

						<?php 
							$cat_sql="SELECT * FROM navbarcategories";
							$cat_query=mysqli_query($dbconnect, $cat_sql);
							$cat_rs=mysqli_fetch_assoc($cat_query);
							do{ ?>
						<!--Links created from the database here -->
						<li><a href="<?php echo '/uberblog/'.$cat_rs['url'] ?>">
						<?php echo $cat_rs['category']; ?></a></li>

						<?php
							}while ($cat_rs = mysqli_fetch_assoc($cat_query))
						?>

					</ul>
	   			</div>
				
			</div>	
			</nav>
		</div>
	</div>
</div>
<!--Navigation bar ends -->
