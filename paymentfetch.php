<?php
require 'Razorpay/Razorpay.php';
use Razorpay\Api\Api;
session_start();
$amount = $_POST['amount'] * 100;

$api_key = 'rzp_live_kLzNrYJvfoR5lb';
 $api_secret = '27BG6ESEWJcJAfaEUs3YlE4u';
$api = new Api($api_key, $api_secret);
$order = $api->order->create(array(
    'receipt' => '123',
    'amount' => $amount,
    'payment_capture' => 1,
    'currency' => 'INR'
    )
  );
$_SESSION["amount"]= $amount;
$_SESSION["orderid"]= $order->id;

// header('Location: http://localhost/shop/payment.php');
?>