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
				http_response_code(500);
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

	public function AddTime($TimeEntry)
	{
		$this->openConn();
		$result = mysqli_query($this->connection,"INSERT INTO time-tracking-entry 
			(TrackingDate, UserId, TimeCategory, Seconds)
    	VALUES 
    	(DATE('" . $TimeEntry->$Date . "'), " 
    		. $TimeEntry->$UserId . ","
	  		. $TimeEntry->$TimeCategory . ","
    		. $TimeEntry->$Seconds . ")"
		);
       	if (!$result){
			http_response_code(500); die;
       	}
		$this->closeConn();
	}
}
function getPostParam($param, $numeric = false)
{
	if (isset($_POST[$param])) return $_POST[$param];
	if ($numeric) return 0;
	return "";
}
if (isset($_SESSION["UserId"])) $userId = $_SESSION["UserId"];
else {
	http_response_code(500); die;
}
$entry = (object)array(
	"Date" => getPostParam("Date"),
	"UserId" => $userId,
	"TimeCategory" => getPostParam("TimeCategory"),
	"Seconds" => getPostParam("Seconds", true)
);
$storage = new Storage();
$storage->AddTime($entry);