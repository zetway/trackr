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
			<div id="modal" style="display:none;"></div>
			<ul class="right">
				<li><a id="edit-cats" href="#">Edit categories</a></li>
				<li><a href="#">Some setting</a></li>
			</ul>
			<div class="clear"></div>
			<ul class="switch">
				<li>
					<div id="coding">
						coding 
					</div>
					
					<div class="switch-timer" data-target="coding" data-value="0">
						00:00:00
					</div>
				</li>
				<li>
					<div id="serfing">
						serfing 
					</div>
					
					<div class="switch-timer" data-target="coding" data-value="0">
						00:00:00
					</div>
				</li>
				<li>
					<div id="cooking">
						cooking 
					</div>
					
					<div class="switch-timer" data-target="coding" data-value="0">
						00:00:00
					</div>
				</li>
				<li>
					<div id="cooking">
						nothing 
					</div>
					
					<div class="switch-timer" data-target="coding" data-value="0">
						00:00:00
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
			AppState.currTimer = $(evt.target).html()
			var counterEl = $(evt.target).next();
			(function loopingFunction() {
			    
			    if(AppState.currTimer === counterEl.prev().html()) {
				    setTimeout(loopingFunction, 1000);
				    counterEl.html(getTime(AppState.ticks++));

			    }
			})();
			

		});
		$("#edit-cats").on("click", function(e) {
			e.preventDefault();
			$( "#modal" ).dialog({
		      height: 140,
		      modal: true
		    });
		})
		
	});
	
	function getTime(seconds){
		var sec = seconds % 60;
		var min = Math.floor(seconds / 60);
		var hrs = Math.floor(min / 60);
		min = min % 60;
		if (sec < 10) sec = "0" + sec;
		if (min < 10) min = "0" + min;
		if (hrs < 10) hrs = "0" + hrs;
		return hrs + ":" + min + ":" + sec;
	}
	</script>


</body>
</html>