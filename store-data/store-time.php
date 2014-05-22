<?php
require("storage.php");
session_start();
if (isset($_SESSION["UserId"])) $userId = $_SESSION["UserId"];
else {
	http_response_code(503); die;
}

$Date = getPostParam("Date");
$UserId = $userId;
$TimeCategory = getPostParam("TimeCategory");
$Seconds = getPostParam("Seconds", true);

$storage = new Storage();
$storage->AddTime($Date, $UserId, $TimeCategory, $Seconds);