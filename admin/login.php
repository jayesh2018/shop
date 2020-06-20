<?php 
session_start();
require('../connection.php');
if(isset($_SESSION['admin']))
{
  echo '<script>
  location.href="index.php";
  </script>';
}
if(isset($_POST['LoginSbt']))
{
  $email=mysqli_real_escape_string($conn,$_POST['email']);
  $password=md5(mysqli_real_escape_string($conn,$_POST['password']));
  $query = "SELECT * FROM admin where email='".$email."' and password='".$password."'";
  $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result)==1)
  {

    $rows = mysqli_fetch_object($result);
    	$_SESSION['admin'] = $rows->email;
        $_SESSION['admin_id'] = $rows->id;

    echo '<script>
            location.href="index.php";
            </script>';
    }
    else{
	    echo '<script>
            alert("username or password does not match");
            </script>';
    }
  
}


?>
<html>
<head>
  <!-- Meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- Bootstrap css -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>

<body id="bg">



  <div class="container" id="login">
    <div class="mt-5 p-3 text-center">
      <h2>Admin Login</h2>
    </div>

    <form class="mt-3 p-3" method="post" action="#"> 
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
      </div>
      <div class="form-group">
        <label for="InputPassword">Password</label>
        <input type="password" class="form-control" name="password" id="InputPassword">
      </div>

      <!-- <div class="form-group form-check">
        <a href="ResetPassword.html">Forgot password</a>
      </div> -->

      <div class="col text-center">
      <button type="submit" name="LoginSbt" class="btn btn-outline-success btn-lg " aria-pressed="true" onclick="#">Login</button>
        <!-- <button type="button" class="btn btn-outline-success btn-lg" onclick="#">Sign Up</button> -->
      </div>
      <!-- <div hidden>
        <p>Wrong Password..!click on forgot password to reset a new password</p>
        </div> -->
    </form>

  </div>


  <!-- Bootstrap jquery and javasript -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>
