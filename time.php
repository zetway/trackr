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
			<div id="modal" style="display:none;">
				<div><input id="1" value="Coding"><button class="remove-cat" data-target="1">-</button></div>
				<div><input id="2" value="Serfing"><button class="remove-cat" data-target="2">-</button></div>
				<div><input id="3" value="Cooking"><button class="remove-cat" data-target="3">-</button></div>
				<button id="add-cat">+</button>
			</div>
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
					
					<div class="switch-timer" data-target="serfing" data-value="0">
						00:00:00
					</div>
				</li>
				<li>
					<div id="cooking">
						cooking 
					</div>
					
					<div class="switch-timer" data-target="cooking" data-value="0">
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
			var target = $(evt.target);
			AppState.currTimer = target.html();
			$(".switch li").removeClass("active");
			target.parent().addClass("active");
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
		      height: 300,
		      width: 700,
		      modal: true
		    });
		});
		$("button.remove-cat").on("click", function(evt){
			$(evt.target).parent().remove();
		});
		$("#add-cat").on("click", function(evt){
			var html = "<div><input id='3' value=''><button class='remove-cat' data-target='3'>-</button></div>";
			$(html).insertAfter($(evt.target).prev());
			$("button.remove-cat").on("click", function(evt){
				$(evt.target).parent().remove();
			});
		});
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