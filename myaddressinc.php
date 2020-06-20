<?php
session_start();

if(isset($_POST['myaddress'])){
include 'db.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  $customer_address_table = 'customer_address';
  
  $customer_id = $_SESSION['user_id'];

  $billing_name   =    $_POST["billing_name"];
  $phone_number   =    $_POST["phone_number"];
  $city   =    $_POST["city"];
  $state   =    $_POST["state"];
  $zipcode   =    $_POST["zipcode"];
  $address   =    $_POST["address"];

  $query = 'INSERT INTO customer_address SET full_name = :billing_name, address = :address, city = :city, state = :state, phone_number = :phone_number, pin_code = :zipcode, customer_id = :customer_id';
  
          $stmt = $db->prepare($query);
        
        $stmt->bindParam(':billing_name', $billing_name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':zipcode', $zipcode);
        $stmt->bindParam(':phone_number', $phone_number);
        $stmt->bindParam(':customer_id', $customer_id);
        
        if($stmt->execute()) {

          $customer_address_id = $db->lastInsertId();
            $_SESSION['customer_address_id'] = $customer_address_id;  
            header("Location: myaddress.php?message=added");
        }
        else{
          header("Location: myaddress.php?error=notadded");
        }

}
elseif(isset($_POST['select_address_btn'])){

    $customer_address_id   =    $_POST["select_address"];
    $_SESSION['customer_address_id'] = $customer_address_id;
    header("Location: myaddress.php?message=selected");

}
elseif(isset($_POST['delete_address_btn'])){

  include_once 'db.php';

    $database = new Database();
    $db = $database->connect();

    $customer_address_table = 'customer_address';
    $customer_address_id   =    $_POST["delete_address"];

    $query = 'DELETE FROM ' . $customer_address_table . ' WHERE customer_address_id = :customer_address_id';
  
          $stmt = $db->prepare($query);
        
        $stmt->bindParam(':customer_address_id', $customer_address_id);
        
        if($stmt->execute()) {

            header("Location: myaddress.php?message=Deleted");
        }
        else{
          header("Location: myaddress.php?error=notdeleted");
        }
}
else{
  header("Location: myaddress.php?error=accessdenied");
      exit();
}