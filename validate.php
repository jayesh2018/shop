<?php
session_start();
require('connection.php');
if (isset($_POST['Mobile']) && isset($_POST['pass'])){

	$mobile = $_POST['Mobile'];
    $password = $_POST['pass'];
    $slquery = "SELECT * FROM `register_table` WHERE MobileNo='$mobile' and Password='$password'";
    // echo $slquery;
    $selectresult = mysqli_query($conn,$slquery);
    if(mysqli_num_rows($selectresult)>0)
    {
    	$rows = mysqli_fetch_array($selectresult);
    	$_SESSION['user'] = $rows['MobileNo'];
        $_SESSION['user_id'] = $rows['user_id'];
    	echo '<script>
            location.href="index.php";
            </script>';
    }
    else{
	    echo '<script>
            alert("username or password does not match");
            location.href="login.php";
            </script>';
    }
}

?>