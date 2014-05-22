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

				<?php
				if (isset($_COOKIE["session"])){

					require("partials/money-content.php");
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
	</div>
	<script type="text/javascript"> 
	var getFormattedDate = function() {
		var date = new Date();
		var yyyy = date.getFullYear().toString();
		var mm = (date.getMonth()+1).toString();
		var dd  = date.getDate().toString();
		return yyyy + "-" + (mm[1]?mm:"0" + mm[0]) +"-"+ (dd[1]?dd:"0"+dd[0]);
	};
		AppState = {};
	    $(window).load(function(){      
			$(".money").addClass("active");
			$("table.tbl-money tbody tr").on("click", function(evt){
				//console.log($(evt.target).parent());
				$("table.tbl-money tbody tr").removeClass("active");
				var tr = $(evt.target).parent();
				tr.addClass("active");
				AppState.activeCat = tr.attr("data-category");
			});
			$(".p-btn-2,.p-btn-3").on("click", function(evt){
				if (typeof AppState.activeCat === undefined){ return};
				var delta = $(evt.target).html();
				var target = $("[data-category="+AppState.activeCat+"]").children().next();
				var val = 100 * Math.floor(target.html());
				val += delta * 100;
				target.html((val/100) + ".00");
				var data = {
					"MoneyCategory": AppState.activeCat, 
					"Amount": val,
					"Date": getFormattedDate()
				};
				var jxhr = $.post("store-data/store-money.php", data, function(resp){
					console.log(resp);
				}).fail(function(resp){
						console.log(resp);
					});
			});
			$("#clear-money").on("click", function(evt){
				var target = $("[data-category="+AppState.activeCat+"]").children().next();
				target.html("0.00");
			});
		});
  </script>
</body>
</html>