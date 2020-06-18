<?php
    session_start();
    require('./../connection.php');
    $id =$_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Promotion</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <script src="https://kit.fontawesome.com/18dd5346aa.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="text-center pb-2" style="background-image: -webkit-linear-gradient(rgb(150, 35, 35),rgba(197, 43, 43, 0.897))">
        <h1 class="text-light m-0 py-3">My Promotion</h1>
        <div class="px-md-5 text-light">
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-column">
                    <h1>₹ 0</h1>
                    <span>MY BONUS</span>
                </div>
                <div class="d-flex align-items-center">
                    <a class="btn btn-light" href="apply-to-balance.php">Apply to Balance</a>
                </div>
            </div>
        </div>
    </div>
    <div class="conteiner-fluid">
        <div class="d-flex justify-content-md-around py-3">
            <div>
                <h5><a class="text-decoration-none" href="bonus-record.php">Bonus Record</a></h5>
            </div>
            <i class="fas fa-ellipsis-v fa-3x text-muted"></i>
            <div>
                <h5><a class="text-decoration-none" href="apply-record.php">Apply Record</a></h5>
            </div>
        </div>
    </div>
    <hr class="border border-danger mx-3">
    <div class="container">
        <div class="d-flex justify-content-between border-left border-right px-md-4 border-danger border-rounded">
            <div>
                <h5>Promotion</h5>
            </div>
            <div>
                <h5><a class="text-decoration-none text-muted" href="promotion.php">Promotion Record ></a></h5>
            </div>
        </div>
    </div>
    <hr class="border border-danger mx-3">
    <div class="container-fluid py-3">
        <div class="row">
            <div class="col-6">
                <a class="btn btn-dark btn-block" href="">Level 1</a>
            </div>
            <div class="col-6">
                <a class="btn btn-light border border-dark btn-block" href="">Level 2</a>
            </div>
        </div>
    </div>
    <div class="container-fluid py-3">
        <div class="row">
            <div class="col-6">
                <div class="d-flex flex-column pl-2">
                    <h6 class="text-muted">Total People</h6>
                    <span>
                    <?php
                        $count=mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) x FROM referral_codes WHERE referred_from=(SELECT referral_code FROM referral_codes WHERE user_id = '$id')"))['x'];
                        echo $count;
                    ?>
                    </span>
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex flex-column pl-2">
                    <h6 class="text-muted">Contribution(₹)</h6>
                    <span>₹ 0.00</span>
                </div>
            </div>
        </div>
    </div>
    <hr class="border border-danger mx-3">
    <div class="container">
        <div class="d-flex justify-content-between border-left border-right px-md-4 border-danger border-rounded">
            <div>
                <h5>Invite Friends</h5>
            </div>
            <div>
                <h5><a class="text-decoration-none text-muted" href="invite.php">Go Now ></a></h5>
            </div>
        </div>
    </div>
    <hr class="border border-danger mx-3">




    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>

</html>