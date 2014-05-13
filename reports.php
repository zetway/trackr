<!DOCTYPE html>
<html>
<head>		
	<title>Trackr :: Main Page</title>
	<?php require('partials/includes.php'); ?>
</head>
<body>
	<div class="wrapper">
			<header>
				<h1 class="logo">Resource Trackr</h1>
				<?php require('partials/navigation.php'); ?>
			</header>
			
				<section class="content">
					reports
				</section>
			
			<footer>
				<?php require('partials/navigation.php'); ?>
			</footer>
	</div>
	<script type="text/javascript">    
	    $(window).load(function(){      
	      $(".reports").addClass("active");
	    });
  	</script>
</body>
</html>