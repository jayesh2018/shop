<?php
session_start();
require('../connection.php');
if ($_SESSION['user_id'] != '' || $_SESSION['user_id'] != null) {


    $user_id = $_SESSION['user_id'];
}
if (!isset($_SESSION['user'])) {
    echo '<script>

        location.href="http://shopgold.xyz/login.php";
    </script>';
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Gold</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <script src="https://kit.fontawesome.com/18dd5346aa.js" crossorigin="anonymous"></script>
    <style>
        .row {
            margin: 0;
        }

        .dot {
            height: 25px;
            width: 25px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
        }

        .green {
            background-color: green;
        }

        .violet {
            background-color: #60c;
        }

        .red {
            background-color: red;
        }
    </style>


</head>

<body>
    <div class="fade-body">
        <div class="text-center pb-2" style="background-image: -webkit-linear-gradient(rgb(150, 35, 35),rgba(197, 43, 43, 0.897))">
            <div class="px-md-5 text-light">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column">
                        <h3>Available Balance</h3>
                        <h3 id="balance">
                            ₹ <?php
                                $my_money = mysqli_fetch_assoc(mysqli_query($conn, "SELECT my_money x FROM tbl_wallet WHERE user_id= '$user_id'"))['x'];
                                echo $my_money; ?>
                            </span></h3>
                   <span><?php echo $_SESSION['user_id']; ?></span>
                    </div>
                    <div class="d-flex align-items-center">
                        <a class="btn btn-light" href="http://shopgold.xyz/recharge.php">Recharge ></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="conteiner-fluid">
            <div>
                <ul class="justify-content-around nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="picky-tab" data-toggle="tab" href="#picky" role="tab" aria-controls="picky" aria-selected="true" data-val="Picky Record" onclick="myFunction(this)">Picky</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="parity-tab" data-toggle="tab" href="#picky" role="tab" aria-controls="parity" aria-selected="false" data-val="Parity Record" onclick="myFunction(this)">Parity</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="spare-tab" data-toggle="tab" href="#picky" role="tab" aria-controls="spare" aria-selected="false" data-val="Spare Record" onclick="myFunction(this)">Spare</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="bacone-tab" data-toggle="tab" href="#picky" role="tab" aria-controls="bacone" aria-selected="false" data-val="Bacone Record" onclick="myFunction(this)">Bacone</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="myTabContent">
                <!-- Picky -->
                <div class="tab-pane fade show active" id="picky" role="tabpanel" aria-labelledby="picky-tab">
                    <div class="px-2 pt-2">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="text-muted">Period</h6>
                               <span><?php echo $_SESSION['user_id']; ?></span>
                            </div>
                            <div class="d-flex align-items-center justify-content-center flex-column">
                                <h6 class="text-muted">Count Down</h6>
                                <h3 class="timer"></h3>
                            </div>
                        </div>
                    </div>
                    <hr class="border border-danger mx-3">
                    <div class="row pt-2">
                        <div class="col-md-4">
                            <button id="green" class="btn btn-success btn-block jClass" data-value="green" onclick="toggleUp('green')">Join Green</button>
                        </div>
                        <div class="col-md-4">
                            <button id="violet" class="btn btn-block jClass" data-value="violet" style="background-color: violet;" onclick="toggleUp('violet')">Join Violet</button>
                        </div>
                        <div class="col-md-4">
                            <button id="red" class="btn btn-danger btn-block jClass" data-value="red" onclick="toggleUp('red')">Join Red</button>
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="row justify-content-between mb-2">
                            <div class="col-md-2">
                                <button class="btn btn-info btn-block jClass" data-value="0" onclick="toggleUp('0')">0</button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-info btn-block jClass" data-value="1" onclick="toggleUp('1')">1</button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-info btn-block jClass" data-value="2" onclick="toggleUp('2')">2</button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-info btn-block jClass" data-value="3" onclick="toggleUp('3')">3</button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-info btn-block jClass" data-value="4" onclick="toggleUp('4')">4</button>
                            </div>
                        </div>
                        <div class="row justify-content-between mb-2">
                            <div class="col-md-2">
                                <button class="btn btn-info btn-block jClass" data-value="5" onclick="toggleUp('5')">5</button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-info btn-block jClass" data-value="6" onclick="toggleUp('6')">6</button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-info btn-block jClass" data-value="7" onclick="toggleUp('7')">7</button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-info btn-block jClass" data-value="8" onclick="toggleUp('8')">8</button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-info btn-block jClass" data-value="9" onclick="toggleUp('9')">9</button>
                            </div>
                        </div>
                    </div>
                    <hr class="border border-danger mx-3">
                    <div class="container">
                        <div class="d-flex justify-content-between border-left border-right px-md-4 border-danger border-rounded">
                            <div>
                                <h5 id="record">Picky Record</h5>
                            </div>
                            <div>
                                <h5>
                                    <a class="text-decoration-none text-muted" href="../winner.php">More ></a>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <hr class="border border-danger mx-3">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>

                                    <th scope="col">Color</th>
                                    <th scope="col">Digit</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Period</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM winner_history order by date_added desc limit 5";
                                // echo $query;
                                $result = mysqli_query($conn, $query);
                                if ($result->num_rows > 0) {

                                    while ($row = $result->fetch_assoc()) {
                                        $myarr = json_decode($row['color']);
                                        // echo $myarr;
                                        echo "<td>";
                                        foreach ($myarr as $value) {
                                            echo "<span class='dot " . $value . "'></span>";
                                        }
                                        echo "</td>";

                                        // print_r($colors);
                                        // echo "<td>" . $row['color'] . "</td>";
                                        echo "<td>" . $row['digit'] . "</td>";
                                        echo "<td>" . $row['date_added'] . "</td>";
                                        echo "<td>" . strtotime($row['date_added']) . "</td></tr>";
                                    }
                                } else {
                                    echo "<tr><td>None</td><td>None</td><td>None</td><td>None</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- parity add data -->
                <div class="tab-pane fade" id="parity" role="tabpanel" aria-labelledby="parity-tab">
                    parity
                </div>
                <!-- spare add data -->
                <div class="tab-pane fade" id="spare" role="tabpanel" aria-labelledby="spare-tab">
                    spare
                </div>
                <!-- bacone add data -->
                <div class="tab-pane fade" id="bacone" role="tabpanel" aria-labelledby="bacone-tab">
                    bacone
                </div>

            </div>
        </div>
    </div>
    <form action="contract.php" method="post">
        <div class="slide-up bg-light p-2 invisible">
            <div class="d-flex pl-2">
                <h1 id="slide-up-heading" class="text-light p-2" style="border-radius: 20px;"></h1>
            </div>
            <hr class="mt-0 mb-4 border-top border-dark">
            <div class="row">
                <div class="col-md-6">
                    <label for="">Contract Money</label>
                    <select name="money" id="" class="form-control">
                        <option value="">Select value</option>
                        <option value="10">10</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="500">500</option>
                        <option value="1000">1000</option>
                        <option value="10000">10000</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="">Number</label>
                    <select name="number" id="" class="form-control">
                        <option value="">Select value</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
                </div>

            </div>
            <input type="hidden" name="choice" value="" class="form-control category" id="category">
            <div class="mt-3 d-flex justify-content-center">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">I agree the <span class="text-primary">Presale
                            management rule</span></label>
                </div>
            </div>


            <div class="row">
                <div class="col-md-4">
                    <button class="btn btn-block btn-dark close-btn">Cancel</button>
                </div>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-block btn-success">Confirm</button>
                </div>
            </div>
        </div>
    </form>

    <div class="footer">
        <div class="topnav" id="navbar">
            <a href="Wigo.php" class="active">Wingo</a>
            <a href="http://shopgold.xyz/index.php">Home</a>
            <a href="http://shopgold.xyz/Profile.php">Account</a>
        </div>
    </div>
    <script>
        function myFunction(e) {

            var value = $(e).attr('data-val');
            $('#record').text(value);


        }
    </script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="available-balance.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.jClass').click(function() {
                var button_val = $(this).attr("data-value");
                console.log(button_val);
                document.getElementById('category').value = button_val;
            });
        });
    </script>
    <?php
    include 'footer.php';
    ?>
</body>

</html>