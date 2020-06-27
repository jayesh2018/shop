<?php

require('./connection.php');
date_default_timezone_set("asia/kolkata");

$dateTime = new DateTime();
$timezone = new DateTimeZone('Asia/Kolkata');
$dateTime->setTimezone($timezone);
$dateTime->modify('-10 days');
$cDate = $dateTime->format('Y-m-d H:i:s');
echo $cDate . "< br/>";

$query = "DELETE FROM purchased_history WHERE date_added < '$cDate'";
// $query = "select count(*) from purchased_history WHERE date_added < '2020-06-27 00:00:00'";
$result = mysqli_query($conn,$query);
echo $result;
?>