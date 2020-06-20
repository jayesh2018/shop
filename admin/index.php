<?php 
session_start();
require('../connection.php');
if(!isset($_SESSION['admin']))
{
  echo '<script>
  location.href="login.php";
  </script>';
}

?>
<html>
<head>
  <!-- Meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- Bootstrap css -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Acme&family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="adminstyle.css">
</head>

<body>
  <div class=" row heading">
    <div class="admin">
      <h1>Welcome to Admin Panel</h1>
    </div>
    <div class="btnn">
      <a href="logout.php" style="float:right" class="btn btn-lg btn-outline-danger">LogOut</a>
    </div>

  </div>
  <div class="button-section main container">
<div class="center">
    <center><a href="tradeindex.php"  class="btn btn-lg btn-danger main">View Current Trade</a></center>
    <center><a href="users.php"  class="btn btn-lg btn-danger main">View Users</a></center>
    <center><a href="select_winner.php"  class="btn btn-lg btn-danger main">Declare Winner</a></center>
    <center><a href="result.php" class="btn btn-lg btn-danger main">View Winner History</a></center>
    <center><a href="withdrawl.php" class="btn btn-lg btn-danger main">Pending withdrawal Requests</a></center>
</div>
</div>
</body>

</html>
