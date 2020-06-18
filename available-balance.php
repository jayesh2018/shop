<?php

include_once 'php/db.php';

$database = new Database();
$db = $database->connect();

$sql = 'SELECT * FROM customer WHERE customer_id = 1';
        $stmt = $db->prepare($sql);

        if ($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $balance =       $row['balance'];
        }
        else{
            echo 'error';
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Gold</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <script src="https://kit.fontawesome.com/18dd5346aa.js" crossorigin="anonymous"></script>
    <style>
        .row {
            margin: 0;
        }
    </style>


</head>

<body>
    <div class="fade-body">
        <div class="text-center pb-2"
            style="background-image: -webkit-linear-gradient(rgb(150, 35, 35),rgba(197, 43, 43, 0.897))">
            <div class="px-md-5 text-light">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column">
                        <h3>Available Balance</h3>
                        <h3>₹ 350</h3>
                        <span>No.9JGKTNZSDWXS1272</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <a class="btn btn-light" href="">Recharge ></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="conteiner-fluid">
            <div>
                <ul class="justify-content-around nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="picky-tab" data-toggle="tab" href="#picky" role="tab"
                            aria-controls="picky" aria-selected="true">Picky</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="parity-tab" data-toggle="tab" href="#parity" role="tab"
                            aria-controls="parity" aria-selected="false">Parity</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="spare-tab" data-toggle="tab" href="#spare" role="tab"
                            aria-controls="spare" aria-selected="false">Spare</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="bacone-tab" data-toggle="tab" href="#spare" role="tab"
                            aria-controls="bacone" aria-selected="false">Bacone</a>
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
                                <span>9JGKTNZSDWXS1272</span>
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
                            <button class="btn btn-success btn-block jClass" onclick="toggleUp('green')">Join Green</button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-block jClass" style="background-color: violet;"
                                onclick="toggleUp('violet')">Join Violet</button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-danger btn-block jClass" onclick="toggleUp('red')">Join Red</button>
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="row justify-content-between mb-2">
                            <div class="col-md-2">
                                <button class="btn btn-info btn-block jClass" onclick="toggleUp('0')">0</button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-info btn-block jClass" onclick="toggleUp('1')">1</button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-info btn-block jClass" onclick="toggleUp('2')">2</button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-info btn-block jClass" onclick="toggleUp('3')">3</button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-info btn-block jClass" onclick="toggleUp('4')">4</button>
                            </div>
                        </div>
                        <div class="row justify-content-between mb-2">
                            <div class="col-md-2">
                                <button class="btn btn-info btn-block jClass" onclick="toggleUp('5')">5</button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-info btn-block jClass" onclick="toggleUp('6')">6</button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-info btn-block jClass" onclick="toggleUp('7')">7</button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-info btn-block jClass" onclick="toggleUp('8')">8</button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-info btn-block jClass" onclick="toggleUp('9')">9</button>
                            </div>
                        </div>
                    </div>
                    <hr class="border border-danger mx-3">
                    <div class="container">
                        <div
                            class="d-flex justify-content-between border-left border-right px-md-4 border-danger border-rounded">
                            <div>
                                <h5>Picky Record</h5>
                            </div>
                            <div>
                                <h5>
                                    <a class="text-decoration-none text-muted" href="">More ></a>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <hr class="border border-danger mx-3">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Period</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Number</th>
                                    <th scope="col">Result</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">20200603235</th>
                                    <td>3799</td>
                                    <td>9</td>
                                    <td>
                                        <div
                                            style="background-color: green; width: 15px; height: 15px; border-radius: 50%;">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">20200603235</th>
                                    <td>3799</td>
                                    <td>5</td>
                                    <td>
                                        <div
                                            style="background-color: violet; width: 15px; height: 15px; border-radius: 50%;">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">20200603235</th>
                                    <td>3799</td>
                                    <td>7</td>
                                    <td>
                                        <div
                                            style="background-color: red; width: 15px; height: 15px; border-radius: 50%;">
                                        </div>
                                    </td>
                                </tr>
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


    <!-- slide-up-section -->

    <div class="slide-up bg-light p-2 invisible">
        <div class="d-flex pl-2">
            <h1 id="slide-up-heading" class="text-light p-2" style="border-radius: 20px;"></h1>
        </div>
        <hr class="mt-0 mb-4 border-top border-dark">
        <div class="row">
            <div class="col-md-6">
                <label for="">Contract Money</label>
                <select name="" id="" class="form-control">
                    <option value="">Select value</option>
                    <option value="10">10</option>
                    <option value="100">100</option>
                    <option value="1000">1000</option>
                    <option value="10000">10000</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="">Number</label>
                <div>
                    <div class="d-flex justify-content-between">
                        <button id="three" class="btn btn-dark px-5">3</button>
                        <button id="five" class="btn btn-dark px-5">5</button>
                        <button id="ten" class="btn btn-dark px-5">10</button>
                    </div>
                    <br>
                    <div>
                        <button id="minus" class="btn btn-dark rounded-circle">-</button>
                        <span id="req-value" class="bg-light mx-1">3</span>
                        <button id="plus" class="btn btn-dark rounded-circle">+</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3 d-flex justify-content-center">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">I agree the <span class="text-primary">Presale
                        management rule</span></label>
            </div>
        </div>

        <br><br>
        <div class="row">
            <div class="col-md-4">
                <button class="btn btn-block btn-dark close-btn">Cancel</button>
            </div>
            <div class="col-md-8">
                <button class="btn btn-block btn-success">Confirm</button>
            </div>
        </div>
    </div>





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
    <script src="available-balance.js"></script>

</body>

</html>