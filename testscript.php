<?php
require('connection.php');
$currenttime = time();
$query = "INSERT INTO winner_history (color,digit) (SELECT color,digit FROM winner)";
echo $query;
$result = mysqli_query($conn,$query);
$currenttime = time();
$query = "TRUNCATE TABLE winner";
echo $query;
$result = mysqli_query($conn,$query);
$currenttime = time();
$query = "INSERT INTO winner (game_date) VALUES(NOW()+INTERVAL 33 MINUTE)";
echo $query;
$result = mysqli_query($conn,$query);
print_r($result);
$query = "INSERT INTO purchased_history (customer_id,choice,money) (SELECT customer_id,choice,money FROM purchased)";
echo $query;
$result = mysqli_query($conn,$query);
$query = "TRUNCATE TABLE purchased";
echo $query;
$result = mysqli_query($conn,$query);
?>