<?php
session_start();
require('connection.php');
if ($_SESSION['user_id']!='' && isset($_POST['pass']) && isset($_POST['amount'])){

	$user_id = $_SESSION['user_id'];
    $password = $_POST['pass'];
    $amount = $_POST['amount'];
    $slquery = "SELECT * FROM `register_table` WHERE Id='$user_id' and Password='$password'";
    $id = $slquery->Id;
        $selectresult = mysqli_query($conn,$slquery);
        $json = array();
        if(mysqli_num_rows($selectresult)>0)
        {
             $query = "UPDATE `tbl_wallet` SET my_money=my_money-$amount WHERE  user_id= '$user_id'";
             
             $selectresult1 = mysqli_query($conn,$query);
        	$rows = mysqli_fetch_array($selectresult);
        	$_SESSION['user'] = $rows['MobileNo'];
            $_SESSION['user_id'] = $rows['Id'];
        $json['success'] = 1; 
        
        
        
    } else {
    
// 	echo '<script>
//         alert("username or password does not match");
//         location.href="index.php";
    // </script>';
    $json['success'] = 0;
    }
    echo json_encode($json);

}

?>