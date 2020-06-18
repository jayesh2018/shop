<?php

include_once 'db.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();


if (isset($_POST['contract'])) {
    include_once 'db.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    $money   =    $_POST["money"];
    $number   =    $_POST["number"];
    $color   =    $_POST["color"];
    $customer_id = $_SESSION['user_id'];

    $query = 'INSERT INTO color SET money = :money, number = :number, color = :color, customer_id = :customer_id';

    $stmt = $db->prepare($query);

    $stmt->bindParam(':money', $money);
    $stmt->bindParam(':number', $number);
    $stmt->bindParam(':color', $color);
    $stmt->bindParam(':customer_id', $customer_id);


    if ($stmt->execute()) {

        $sql = "SELECT * FROM customer WHERE customer_id ='$customer_id'";
        $stmt = $db->prepare($sql);

        if ($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $balance =       $row['balance'];

            $total = $money * $number;
            if ($balance > $total) {
                $balance = $balance - $total;

                $sql = "UPDATE customer SET balance = :balance WHERE customer_id ='$customer_id'";
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':balance', $balance);
                if ($stmt->execute()) {
                    header("Location: ../wigo/Wigo-balance.php?message=success");
                }
            } else {
                header("Location: ../available-balance.php?error=insufficient balace");
            }
        }
    }
} elseif (isset($_GET['result'])) {

    $result = $_GET['result'];

    date_default_timezone_set("Asia/Kolkata");
    $date = date("Y-m-d h:i:s");
    $d = strtotime($date);
    $d = $d - 150;
    $datetime = date("Y-m-d h:i:s", $d);

    echo $datetime . "<br>";

    $sql = 'SELECT * FROM color where color = :result AND time>= :datetime';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':result', $result);
    $stmt->bindParam(':datetime', $datetime);

    if ($stmt->execute()) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $customer_id = $row['customer_id'];
            $money = $row['money'];
            $number = $row['number'];

            $bid_money = $money * $number;

            $extra_money = $bid_money - ($bid_money / 10);
            $return_money = $bid_money + $extra_money;

            echo $return_money . "<br>";

            $sql = 'SELECT * FROM customer where customer_id = :customer_id LIMIT 0,1';
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':customer_id', $customer_id);

            if ($stmt->execute()) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $balance = $row['balance'];

                $balance = $balance + $return_money;

                $sql = 'UPDATE customer SET balance = :balance WHERE customer_id = :customer_id';
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':balance', $balance);
                $stmt->bindParam(':customer_id', $customer_id);
                if ($stmt->execute()) {
                    header("Location: ../available-balance.php?message=success");
                    echo 'success';
                }
            }
        }
    }
} else {
    header("Location: ../available-balance.php");
}
