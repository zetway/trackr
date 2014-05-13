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
					<?php require('partials/slider.php'); ?>
					<section class="intro-text padding-30">
						<h2 class="text-center">Some intro</h2>
						<p> 
							Something to tell you about our resource trakcr. Lorem ipsum dolor sit amet, 
							consetetur sadipscing elitr,
							 sed diam nonumy eirmod tempor invidunt ut.
							 This example is a quick exercise to illustrate how the default, static navbar and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.

							 Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
						</p>
					</section>
				</section>
			
			<footer class="footer">
				<?php require('partials/navigation.php'); ?>
			</footer>
		
	</div>
	<script defer src="js/jquery.flexslider-min.js"></script>
    <script type="text/javascript">
    
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        animationLoop: true,
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
      $(".home").addClass("active");
    });

  </script>
</body>
</html>