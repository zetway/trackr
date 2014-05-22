<?php

class User{
	private $PasswordHash;
	public $Username;
	public $Email;
	
	public function __construct($username, $password)
	{
		$this->Username = $username;
		$this->SetPasswordHash($password);
	}
	
	public function SetPasswordHash($password)
	{
		$this->PasswordHash = sha1($password);
		//$this->PasswordHash = "f1033fab2c";
	}

	public function PasswordHash()
	{
		return $this->PasswordHash;
		//return "f1033fab2c";
	}
	
}


class Account{
	private $isConnected;
	private $connection;
	function __construct()
	{
		$this->isConnected = false;
	}


	private function openConn()
	{
		if(!$this->isConnected){

			$this->connection=mysqli_connect("localhost","trackr_admin","guest","trackr");

			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();

			}
			else {
				$this->isConnected = true;
			}
		}
	}

	private function closeConn()
	{
		mysqli_close($this->connection);
		$this->isConnected = false;
	}

	public function AddUser($user)
	{
		 $this->openConn();
		mysqli_query($this->connection,"INSERT INTO Users (Username, PasswordHash, Email, DateRegistred)
		 VALUES ('" 
		 	. $user->Username . "', '"
		 	. $user->PasswordHash() . "', '"
		 	. $user->Email . "', "
		 	. "now())");
		$this->closeConn();
		
	}

	public function TryLogin($username, $password)
	{
		$this->openConn();
		$user = new User($username, $password);
		
		

		$result = mysqli_query($this->connection,
			"SELECT UserId FROM users " . 
			"WHERE Username = '" . $username . 
			"' AND  PasswordHash = '" . $user->PasswordHash() . 
			"'");
		if (!$result)
		{
			echo "problem";			
			$this->closeConn();
			return false;
		}
		
		if($row = mysqli_fetch_array($result)) {
			session_start();
			setcookie("session",session_id());					
			$_SESSION["Username"] = $username;
			$_SESSION["UserId"] = $row["UserId"];
			header("Refresh:0");
			exit;
		}

		$this->closeConn();
		return true;
	}
}