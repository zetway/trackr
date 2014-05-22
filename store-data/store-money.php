<?php
require("storage.php");
session_start();
if (isset($_SESSION["UserId"])) $userId = $_SESSION["UserId"];
else {
	http_response_code(503); die;
}

$Date = getPostParam("Date");
$UserId = $userId;
$MoneyCategory = getPostParam("MoneyCategory");
$Amount = getPostParam("Amount", true);

$storage = new Storage();
$storage->AddSpendings($Date, $UserId, $MoneyCategory, $Amount);