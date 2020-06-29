<?php
session_start();
require('connection.php');
if ($_SESSION['user_id'] != '' && isset($_POST['pass']) && isset($_POST['amount'])) {
    $user_id = $_SESSION['user_id'];
    $password = $_POST['pass'];
    $amount = $_POST['amount'];
    $query = "SELECT * FROM `register_table` WHERE user_id='$user_id' and Password='$password'";
    // echo $query;
    $result = mysqli_query($conn, $query);
    $json = array();
    if (mysqli_num_rows($result) > 0) {
        $query = "SELECT * FROM `withdrawl_request` WHERE user_id = '$user_id'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $query = "UPDATE `withdrawl_request` SET status = 0, amount=$amount WHERE user_id = '$user_id'";
        } else {
            $query = "INSERT INTO `withdrawl_request` (amount,user_id) VALUES ($amount,'$user_id')";
        }
        $result = mysqli_query($conn, $query);
        $json['success'] = 1;
    } else {
        $json['success'] = 0;
    }
    echo json_encode($json);
}
