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
					
					if (isset($_COOKIE["session"])){
						//setcookie("user", "", time()-3600);
						session_start();			

						echo "hello " . $_SESSION["Username"];
						echo " <a href='#' onclick='logout()'>Log out</a>";

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
    function logout(){
	  document.cookie = 'session=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
	  location.reload();
	}
  </script>
</body>
</html>