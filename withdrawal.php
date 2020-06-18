<?php 
session_start();
require ('connection.php');
if($_SESSION['user_id']!='' || $_SESSION['user_id']!=null){
    
   
        $user_id = $_SESSION['user_id'];}
if(!isset($_SESSION['user']))
         {
            echo '<script>
        
        location.href="http://shopgold.xyz/login.php";
    </script>';
         }
          ?> 
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
$(function() {
    //hang on event of form with id=myform
    $("#myForm").submit(function(e) {

        //prevent Default functionality
        e.preventDefault();

        //get the action-url of the form
        var actionurl = e.currentTarget.action;
        var user_id=$('.user_id').val();
         var withdrawl=$('.withdrawl').val();

        //do your own request an handle the results
        $.ajax({
                url: actionurl,
                type: 'post',
               
                data: {user_id:user_id,withdrawl:withdrawl},
                success: function(data) {
                    alert("submit success");
                }
        });

    });

});
</script>
  	<style type="text/css">
  		.info-balance{
    padding: 15px;
    font-size: 24px;
    color: #000;
}
.info-address {
    /* position: relative; */
    padding: 15px;
    background-color: #f9f9f9;
    font-size: 16px;
}
.info-address span {
    display: block;
    padding-top: 5px;
    font-size: 14px;
    color: #7d7d7d;
}
input:focus{
    outline: none;
}

  	</style>
</head>
<body>
	<div class="container-fluid">
		<p class="text-center py-2">Withdrawal</p>
		<div class="info-balance">
                My balance:<span > ₹<?php
                        $my_money=mysqli_fetch_assoc(mysqli_query($conn,"SELECT my_money x FROM tbl_wallet WHERE user_id= '$user_id'"))['x'];
                        echo $my_money; ?></span>
        </div>
        <div class="info-address">
                My bankcard<span data-v-ee258ab4=""><?php
                        
                        $account=mysqli_fetch_assoc(mysqli_query($conn,"SELECT account y FROM bank_details WHERE user_id= '$user_id'"))['y'];
                        echo $account; ?>:<?php
                        
                        $ifsc=mysqli_fetch_assoc(mysqli_query($conn,"SELECT ifsc z FROM bank_details WHERE user_id= '$user_id'"))['z'];
                        echo $ifsc; ?></span> 
        </div>
        <p class="lead pl-3 py-3">Amount<1500 Rs，fee ₹30</p>
        <p class="lead pl-3 ">Amount>1500 Rs，fee 2%</p>
        <h4 class="py-2">Withdrawal Amount</h4>
        <form id="myForm" method="post" action="submit_withdrawl.php">
        <br>
        ₹ <input type="text" name="withdrawl" id="withdrawl" class="withdrawl" style="border:none;">
        <input type="hidden" name="user_id" id="user_id" class="user_id" value="<?php echo $user_id;?>">
        <hr>
        <p>The balance that can be withdrawn is: ₹4.00</p>
        <p>Withdrawal fee(tax-inclusive)₹(0)</p>
        <p><strong>Single withdrawal limit</strong></p>
        <p class="ml-2">maximum amount ₹ 50000</p>
        <p class="ml-2">maximum amount ₹ 31</p>
        <h4>Service Time</h4>
        <p class="ml-2">Monday10:00-17:00</p>
        <p class="ml-2">Tuesday10:00-17:00</p>
        <p class="ml-2">Wednesday10:00-17:00</p>
        <p class="ml-2">Thursday10:00-17:00</p>
        <p class="ml-2">Friday10:00-17:00</p>
        <button type="submit" id="submitBtn" style="width: 100%" class="btn btn-lg btn-success my-3">Withdraw</button>
        <button style="width: 100%" onclick="location.href='historical.php'"  class="btn btn-lg btn-secondary">Historical Records</button>
        </form>
	</div>
</body>
</html>