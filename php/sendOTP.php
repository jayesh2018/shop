<?php
session_start();
require('connection.php');
// print_r($_SESSION);
/* Your authentication key */
// print_r($_POST);
$response = array();

if (isset($_POST)) {
    $mobile = $_POST['mobile'];
    $slquery = "SELECT * FROM `register_table` WHERE MobileNo='$mobile'";
    $selectresult = mysqli_query($conn, $slquery);
    if (mysqli_num_rows($selectresult) > 0) {
        $response['status'] = 0;
        $response['message'] = "mobile number " . $mobile . " Already Exist!";
    } else {

        $authKey = "sLuHBfXH2NxF2Tuo";

        /* Multiple mobiles numbers separated by comma */
        $mobileNumber = $_POST["mobile"];

        /* Sender ID,While using route4 sender id should be 6 characters long. */
        $senderId = "SOPGLD";

        /* Your message to send, Add URL encoding here. */
        $rndno = rand(1000, 9999);
        $message = urlencode("Welcome to SHOP GOLD\nYour verification code is " . $rndno);
        /* Define route */
        $route = "1";

        /* Prepare you post parameters */
        $postData = array(
            'authkey' => $authKey,
            'mobiles' => $mobileNumber,
            'sender' => $senderId,
            'route' => $route
        );
        $url = "http://www.mysmsshop.in/http-api.php?username=SLPINDIA&password=India$$777&senderid=SOPGLD&route=1&number=" . $mobileNumber . "&message=" . $message . "";

        /* init the resource */
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
            /*,CURLOPT_FOLLOWLOCATION => true */
        ));


        /* Ignore SSL certificate verification */
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


        /* get response */
        $output = curl_exec($ch);

        /* Print error if any */
        if (curl_errno($ch)) {
            $response['status'] = 0;
            $response['message'] = curl_error($ch);
            $response['error'] = $output;
        } else {
            $_SESSION = array_merge($_SESSION,$_POST);
            $_SESSION['otp'] = $rndno;
            $response['status'] = 1;
            $response['message'] = "Success";
        }
        curl_close($ch);
    }
}
echo json_encode($response);
