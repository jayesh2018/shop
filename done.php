<!DOCTYPE html>
<html>
<body>

<?php
$date = date("Y-m-d h:i:s");
$d=strtotime($date);
$d= $d - 150;
$datetime = date("Y-m-d h:i:s", $d);
?>

</body>
</html>
