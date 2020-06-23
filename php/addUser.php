<?php
require('connection.php');
session_start();
$response = array();
if ($_SESSION['otp'] == $_POST['otp']) {
    $_POST = $_SESSION;
    $mobile = $_POST['mobile'];
    $password = $_POST['pass'];
    $name = $_POST['name'];
    $code = $_POST['rcode'];
    $query = "INSERT INTO `register_table`(`name`,`MobileNo`, `Password`) VALUES ('$name','$mobile', '$password')";
    $result = mysqli_query($conn, $query);
    $last_id = $conn->insert_id;
    $query = "INSERT INTO `tbl_wallet`(`user_id`, `my_money`) VALUES ('$last_id', '0')";
    $result1 = mysqli_query($conn, $query);
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $referralCode = substr(str_shuffle($permitted_chars), 0, 10);
    if (isset($code)) {
        $query = "INSERT INTO referral_codes(user_id, referral_code, referred_from) VALUES ('$last_id','$referralCode','$code')";
        $result2 = mysqli_query($conn, $query);
        $query = "UPDATE tbl_wallet SET my_money = my_money + 20 WHERE user_id = (SELECT user_id FROM referral_codes WHERE referral_code = '$code')";
        $result2 = mysqli_query($conn, $query);
    } else {
        $query = "INSERT INTO referral_codes(user_id, referral_code, referred_from) VALUES ('$last_id','$referralCode','')";
        $result2 = mysqli_query($conn, $query);
    }

    if ($result1 && $result && $result2) {
        session_reset();
        $response['status'] = 1;
        $response['message'] = "Success";
    } else {
        $response['status'] = 0;
        $response['message'] = "Server Error";
    }
} else {
    $response['status'] = 0;
    $response['message'] = "Invalid OTP";
}
echo json_encode($response);
