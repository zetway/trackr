<?php
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
 <form method="post" action="">
 	<input type="hidden" name="login" value="1">
 	Log in
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
 <form method="post" action="">
 	<input type="hidden" name="register" value="1">
 	Or Register
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