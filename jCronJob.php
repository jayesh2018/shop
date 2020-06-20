<?php

require('./shopgold.xyz/connection.php');

$insertWinnerHistoryQuery = "INSERT INTO winner_history (color,digit) (SELECT color,digit FROM winner WHERE color <> '' AND digit <> 0 )";
$result = mysqli_query($conn,$insertWinnerHistoryQuery);
echo $insertWinnerHistoryQuery . $result . "\n<br>";

$truncateWinnerQuery = "TRUNCATE TABLE winner";
$result = mysqli_query($conn,$truncateWinnerQuery);
echo $truncateWinnerQuery . $result . "\n<br>";

$insertWinnerQuery = "INSERT INTO winner (game_date) VALUES(ADDTIME(now(),'12:33:00'))";
// $insertWinnerQuery = "INSERT INTO winner (game_date) VALUES(ADDTIME(now() + INTERVAL 3 MINUTE)";
$result = mysqli_query($conn,$insertWinnerQuery);
echo $insertWinnerQuery . $result . "\n<br>";

$insertPurchareHistoryQuery = "INSERT INTO purchased_history (customer_id,choice,money) (SELECT customer_id,choice,money FROM purchased)";
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