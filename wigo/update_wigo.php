<?php

session_start();

require('../connection.php');

// echo "cool";
if($_SESSION['user_id']!='' || $_SESSION['user_id']!=null) {
    $customer_id = $_SESSION['user_id'];
    $my_money = mysqli_fetch_assoc(mysqli_query($conn,"SELECT my_money x  FROM tbl_wallet WHERE user_id= '$customer_id'")) ['x'];
    // echo $my_money;
    // print_r($my_money);
    $winner = mysqli_fetch_assoc(mysqli_query($conn,"SELECT color,digit FROM winner order by game_date desc limit 1"));
    // print_r($winner);
    $data = array();
    $data['color']=$winner['color'];
     $data['digit']=$winner['digit'];
      $data['money']=$my_money;
      echo json_encode($data);
}