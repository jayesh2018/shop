<?php
session_start();
require('./../connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invite Friends</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <script src="https://kit.fontawesome.com/18dd5346aa.js" crossorigin="anonymous"></script>

    <style>
        html {
            height: 100%;
        }

        body {
            height: 100%;
            background-image: -webkit-linear-gradient(65deg, rgb(6, 71, 68), rgb(7, 145, 155));
            color: white;
            text-align: center;
        }

        .qr-container {
            width: 300px;
            height: 300px;
            background-color: white;
            border-radius: 50%;
        }

        .qr-container img {
            width: 200px;
            height: 200px;
        }

        .row {
            margin: 0;
        }

        .code-container {
            padding: 10px 0;
        }

        .code-container span {
            padding: 10px 50px;
            font-size: x-large;
            border-radius: 50px;
            background-color: white;
            color: black;
        }

        .tooltip {
            position: relative;
            display: inline-block;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 140px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 150%;
            left: 50%;
            margin-left: -75px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>

</head>

<body>
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <h1 class="py-3">Invite Friends</h1>
            <div class="d-flex justify-content-center">
                <div class="mt-3 qr-container d-flex justify-content-center align-items-center">
                    <img src="images/demoQr.png" alt="">
                </div>
            </div>
            <div class="mt-3 code-container">
                <h4 class="mb-5">Scan QR code above or use Invite Code below</h4>
                <input id="myCode" type="text" value="<?php
                                            if (isset($_SESSION['user_id'])) {
                                                $user_id = $_SESSION['user_id'];
                                                $query = "SELECT referral_code code FROM `referral_codes` WHERE user_id = '$user_id'";
                                                $result = mysqli_query($conn, $query);
                                                $result = mysqli_fetch_array($result);
                                                echo "http://shopgold.xyz/Register.php?code=".$result['code'];
                                            } else {
                                                echo ("failed<br>");
                                            }
                                            ?>">
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</body>

</html>