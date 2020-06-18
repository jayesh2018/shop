<?php
require('connection.php');
if ($_POST['pass'] == $_POST['cpass']) {
    if (isset($_POST['Mobile']) && isset($_POST['pass'])) {
        $mobile = $_POST['Mobile'];
        $password = $_POST['pass'];
        $cpassword = $_POST['cpass'];
        $name = $_POST['name'];
        $code = $_POST['rcode'];
        $slquery = "SELECT * FROM `register_table` WHERE MobileNo='$mobile'";

        $selectresult = mysqli_query($conn, $slquery);
        if (mysqli_num_rows($selectresult) > 0) {
            echo '<script>
                    alert("Already Exist");location.href="login.php";
                </script>';
        }
        $query = "INSERT INTO `register_table`(`name`,`MobileNo`, `Password`) VALUES ('$name','$mobile', '$password')";
        $result = mysqli_query($conn, $query);
        $last_id = $conn->insert_id;
        $query = "INSERT INTO `tbl_wallet`(`user_id`, `my_money`) VALUES ('$last_id', '0')";
        $result1 = mysqli_query($conn, $query);
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $referralCode = substr(str_shuffle($permitted_chars), 0, 10);
        if(isset($code)) {
            $query = "INSERT INTO referral_codes(user_id, referral_code, referred_from) VALUES ('$last_id','$referralCode','$code')";
            $result2 = mysqli_query($conn, $query);
            $query = "UPDATE tbl_wallet SET my_money = my_money + 20 WHERE user_id = (SELECT user_id FROM referral_codes WHERE referral_code = '$code')";
            $result2 = mysqli_query($conn, $query);
        } else{
            $query = "INSERT INTO referral_codes(user_id, referral_code, referred_from) VALUES ('$last_id','$referralCode','')";
            $result2 = mysqli_query($conn, $query);
        }


        if ($result1 && $result && $result2) {
            // print_r($_POST);
            echo '<script>
                location.href="login.php";
                </script>';
        }
    }
} else {
    echo '<script>
            alert("password does not match");
                location.href="signUp.php";
            </script>';
}
