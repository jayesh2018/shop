<?php
session_start();
// 
// print_r($_SESSION);
require('connection.php');
if($_SESSION['user_id']!='' || $_SESSION['user_id']!=null){
    
     
        $user_id     = $_SESSION['user_id'];
    
        $amount      = $_SESSION['amount']/100;
// echo $amount;
        $totalamount = 0;
        
                
        $my_money = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(my_money) x FROM tbl_wallet WHERE user_id= '$user_id'"))['x'];
//         echo $my_money;
        $totalamount = $amount + $my_money;

        if ($my_money == '') {

            $query = "INSERT INTO `tbl_wallet`(`user_id`, `my_money`) VALUES ('$user_id', '$totalamount')";

        } else {

            $query = "UPDATE  `tbl_wallet` SET my_money='$totalamount' WHERE  user_id= '$user_id'";

        }
     

        
        
        $result = mysqli_query($conn,$query);
        if($result){

            echo '<script>
location.href="wigo/Wigo.php";
    </script>';
        }
      
    }

?>



