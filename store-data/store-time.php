<?php
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

	public function AddTime($user)
	{
		 $this->openConn();
		mysqli_query($this->connection,"INSERT INTO time-data (TrackingDate, UserId)
    VALUES (23, DATE('2013-02-12'), 22.5)
        ON DUPLICATE KEY UPDATE ID = 23;");
		$this->closeConn();
		
	}

	
}
foreach ($_POST as $key => $val) {
    echo "\$a[$k] => $v.\n";
}