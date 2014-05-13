<!DOCTYPE html>
<html>
<head>		
	<title>Trackr :: Main Page</title>
	<?php require('partials/includes.php'); ?>
</head>
<body>
	<div class="wrapper">
		<div class="container">
			<header>
				<h1 class="logo">Resource Trackr</h1>
				<?php require('partials/navigation.php'); ?>
			</header>
			<section class="content">
				track money
			</section>
			<footer>
				<?php require('partials/navigation.php'); ?>
			</footer>
		</div>
	</div>
	<script type="text/javascript">    
	    $(window).load(function(){      
	      $(".money").addClass("active");
	    });
  </script>
</body>
</html>