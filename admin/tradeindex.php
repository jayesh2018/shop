<?php
session_start();
require("../connection.php");
$query = "SELECT choice,SUM(money) as 'total' FROM `purchased` where choice in('red','green','violet') GROUP BY choice ";
$result = mysqli_query($conn, $query);

$query1 = "SELECT choice,SUM(money) as 'total'FROM `purchased` where choice not in('red','green','violet') GROUP BY choice ";
$result1 = mysqli_query($conn, $query1);
?>
<html>

<head>
  <!-- Meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Current Trade Status</title>
  <!-- Bootstrap css -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Acme&family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="tradestyle.css">
</head>

<body>
  <div class=" row heading">
    <div class="admin">
      <h1>Current Trade Status</h1>
    </div>
    <div class="btnn">
      <a href="logout.php" style="float:right" class="btn btn-lg btn-outline-danger">LogOut</a>
    </div>

  </div>
  <div class="container">
    <div class=" row clr main">
      <?php
      if ($result->num_rows > 0) {

        while ($row = $result->fetch_object()) {
      ?>
          <div class="col-lg-4">
            <center><button type="button" class="btn btn-lg" style="color:white;background-color:<?= $row->choice; ?>">
                <div class="row">
                  <h3><?= $row->choice; ?></h3>
                </div>
                <div class="row">
                  <h4>Rs.<span><?= $row->total; ?></span></h4>
                </div>
              </button></center>
          </div>
      <?php }
      } ?>
    </div>
  </div>
  <div class="container">
    <div class="row">

      <?php
      if ($result1->num_rows > 0) {

        while ($row1 = $result1->fetch_object()) {
      ?>
          <div class="col-lg-2.5 num">
            <center><button style="color:white" type="button" class="chn btn btn-lg">
                <div class="row">
                  <h3><?= $row1->choice + 1; ?></h3>
                </div>
                <div class="row">

                  <h5>Rs.<span><?= $row1->total; ?></span></h5>
                </div>
              </button></center>
          </div>
      <?php }
      } ?>

    </div>
  </div>
  <div class="row">
    <a href="select_winner.php" class="btn btn-lg declare btn-warning">Declare result</a>
  </div>
</body>

</html>