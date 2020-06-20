<?php

session_start();

require('connection.php');


    
        $user_id = $_SESSION['user_id'];
        
        

  
if( isset($_POST['name']) && isset($_POST['ifsc']) && isset($_POST['account']) && isset($_POST['branch']) && isset($_POST['bank'])){
    
     
        $name = $_POST['name'];
        $ifsc = $_POST['ifsc'];
        $account = $_POST['account'];
        $branch = $_POST['branch'];
        $bank = $_POST['bank'];
        
             
            
            
            $userId=mysqli_fetch_assoc(mysqli_query($conn, "SELECT user_id x FROM  bank_details WHERE user_id='$user_id'"))['x'];
            
            
            // echo $userId.'<br>';

  if ( $userId == '')
  {
      
    //   echo $userId.'1';


 $query ="INSERT INTO `bank_details`(`user_id`,`name`,`ifsc`, `account`,`branch`,`bank`) VALUES ('$user_id','$name','$ifsc', '$account','$branch','$bank')";

// echo $query;

}
        else
        {
    //   echo $userId.'2';

            
          $query = "UPDATE  `bank_details` SET name='$name',ifsc='$ifsc',account='$account',branch='$branch',bank='$bank' WHERE  user_id= '$user_id'";
        //   echo $query;

          
          
        }
     

        
        
        $result = mysqli_query($conn,$query);
        if($result){
      echo "success";
        }
      
    }

?>



