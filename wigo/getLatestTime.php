<?php

require('../connection.php');

$latestDate = mysqli_fetch_assoc(mysqli_query($conn,"SELECT game_date FROM winner limit 1"));

echo $latestDate['game_date'];

?>