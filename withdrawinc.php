<?php
session_start();

if (isset($_POST['withdraw'])) {
    include 'db.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    $customer_id = $_SESSION['user_id'];
    $amount   =    $_POST["amount"];
    $password   =    $_POST["password"];

    $sql = 'SELECT * FROM registration_table WHERE id = :customer_id';
    $stmtp = $db->prepare($sql);

    $stmtp->bindParam(':customer_id', $customer_id);

    if ($stmt->execute()) {
        $num = $stmt->rowCount();

        if ($num > 0) {

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $db_password =       $row['Password'];

            if ($db_password == $password) {
                $sql = 'SELECT * FROM tbl_wallet WHERE user_id = :customer_id';
                $stmtp = $db->prepare($sql);

                $stmtp->bindParam(':customer_id', $customer_id);

                if ($stmt->execute()) {
                    $num = $stmt->rowCount();

                    if ($num > 0) {

                        $row = $stmt->fetch(PDO::FETCH_ASSOC);

                        $balance =       $row['my_money'];

                        if ($balance > $amount) {
                            $balance = $balance - $amount;
                            $sql = 'UPDATE tbl_wallet SET my_money = :balance WHERE user_id = :customer_id';
                            $stmtp = $db->prepare($sql);

                            $stmtp->bindParam(':balance', $balance);

                            if ($stmt->execute()) {
                                header("Location: withdrawal1.php?message=success");
                            }
                        } else {
                            header("Location: withdrawal1.php?error=insufficient balance");
                        }
                    }
                }
            } else {
                header("Location: withdrawal1.php?error=wrong password");
            }
        }
    }
} else {
    header("Location: myaddress.php?error=accessdenied");
    exit();
}
