<?php
	require_once("account.php");
	$account = new Account();
	if (isset($_POST["register"]))
	{
		$user = new User($_POST["username"], $_POST["password"]);
		
		$user->Email = $_POST["email"];
		
		$account->AddUser($user);
	}
	if (isset($_POST["login"]))
	{		
		$ok = $account->TryLogin($_POST["username"], $_POST["password"]);
	}
 ?>
 <form class="reg-form float-left" method="post" action="">
 	<input type="hidden" name="login" value="1">
 	<h3>Log in</h3>
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
		
	</table>
	<input type="submit" value="Submit">
 </form>
 <form class="reg-form float-left" method="post" action="">
 	<input type="hidden" name="register" value="1">
 	<h3>Or Register</h3>
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