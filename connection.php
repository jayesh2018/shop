<?php

$servername = "localhost";

$username = "root";
$password = "";
// $username = "shop_gold";
// $password = "Test@1234";
$dataname = "shopgold";
// Create connection
$conn = new mysqli($servername, $username, $password, $dataname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>