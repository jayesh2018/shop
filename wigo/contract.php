<?php

session_start();

require('../connection.php');
print_r($_POST);
/*
if($_SESSION['user_id']!='' || $_SESSION['user_id']!=null) {
    // print_r($_POST);
    $customer_id = $_SESSION['user_id'];
    $my_money = mysqli_fetch_assoc(mysqli_query($conn,"SELECT my_money x  FROM tbl_wallet WHERE user_id= '$customer_id'")) ['x'];
    // echo $my_money;
    if($my_money < 100) {
        echo "<script type='text/javascript'>alert('Your Balance Less Than 100');</script>";
        echo '<script>location.href="http://shopgold.xyz/wigo/Wigo.php";</script>';
    } else if(isset($_POST['money']) && isset($_POST['choice']) && isset($_POST['number'])) {
        $amount = $_POST['money']* $_POST['number'];
        $choice = $_POST['choice'];
        if ($my_money < $amount) {
          echo "<script type='text/javascript'>alert('Insufficient Balance');</script>";
          echo '<script>location.href="http://shopgold.xyz/wigo/Wigo.php";</script>';
        } else{
            $query = "INSERT INTO `purchased`(`money`,`choice`, `customer_id`) VALUES ('$amount','$choice', '$customer_id')";
            $result = mysqli_query($conn,$query);
            if($result){
                $my_money = $my_money - $amount;
                $query = "UPDATE  `tbl_wallet` SET my_money='$my_money' WHERE  user_id= '$customer_id'";
                $result = mysqli_query($conn,$query);
                if($result){

                    echo '<script>location.href="http://shopgold.xyz/wigo/Wigo.php";</script>';
                }
            }
        }
    }
}

*/