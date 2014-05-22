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
			<?php
				if (isset($_COOKIE["session"])){

					require("partials/time-content.php");
				}
				else{
					require('account/registration.php');
				}
			?>
		</section>
		<footer>
			<?php require('partials/navigation.php'); ?>
		</footer>
	</div>
	<script type="text/javascript">
	var getFormattedDate = function() {
		var date = new Date();
		var yyyy = date.getFullYear().toString();
		var mm = (date.getMonth()+1).toString();
		var dd  = date.getDate().toString();
		return yyyy + "-" + (mm[1]?mm:"0" + mm[0]) +"-"+ (dd[1]?dd:"0"+dd[0]);
	};


	var AppState = {timers: {}};
	$(window).load(function(){      
		$(".time").addClass("active");
		$(".switch li div").on("click", function(evt)
		{
			

			var target = $(evt.target);
			var catName = target.html().trim();

			
			AppState.timers[catName] = AppState.timers[catName] || 0;
			var prevTimer = AppState["currTimer"] || false;
			if (prevTimer && AppState.timers[prevTimer] !== 0)	{

				var data = {};

				data["Date"] = getFormattedDate();
				data["TimeCategory"] = prevTimer;
				data["Seconds"] = AppState.timers[prevTimer];				

				var jqxhr = $.post( "store-data/store-time.php", data, function(resp) {
				  //console.log(resp);
				}).fail(function() {
					console.log( "error" );
				});
			
			}
			AppState.currTimer = catName;

			$(".switch li").removeClass("active");
			target.parent().addClass("active");
			var counterEl = $(evt.target).next();
			(function loopingFunction() {
			    
			    if(AppState.currTimer === catName) {
				    setTimeout(loopingFunction, 1000);
				    counterEl.html(getTime(AppState.timers[catName]++));

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