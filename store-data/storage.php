<?php
class Storage{
	private $isConnected;
	private $connection;
	function __construct()
	{
		$this->isConnected = false;
	}

	private function openConn()
	{
		if(!$this->isConnected){

			$this->connection=mysqli_connect("localhost",
				"trackr_admin",
				"guest",
				"trackr");

			if (mysqli_connect_errno()) {
				http_response_code(501);
				die;
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

	public function AddTime($Date, $UserId, $TimeCategory, $Seconds)
	{
		$this->openConn();
		$query = "INSERT INTO time_entry (TrackingDate, UserId, TimeCategory, Seconds)
    	VALUES 
    	(DATE('" . $Date . "'), " 
    		. $UserId . ", '"
	  		. $TimeCategory . "',"
    		. $Seconds . ")";
		

		$result = mysqli_query($this->connection, $query);
       	if (!$result){
			http_response_code(502); die;
       	}
		$this->closeConn();
	}
	public function AddSpendings($Date, $UserId, $MoneyCategory, $Amount)
	{
		$this->openConn();
		$query = "INSERT INTO money_entry (TrackingDate, UserId, MoneyCategory, Amount)
    	VALUES 
    	(DATE('" . $Date . "'), " 
    		. $UserId . ", '"
	  		. $MoneyCategory . "',"
    		. $Amount . ")";
		

		$result = mysqli_query($this->connection, $query);
       	if (!$result){
       		var_dump($query);
			//http_response_code(502); die;
       	}
		$this->closeConn();
	}
	public function GetAllSpendings()
	{
		$this->openConn();
		$query = "SELECT TrackingDate, TimeCategory, Seconds FROM time_entry";
		$result = mysqli_query($this->connection, $query);
		
		while($row = mysqli_fetch_array($result)) {
		  echo $row['TrackingDate'] . " " . $row['TrackingDate'];
		  echo "<br>";
		}
	}
}
function getPostParam($param, $numeric = false)
{
	if (isset($_POST[$param])) return $_POST[$param];
	if ($numeric) return 0;
	return "";
}
	