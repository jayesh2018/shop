<?php
session_start();

if (isset($_POST['update_name'])) {
    include 'db.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    $customer_table = 'register_table';

    //$customer_id = 9;
    $customer_id = $_SESSION['user_id'];

    $name   =    $_POST["name"];

    $query = 'UPDATE ' . $customer_table . ' SET name = :name WHERE id = :customer_id';

    $stmt = $db->prepare($query);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':customer_id', $customer_id);

    if ($stmt->execute()) {

        header("Location: 3.php?message=name updated");
    } else {
        header("Location: 3.php?error=notadded");
    }
} else if (isset($_POST['update_password'])) {
    include 'db.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    $customer_table = 'register_table';
    //$customer_id = 9;
    $customer_id = $_SESSION['user_id'];

    $new_password   =    $_POST["new_password"];
    $old_password   =    $_POST["old_password"];

    $query = 'SELECT * FROM register_table WHERE id = ?';

    // Prepare statement
    $stmt = $db->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $customer_id);

    // Execute query
    $stmt->execute();

    $num = $stmt->rowCount();

    if ($num > 0) {

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $db_password =       $row['Password'];
        if ($db_password == $old_password) {

            $query = 'UPDATE ' . $customer_table . ' SET password = :new_password WHERE id = :customer_id';

            $stmt = $db->prepare($query);

            $stmt->bindParam(':new_password', $new_password);
            $stmt->bindParam(':customer_id', $customer_id);
            
            if ($stmt->execute()) {

                header("Location: 3.php?message=name updated");
            } else {
                header("Location: 3.php?error=notadded");
            }
        }
    }
} else {
    header("Location: 3.php?error=accessdenied");
    exit();
}
