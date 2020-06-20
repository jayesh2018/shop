<?php
// Start the session
session_start();
require ('connection.php');
if($_SESSION['user_id']!='' || $_SESSION['user_id']!=null){
    
   
        $user_id = $_SESSION['user_id'];}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  	<script src="payment.js"></script>
	<title></title>
	<style type="text/css">


		.top{
			background-color: rgb(245, 245, 245);
    		position: fixed;
    		top: 0;
    		left: 0;
		    width: 100%;
		}
		.recharge-content {
 		   background-color: #f5f5f5;
		}
		.recharge-content .top-title {
    		padding: 30px;
    		text-align: center;
    		font-size: 23px;
    		font-weight: 600;
    		color: #2a7e4c;
    		width: 100%;
		}
		.recharge-content .top-subtitle {
    		padding: 0 12px;
    		font-size: 16px;
    		color: #7c7c7c;
    		display: flex;
    		flex-wrap: wrap;
		}
		.top-subtitle-amount {
    		color: #2a7e4c;
    		padding-left: 16px;
    		font-size: 24px;
    		margin-top: 5px;
		}
		.top-chunk .row div{
			padding: 8px;
		}
		.top-chunk .row div:hover{
			background: green;
		}
		.cashfree {
    	position: relative;
    	padding: 26px;
    	font-size: 16px;
    	font-weight: 600;
    	background-color: #fff;
    	border-radius: 20px 20px 0 0;
}
	 .recharge-btn {
    display: block;
    width: 100%;
    padding: 0 14px;
    margin-top: 10px;
    box-sizing: border-box;
}
	 .recharge-btn button {
    	width: 100%;
    	margin: 0 auto;
    	height: 52px;
    	font-size: 17px;
    	color: #fff;
    	background-color: #137139;
    	border: 0;
}

	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="top">
			<p class="text-center py-2">Recharge</p>
			<div class="top-title text-center py-2" style="font-size: 23px; font-weight: 700;color: green;">
				MyBalance 
				<span style="margin-left: 10px; font-size: 22px;">
                       ₹ <?php
                        $my_money=mysqli_fetch_assoc(mysqli_query($conn,"SELECT my_money x FROM tbl_wallet WHERE user_id= '$user_id'"))['x'];
                        echo $my_money; ?>
            </span>
			</div>
			<div class="top-subtitle">
				<div class="top-subtitle-amounrt " style="width: 80%; padding: 14px;">
					₹ <input type="amount"  id="amount" name="amount" class="px-2 py-2" placeholder="Enter the amount" style="border:none;background:rgb(245, 245, 245); ">
					<?php
					$amount = isset($_GET['amount']) ? $_GET['amount'] : 1;
					$_SESSION["amount"] = $amount;
					?>
				</div>
			</div>
			<div class="top-chunk" style="padding:0px 20px;">
				<div class="row" >
					<div class="col-md-4 jclass" data-value="100" onclick="amount(this)">₹ 100</div>
					<div class="col-md-4 jclass" data-value="1000" onclick="amount(this)">₹ 1000</div>
					<div class="col-md-4 jclass" data-value="5000" onclick="amount(this)">₹ 5000</div>
					<div class="col-md-4 jclass" data-value="10000" onclick="amount(this)">₹ 10000</div>
					<div class="col-md-4 jclass" data-value="20000" onclick="amount(this)">₹ 20000</div>
					<div class="col-md-4 jclass" data-value="50000" onclick="amount(this)">₹ 50000</div>
				</div>
			</div>
			 <input type="hidden" name="choice" value="" class="form-control category" id="category">
			<div class="cashfree">
				<div  style="display: flex; flex-wrap: wrap;">
					<div  style="width: 80%;">ONEPAY</div>
					<div class="cashfree-icon" style="width: 20%; margin-top: 14px;"><i class="van-icon van-icon-success"></i>
					</div>
				</div>
				<div  class="recharge-btn">

                

					<a onclick="createOrder()" class="btn btn-lg" style="background-color: green; margin-top: 10px; width: 100%" >Recharge</a>
					<a  href="historical.php" class="btn btn-lg" style="background-color: rgb(112, 112, 112); margin-top: 10px; width: 100%">
                    Historical Records
                	</a>
                </div>
			</div>
		</div>
	</div>
<script>

$(document).ready(function() {

	console.log( "ready!" );
});


function amount(e){
    var amount = $(e).attr('data-value');
    console.log(amount);
    $('#amount').val(amount);
}
        // $(document).ready(function() {
        //     $('.jclass').click(function() {
        //         var button_val= $(this).attr("data-value");
        //         console.log(button_val);
        //         document.getElementById('category').value = button_val;  
        //     });
        // });
        
    </script>

</script>
</body>
</html>