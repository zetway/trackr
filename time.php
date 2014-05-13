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

			<ul class="right">
				<li><a href="#">Edit categories</a></li>
				<li><a href="#">Some setting</a></li>
			</ul>
			<div class="clear"></div>
			<ul class="switch">
				<li>
					<div id="coding">
						coding 
					</div>
					
					<div class="switch-timer" data-target="coding" data-value="0">
						0:0:00
					</div>
				</li>
				<li>
					<div id="serfing">
						serfing 
					</div>
					
					<div class="switch-timer" data-target="coding" data-value="0">
						0:0:00
					</div>
				</li>
				<li>
					<div id="cooking">
						cooking 
					</div>
					
					<div class="switch-timer" data-target="coding" data-value="0">
						0:0:00
					</div>
				</li>
			</ul>
		</section>
		<footer>
			<?php require('partials/navigation.php'); ?>
		</footer>
	</div>
	<script type="text/javascript"> 
	var AppState = {};
	$(window).load(function(){      
		$(".time").addClass("active");
		$(".switch li div").on("click", function(evt)
		{
			AppState.ticks = 0;
			var counterEl = $(evt.target).next();
			(function loopingFunction() {
			    counterEl.html(AppState.ticks++);
			    setTimeout(loopingFunction, 1000);
			})();
			

		});
	});
	</script>


</body>
</html>