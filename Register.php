<?php
$code = '';
if (isset($_GET['code'])) {
  $code = $_GET['code'];
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
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body id="bg">
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">
          <pre>
    					<img class="img-fluid"height="70px" width="70px"src="logo.jpg" alt="logo">  SHOP GOLD</a></pre>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="login.php">Account</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cart/cart.php">Cart</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
      </div>
    </nav>
  </header>

  <div class="container" id="register">

    <!-- <form class="mx-auto p-3" method="post" action="insertPage.php"> -->
    <form class="mx-auto p-3" method="post" action="#">
      <div class="form-group">
        <label for="example-tel-input">Name</label>
        <input type="text" name="name" class="form-control" id="example-tel-input">

      </div>
      <div class="form-group">
        <label for="example-tel-input">Mobile Number</label>
        <input type="tel" name="mobile" class="form-control" id="example-tel-input">

      </div>
      <div class="form-group">
        <label for="InputPassword">Create Password</label>
        <input type="password" name="pass" class="form-control" id="InputPassword">
      </div>
      <div class="form-group">
        <label for="InputPassword">Confirm Password</label>
        <input type="password" name="cpass" class="form-control" id="InputPassword">
      </div>
      <!--  <div class="form-group">
        <label for="example-tel-input">Verification Code</label>
        <input type="code" name="otp" class="form-control" id="example-tel-input" >
      </div> -->
      <div class="form-group">
        <label for="example-tel-input">Recommendation code</label>
        <input type="text" name="rcode" class="form-control" id="example-tel-input" value="<?php echo $code ?>" disabled>
      </div>

      <div class="col text-center">
        <button type="submit" name="submit" class="btn btn-outline-success btn-lg" aria-pressed="true">Get OTP</button>
        <!-- <button type="submit" name="submit1" class="btn btn-outline-success btn-lg" aria-pressed="true">OTP</button> -->
      </div>

    </form>

  </div>


  <!-- Bootstrap jquery and javasript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> -->
  <script src="src\js\register.js"></script>
</body>

</html>