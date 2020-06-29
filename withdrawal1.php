<?php
session_start();
require('connection.php');
if ($_SESSION['user_id'] != '' || $_SESSION['user_id'] != null) {
  $user_id = $_SESSION['user_id'];
} else {
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
  <style>
    .solid {
      border-style: solid;

    }
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

<body>
  <h1 style="text-align: center;">WITHDRAWAL PAYMENT</h1>
  <div class="top-title text-center py-2" style="font-size: 23px; font-weight: 700;color: green;">
    MyBalance
    <span style="margin-left: 10px; font-size: 22px;">
      ₹ <?php
        $query = "SELECT my_money x FROM tbl_wallet WHERE user_id = $user_id";
        $my_money = mysqli_fetch_assoc(mysqli_query($conn, $query))['x'];
        echo $my_money; ?>
    </span>
  </div>
  <form action="withdrawinc.php" method="post">
    <div class="col-sm-4"><label>Enter amount to withdraw<span class="text-danger">*</span>
      </label><input class="form-control txtOnly" name="amount" type="text" id="withdraw"></div>
    <br><br>
    <div class="solid">
      <div class="col-sm-6"><strong> Note:</strong></div>

      <label class="lead pl-3 py-3">Amount <1500 Rs, fee Rs30</label> <br>
          <label class="lead pl-3">Amount>1500 Rs，fee 2%</label>
    </div>
    <br>
    <div class="solid">
      <p><strong>Single withdrawal limit</strong></p>
      <p class="ml-2">maximum amount ₹ 10000</p>
      <p class="ml-2">maximum amount ₹ 31</p>
    </div>

    <br>
    <div class="solid">
      <p><strong>Service Availabel</strong></p>
      <p class="ml-2"> Days: Monday to Saturday</p>
      <p class="ml-2">Time: 10:00am to 23:59pm</p>
    </div>
    <br>
    <div class=col-sm-6>
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Withdrawal Amount</button>

    </div>

    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">

            <h4 class="modal-title">Enter Password</h4>
          </div>
          <div class="modal-body">
            Password: <input type="password" name="password" id="password"> </input>


          </div>
          <div class="modal-footer">
            <button type="submit" id="amount" class="btn btn-primary" data-dismiss="modal" onclick="amount">Submit</button>
  </form>
  <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
  </div>
  </div>

  </div>
  </div>


  <script>
    $(document).ready(function() {
      $("#amount").click(function() {
        var pass = $("#password").val();
        console.log(pass);
        var withdraw = $('#withdraw').val();

        console.log(withdraw);
        $.post('./php/sendWithdrawelRequest.php', {
          "pass": pass,
          "amount": withdraw
        }, function(data) {
          console.log(data);
          data = JSON.parse(data);
          if (data.success == 1) {
            $('#withdraw').val('');
            alert('Done');
          } else {
            alert('Wrong Password');
          }

        })
      });
    });
  </script>

</body>

</html>