<?php

require('./shopgold.xyz/connection.php');

$insertWinnerHistoryQuery = "INSERT INTO winner_history (color,digit,room) (SELECT color,digit,room FROM winner WHERE color <> '' AND digit <> 0 )";
$result = mysqli_query($conn,$insertWinnerHistoryQuery);
echo $insertWinnerHistoryQuery . $result . "\n<br>";

$truncateWinnerQuery = "TRUNCATE TABLE winner";
$result = mysqli_query($conn,$truncateWinnerQuery);
echo $truncateWinnerQuery . $result . "\n<br>";

$dateTime = new DateTime();
$timezone = new DateTimeZone('Asia/Kolkata');
$dateTime->setTimezone($timezone);
$dateTime->modify('+3 minutes');
$cDate = $dateTime->format('Y-m-d H:i:s');
$insertWinnerQuery = "INSERT INTO winner (room,game_date) VALUES('picky','$cDate'),('parity','$cDate'),('spare','$cDate'),('bacone','$cDate')";
$result = mysqli_query($conn,$insertWinnerQuery);
echo $insertWinnerQuery . $result . "\n<br>";

$insertPurchareHistoryQuery = "INSERT INTO purchased_history (customer_id,choice,money,room) (SELECT customer_id,choice,money,room FROM purchased)";
$result = mysqli_query($conn,$insertPurchareHistoryQuery);
echo $insertPurchareHistoryQuery . $result . "\n<br>";

$truncatePurchasedQuery = "TRUNCATE TABLE purchased";
$result = mysqli_query($conn,$truncatePurchasedQuery);
echo $truncatePurchasedQuery . $result . "\n<br>";

require('./sapregold.xyz/connection.php');

$result = mysqli_query($conn,$insertWinnerHistoryQuery);
echo $insertWinnerHistoryQuery . $result . "\n<br>";

$result = mysqli_query($conn,$truncateWinnerQuery);
echo $truncateWinnerQuery . $result . "\n<br>";

$result = mysqli_query($conn,$insertWinnerQuery);
echo $insertWinnerQuery . $result . "\n<br>";

$result = mysqli_query($conn,$insertPurchareHistoryQuery);
echo $insertPurchareHistoryQuery . $result . "\n<br>";

$result = mysqli_query($conn,$truncatePurchasedQuery);
echo $truncatePurchasedQuery . $result . "\n<br>";

?>