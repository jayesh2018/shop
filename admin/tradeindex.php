<?php
session_start();
require("../connection.php");
$query = "SELECT room,choice,SUM(money) as 'total' FROM `purchased` GROUP BY choice,room order by room";
$result = mysqli_query($conn, $query);

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
      <?php
      $room="";
      if ($result->num_rows > 0) {

        while ($row = $result->fetch_object()) {
            if($room=="" ||$room!=$row->room)
            {
              $room=$row->room;
            ?>
      
    <div class=" row clr main">
              <div class="col-lg-12">
                <h4> <?=$room;?> trades:</h4>
              </div>
              
            <?php }?> 
          <div class="col-lg-4">
          <?php

            if(is_numeric($row->choice))
            {
              $color="#711968";    
            }else
            {
              $color=$row->choice;
            }
            ?>
            <center><button type="button" class="btn btn-lg" style="color:white;background-color:<?= $color; ?>">
                <div class="row">
                  <h3><?= $row->choice; ?></h3>
                </div>
                <div class="row">
                  <h4>Rs.<span><?= $row->total; ?></span></h4>
                </div>
              </button></center>
          </div>
<?php 
          if($room!=$row->room && $room!="")
            {
              ?>
    </div>
  
  
  <?php
            }
 }
      } ?>

</div>

<div class="container">
  <div class="row">
    <a href="select_winner.php" class="btn btn-lg declare btn-warning">Declare result</a>
  </div>
  </div>
</body>

</html>