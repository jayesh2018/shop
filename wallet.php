<?php
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
	<title></title>
	<style type="text/css">
		
		body{
			background: url("https://images.unsplash.com/photo-1536338701933-9fb6ce505c48?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60")no-repeat;
			background-size: cover;
			overflow: hidden;
			min-height: 100vh;
		}
		.top{
    		margin: 20px 24px 0;
    		width: 50%;
    		color: #FFF;

}
		.content{
		display: flex;
	   	flex-direction: column;
	    margin: 18px 18px 0;
	    /* z-index: 2019; */
	    border-radius: 12px;
	    overflow: hidden;
	    background-color: rgba(255,255,255,0.9);
	    box-shadow: 1px 3px 5px 0px #999;
		}
		.card{
			    padding: 15px;
		}
		.card-num{
    		font-size: 32px;
    		color: #337651;
		}
		.card-num span {
    		font-size: 20px;
		}
		.card-title{
    		font-size: 20px;
		}
		.card-text {
    		margin-top: 24px;
    		font-size: 20px;
		}
		.card-text  {
    		display: block;
    		padding: 3px 0;
		}
		.card-btn {
    	display: flex;
    	padding: 14px;
    	background-color: rgba(238,238,238,0.5);
    	box-sizing: content-box;
		}
		.card-btn a {
    	flex: 1;
    	position: relative;
    	height: 36px;
    	font-size: 16px;
    	line-height: 36px;
    	text-align: center;
    	text-decoration: none;
	}
	 .avatar {
    	padding: 15px 35px 0 24px;
    	width: 50px;
    	height: 50px;
    	display:inline;
}

	</style>
</head>
<body>
		<div class="container-fluid">
			<div class="text-center">
				<i class="van-icon van-icon-arrow-left van-nav-bar__arrow"><!----></i>
				MyWallet
			</div>
			<div class="top">
				<p>Member8101</p>
				
					<h4>Personal wallet</h4><i class="fas fa-user-tie"></i>
				
			</div>
			<div class="content">
				<div class="card">
					<div class="card-num">
						<span>₹</span>
						<b>
						 ₹ <?php
                        $my_money=mysqli_fetch_assoc(mysqli_query($conn,"SELECT my_money x FROM tbl_wallet WHERE user_id= '$user_id'"))['x'];
                        echo $my_money; ?>
            
						</b>
						 <!-- <?php  echo "<pre>"; print_r($_SESSION); echo "</pre>"; ?> -->
					</div>
					<div class="card-title">
						Total Assets
					</div>
					<div class="card-text">
						<span >Cashable: <?php


		   $query="SELECT SUM(my_money) AS wallet_balance FROM tbl_wallet WHERE user_id= '$user_id'";
		    $selectresult = mysqli_query($conn,$query);
		    $row=mysqli_fetch_assoc($selectresult);
		    echo $row['wallet_balance'];
           
            
            ?></span>
					</div>
				</div>
				<div class="card-btn">
					<a href="recharge.php" style="border-right: 1px solid">Recharge
					</a>
					<a href="withdrawal1.php">Withdrawal</a>
				</div>
			</div>
		</div>
</body>
</html>