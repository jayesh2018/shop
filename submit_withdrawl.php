<?php
require('connection.php');
if($_POST['user_id'] && $_POST['withdrawl']){
    if (isset($_POST['user_id']) && isset($_POST['withdrawl'])){
        $user_id = $_POST['user_id'];
     
        $amount = $_POST['withdrawl'];
       
    

        $query = "INSERT INTO `withdrawl_request`(`user_id`,`amount`) VALUES ('$user_id','$amount')";
        echo $query;
        
        $result = mysqli_query($conn,$query);
        if($result){
            echo '<script>
location.href="index.php";
    </script>';
        }
       }

    }
else{
    echo '<script>

location.href="signUp.php";
    </script>';
}
?>