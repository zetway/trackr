<?php

class User{
	private $PasswordHash;
	public $Username;
	public $Email;
	

	public function SetPassWordHash($password)
	{
		$this->PasswordHash = sha1($password);
	}

	public function PasswordHash()
	{
		return $this->PasswordHash;
	}
}

class Account{
	private $isConnected;
	private $connection;
	function __construct()
	{
		$this->isConnected = false;
	}


	private function connectToDb()
	{
		$this->connection=mysqli_connect("localhost","trackr_admin","guest","trackr");

		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();

		}
		else {
			$this->isConnected = true;
		}
	}


	public function AddUser($user)
	{
		if(!$this->isConnected) $this->connectToDb();
		mysqli_query($this->connection,"INSERT INTO Users (Username, PasswordHash, Email, DateRegistred)
		 VALUES ('" 
		 	. $user->Username . "', '"
		 	. $user->PasswordHash() . "', '"
		 	. $user->Email . "', "
		 	. "now())");
	}

	

}