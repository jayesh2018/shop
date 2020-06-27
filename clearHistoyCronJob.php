<?php

require('./connection.php');
date_default_timezone_set("asia/kolkata");

$dateTime = new DateTime();
$timezone = new DateTimeZone('Asia/Kolkata');
$dateTime->setTimezone($timezone);

$cDate = $dateTime->format('Y-m-d 00:00:00');
echo $cDate . "< br/>";
$query = "DELETE FROM purchased_history WHERE date_added < '$cDate'";
$result = mysqli_query($conn,$query);
echo $result . " <br/>\n ";
$query = "DELETE FROM winner_history WHERE date_added < '$cDate'";
$result = mysqli_query($conn,$query);
echo $result . " <br/>\n ";
// print_r(mysqli_fetch_row($result));
?>