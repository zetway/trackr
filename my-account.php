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
					if (isset($_POST["postback"]))
					{
						$user = new User();
						$user->Username = $_POST["username"];
						$user->SetPasswordHash($_POST["password"]);
						$user->Email = $_POST["email"];
						$account = new Account();
						$account->addUser($user);
					}

				 ?>
				 <form method="post" action="">
				 	<input type="hidden" name="postback" value="1">
					<table>
						<tr>
							<td>Username:</td>
							<td>
								<input type="textbox" name="username">
							</td>

						</tr>
						<tr>
							<td>Password:</td>
							<td>
								<input type="password" name="password">
							</td>
						</tr>
						<tr>
							<td>Email:</td>
							<td>
								<input type="textbox" name="email">
							</td>
						</tr>
						
					</table>
					<input type="submit" value="Submit">
				</form>

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