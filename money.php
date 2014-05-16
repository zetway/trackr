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

				<table class="tbl-money float-left">
					<tbody>
						<tr data-category="Grocery">
							<td>Grocery</td>
							<td>0.00</td>
						</tr>
						<tr data-category="Restaurant">
							<td>Restaurant</td>
							<td>0.00</td>
						</tr>
						<tr data-category="Clothing">
							<td>Clothing</td>
							<td>0.00</td>
						</tr>
						<tr data-category="Entertainment">
							<td>Entertainment</td>
							<td>0.00</td>
						</tr>
					<tbody>
				</table>
				<div class="plus-buttons float-left">
					
					<h3>Add spendings</h3>
					<div class="p-buttons-container">
						<div class="p-btn-3 Chartreuse">500</div>
						<div class="p-btn-3 yellow">200</div>
						<div class="p-btn-3 IndianRed">100</div>
						<div class="p-btn-2 green">50</div>
						<div class="p-btn-2 DodgerBlue">20</div>
						<div class="p-btn-2 LightSeaGreen">10</div>
					</div>
					<div id="clear-money" class="p-btn-text red">
						Clear
					</div>
				</div>
				<div class="clear"></div>
				
			</section>
			<footer>
				<?php require('partials/navigation.php'); ?>
			</footer>
		</div>
	</div>
	<script type="text/javascript"> 
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
	      });
	      $("#clear-money").on("click", function(evt){
	      	var target = $("[data-category="+AppState.activeCat+"]").children().next();
	      	target.html("0.00");
	      });
	    });
  </script>
</body>
</html>