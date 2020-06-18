<?php
session_start();

?>
<html>
  <head>
    <title></title>
    <meta name="viewport" content="width=device-width">
    <style>
      .razorpay-payment-button {
        color: #ffffff !important;
        background-color: #7266ba;
        border-color: #7266ba;
        font-size: 14px;
        padding: 10px;
      }
    </style>
<form action="http://shopgold.xyz/update_wallet.php" method="POST">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="rzp_live_kLzNrYJvfoR5lb"
    data-amount="<?php echo $_SESSION["amount"]?>"
    data-currency="INR"
    data-order_id="<?php echo $_SESSION["orderid"]?>"//This is a sample Order ID. Pass the `id` obtained in the response of the previous step.
    data-buttontext="Pay with Razorpay"
    data-name="Shop Gold"
    data-description=""
    data-image="wingold.jpeg"
    data-prefill.name=""
    data-prefill.email=""
    data-prefill.contact=""
    data-theme.color="#F37254"
></script>
<input type="hidden" custom="Hidden Element" name="hidden">
</form>