<?php
require('./../connection.php');

$pickycolor = $_POST['pickycolor'];
$paritycolor = $_POST['paritycolor'];
$baconecolor = $_POST['baconecolor'];
$pickynumber = $_POST['pickynumber'];
$paritynumber = $_POST['paritynumber'];
$sparenumber = $_POST['sparenumber'];
$baconenumber = $_POST['baconenumber'];
print_r($_POST);

$stmt = $conn->prepare("UPDATE winner SET color = '?', digit= ? WHERE room = '?'");
$stmt->bind_param("sis", $color, $digit, $room);

// set parameters and execute
$color = $pickycolor;
$digit = $pickynumber;
$room = "picky";
$stmt->execute();

$color = $paritycolor;
$digit = $paritynumber;
$room = "parity";
$stmt->execute();

$color = $sparecolor;
$digit = $sparenumber;
$room = "spare";
$stmt->execute();

$color = $baconecolor;
$digit = $baconenumber;
$room = "bacone";
$stmt->execute();

$stmt->close();

$arr = json_decode($color);
$colorArr = createInClause($arr);

$query = "SELECT money,choice,customer_id FROM purchased WHERE (choice = $pickynumber AND room = 'picky') OR (choice = $paritynumber AND room = 'parity') OR (choice = $sparenumber AND room = 'spare') OR (choice = $baconenumber AND room = 'bacone')";
$result = mysqli_query($conn, $query);
while ($row = $result->fetch_assoc()) {
    $money = $row['money'];
    $money = $money * 8.2;
    $query = "UPDATE tbl_wallet SET my_money = my_money + $money WHERE user_id = " . $row['customer_id'];
    $result1 = mysqli_query($conn, $query);
    echo $result1;
}

$arr = json_decode($pickycolor);
$pickyColorArray = createInClause($arr);

$arr = json_decode($paritycolor);
$parityColorArray = createInClause($arr);

$arr = json_decode($sparecolor);
$spareColorArray = createInClause($arr);

$arr = json_decode($baconecolor);
$baconeColorArray = createInClause($arr);

$query = "SELECT money,choice,customer_id FROM purchased WHERE (room = 'parity' AND choice IN ($parityColorArray)) OR (room = 'picky' AND choice IN ($pickyColorArray)) OR(room = 'spare' AND choice IN ($spareColorArray)) OR(room = 'bacone' AND choice IN ($baconeColorArray))";
$result = mysqli_query($conn, $query);
// print_r();
$result = mysqli_query($conn, $query);
switch ($color) {
    case '["green"]':
    case '["red"]':
        while ($row = $result->fetch_assoc()) {
            $money = $row['money'];
            if ($money < 100) {
                $money = $money * 1.9;
            } else {
                $money = $money * 1.98;
            }
            $query = "UPDATE tbl_wallet SET my_money = my_money + $money WHERE user_id = " . $row['customer_id'];
            $result1 = mysqli_query($conn, $query);
        }
        echo "one";
        break;
    case '["red","violet"]':
        echo "two";
        while ($row = $result->fetch_assoc()) {
            $money = $row['money'];
            switch ($row['choice']) {
                case 'red':
                    if ($money < 100) {
                        $money = $money*1.45;
                    } else {
                        $money = $money*1.49;
                    }
                    break;
                case 'violet':
                    $money = $money*4.6;
                    break;
                default:
                    echo "came in default case1";
            }
            $query = "UPDATE tbl_wallet SET my_money = my_money + $money WHERE user_id = " . $row['customer_id'];
            $result1 = mysqli_query($conn, $query);
        }
        break;
    case '["green","violet"]':
        echo "three";
        while ($row = $result->fetch_assoc()) {
            $money = $row['money'];
            switch ($row['choice']) {
                case 'green':
                    if ($money < 100) {
                        $money = $money*1.45;
                    } else {
                        $money = $money*1.49;
                    }
                    break;
                case 'violet':
                    $money = $money*4.6;
                    break;
                default:
                    echo "came in default case2";
            }
            $query = "UPDATE tbl_wallet SET my_money = my_money + $money WHERE user_id = " . $row['customer_id'];
            $result1 = mysqli_query($conn, $query);
        }
        break;
    default:
        echo "came in default cas3";
}



$conn->close();
/*
$color = $_POST['color'];
$digit = $_POST['number'];



$query = "UPDATE winner SET color = '$color', digit= $digit";
// echo $query;
$result = mysqli_query($conn, $query);

$arr = json_decode($color);
$colorArr = createInClause($arr);

$query = "SELECT money,choice,customer_id FROM purchased WHERE choice IN ($digit)";
$result = mysqli_query($conn, $query);
while ($row = $result->fetch_assoc()) {
    $money = $row['money'];
    $money = $money * 8.2;
    $query = "UPDATE tbl_wallet SET my_money = my_money + $money WHERE user_id = " . $row['customer_id'];
    $result1 = mysqli_query($conn, $query);
    echo $result1;
}


$query = "SELECT money,choice,customer_id FROM purchased WHERE choice IN ($colorArr)";
$result = mysqli_query($conn, $query);
// print_r();
$result = mysqli_query($conn, $query);
switch ($color) {
    case '["green"]':
    case '["red"]':
        while ($row = $result->fetch_assoc()) {
            $money = $row['money'];
            if ($money < 100) {
                $money = $money * 1.9;
            } else {
                $money = $money * 1.98;
            }
            $query = "UPDATE tbl_wallet SET my_money = my_money + $money WHERE user_id = " . $row['customer_id'];
            $result1 = mysqli_query($conn, $query);
        }
        echo "one";
        break;
    case '["red","violet"]':
        echo "two";
        while ($row = $result->fetch_assoc()) {
            $money = $row['money'];
            switch ($row['choice']) {
                case 'red':
                    if ($money < 100) {
                        $money = $money*1.45;
                    } else {
                        $money = $money*1.49;
                    }
                    break;
                case 'violet':
                    $money = $money*4.6;
                    break;
                default:
                    echo "came in default case1";
            }
            $query = "UPDATE tbl_wallet SET my_money = my_money + $money WHERE user_id = " . $row['customer_id'];
            $result1 = mysqli_query($conn, $query);
        }
        break;
    case '["green","violet"]':
        echo "three";
        while ($row = $result->fetch_assoc()) {
            $money = $row['money'];
            switch ($row['choice']) {
                case 'green':
                    if ($money < 100) {
                        $money = $money*1.45;
                    } else {
                        $money = $money*1.49;
                    }
                    break;
                case 'violet':
                    $money = $money*4.6;
                    break;
                default:
                    echo "came in default case2";
            }
            $query = "UPDATE tbl_wallet SET my_money = my_money + $money WHERE user_id = " . $row['customer_id'];
            $result1 = mysqli_query($conn, $query);
        }
        break;
    default:
        echo "came in default cas3";
}
*/
function createInClause($arr)
{
    return '\'' . implode('\', \'', $arr) . '\'';
}



