<?php
session_start();

include_once 'db.php';


// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$customer_id = $_SESSION['user_id'];
$previous_address = "";

// Create query
$query = 'SELECT * FROM customer_address WHERE customer_id = ?';

// Prepare statement
$stmt = $db->prepare($query);

// Bind ID
$stmt->bindParam(1, $customer_id);

// Execute query
$stmt->execute();

$num = $stmt->rowCount();

if ($num > 0) {

  $result = array();

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    array_push($result, $row);
  }
  $arrlength = count($result);
  //print_r($result);

  for ($i = 0; $i < $arrlength; $i++) {

    $customer_address_id = $result[$i]['customer_address_id'];
    $full_name = $result[$i]['full_name'];
    $phone_number = $result[$i]['phone_number'];
    $address = $result[$i]['address'];
    $state = $result[$i]['state'];
    $city = $result[$i]['city'];
    $zipcode = $result[$i]['pin_code'];

    $previous_address .= "
            
            <div class=\"contact-info-left\">
                        <h2>Select from previous addresses</h2>
                        <p>Name: $full_name </p>
                        <ul>
                            <li>
                                <p><i class=\"fas fa-map-marker-alt\"></i>Address: $address,<br> $city </p>
                            </li>
                            <li>
                                <p><i class=\"fas fa-phone-square\"></i>Phone: $phone_number</p>
                            </li>
                        </ul>
                        <div class=\"row\">
                                <div class=\"col-md-6 mb-3\">
                                <form action=\"myaddressinc.php\" method=\"post\">
                                    <input type=\"hidden\" name = \"select_address\" value=\" $customer_address_id \">
                                    <button class=\"btn btn-primary\" type=\"submit\" name=\"select_address_btn\">Select this address</button>
                                </form>
                                </div>
                                <div class=\"col-md-6 mb-3\">
                                <form action=\"myaddressinc.php\" method=\"post\">
                                    <input type=\"hidden\" name = \"delete_address\" value=\" $customer_address_id \">
                                    <button class=\"btn btn-danger\" type=\"submit\" name=\"delete_address_btn\">Delete this address</button>
                                </form>
                                </div>
                        </div>
                    </div>
                    <br>
            
            ";
  }
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>My Address</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


  <style media="screen">
    .jumbotron {
      margin: 10px;
      padding: 20px;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;


    }
  </style>
</head>

<body>
<div class="container">
<?php
echo $previous_address;
?>
</div>
  <div class="container">
    <div class="jumbotron" style="width:500px;">
      <h1 class="text-center">My Address</h1>
      <form method="post" action="myaddressinc.php">
        <div class="form-group">
          <label>Full-Name :</label><br>
          <input type="text" name="billing_name">
        </div>
        <div class="form-group">
          <label>Mobile-Number :</label><br>
          <input type="number" name="phone_number">
        </div>
        <div class="form-group">
          <label>Pin-Code :</label><br>
          <input type="text" name="zipcode">
        </div>
        <div class="form-group">
          <label>State :</label><br>
          <input type="text" name="state">
        </div>
        <div class="form-group">
          <label>Town/City:</label><br>
          <input type="text" name="city">
        </div>
        <div class="form-group">
          <label>address:</label><br>
          <input type="text" name="address">
        </div>
        <button class="btn btn-primary" type="submit" name="myaddress">+New Address</button>
      </form>

    </div>

  </div>


</body>

</html>