
<?php 
session_start();
require ('connection.php');
if($_SESSION['user_id']!='' || $_SESSION['user_id']!=null){
    
   
        $user_id = $_SESSION['user_id'];}
if(!isset($_SESSION['user']))
         {
            echo '<script>
        
        location.href="login.php";
    </script>';
         }
          ?> 
<!DOCTYPE html>
<html>
    <head>
        <!-- Meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Profile</title>
       <!-- Bootstrap css -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<style>
    .member {
  font-family: arial;
  font-size: 18px;
  font-weight: 900;
}
</style>
    </head>
    <body>
      
      <header>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
          <div class="container">
            <a class="navbar-brand" href="#">Shop Gold</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Account</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="cart/cart.php">Cart</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="wigo/Wigo.php">winGo</a>
              </li> 
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
          </div>
        </nav>
      </header>
<div class="container-fluid mt-5">
    <!-- for the member and setting -->
<div class="d-flex bd-highlight">
<div class="p-2 bd-highlight">
    <i class='fas fa-user-check' style='font-size:36px'></i>
</div>
    <div class="p-2 flex-grow-1 bd-highlight">
      <p class="member"> <?php echo $_SESSION['user'];?></p>
    </div>
    <div class="p-2 bd-highlight">
       <p class="member"><i class='fas fa-tools' style='font-size:24px'></i> &nbsp Setting</p>
    </div>
</div>
<!-- for the Balance section -->
<div class="container d-flex">
<div class="member p-2 flex-grow-1" text>
    Available Balance
    <p>
    <?php


		   $query="SELECT SUM(my_money) AS wallet_balance FROM tbl_wallet WHERE user_id= '$user_id'";
		    $selectresult = mysqli_query($conn,$query);
		    $row=mysqli_fetch_assoc($selectresult);
		    echo $row['wallet_balance'];
           
            
            ?>
</p>
</div>
<div class="member p-2">
    Integrals
</div>
</div>
</div>
<!-- For horizontal buttons -->
<div class="container-fluid btn-group btn-group-lg mb-3 mt-3">
    <button type="button" class="btn btn-primary"><i class='fas fa-shopping-cart' style='font-size:24px'></i>&nbsp Undeliver</button>
  <button type="button" class="btn btn-primary"><i class='fas fa-truck' style='font-size:24px'></i> &nbsp UnReceive</button>
  <button type="button" class="btn btn-primary"><i class='fas fa-wallet' style='font-size:24px'></i> &nbsp Refund</button>
  <button type="button" class="btn btn-primary"><i class="far fa-copy" style='font-size:24px'></i>&nbsp All Orders</button>


</div>

<!-- the Button Group Vertical -->
<div class="container">
    
        <button type="button" onclick="location.href='7.php'" class="btn btn-secondary btn-block">Red Envelop</button>
        <button type="button" onclick="location.href='PromoPages/myPromotion.php'" class="btn btn-secondary btn-block">My Promotion</button>
        <button type="button" onclick="location.href='wallet.php'" class="btn btn-secondary btn-block">My Wallet</button>
        <button type="button" onclick="location.href='bank_details.php'" class="btn btn-secondary btn-block">My Bank</button>
        <button type="button" onclick="location.href='myaddress.php'" class="btn btn-secondary btn-block">My Address</button>
        <button type="button" onclick="location.href='3.php'" class="btn btn-secondary btn-block">Account Security</button>
        <button type="button" onclick="location.href='Aboutus.php'" class="btn btn-secondary btn-block">About us</button>
        <button type="button" onclick="location.href='winner.php'" class="btn btn-secondary btn-block">Show Winner History</button>
        <button type="button" onclick="location.href='Complaints.php'" class="btn btn-secondary btn-block">Complaints &amp Suggestions</button>
        <button type="button" onclick="location.href='logout.php'" class="btn btn-secondary btn-block">Sign Out</button>
     

</div>

<!-- Bootstrap jquery and javasript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>
