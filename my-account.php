<?php require('logic/account.php') ?>
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
					
					if (isset($_COOKIE["user"])){
						//echo "Hello " . $_SESSION["username"];
						echo $_COOKIE["user"];
					}
					else{
						require('partials/account/registration.php');
					}
					 

				?>

			</section>
			<footer>
				<?php require('partials/navigation.php'); ?>
			</footer>
		</div>
	</div>
	<script type="text/javascript">    
    $(window).load(function(){      
      $(".my-account").addClass("active");
    });
  </script>
</body>
</html>