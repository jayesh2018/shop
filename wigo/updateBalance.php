<?php
require('./../connection.php');

$pickycolor = $_POST['pickycolor'];
$paritycolor = $_POST['paritycolor'];
$sparecolor = $_POST['sparecolor'];
$baconecolor = $_POST['baconecolor'];
$pickynumber = $_POST['pickynumber'];
$paritynumber = $_POST['paritynumber'];
$sparenumber = $_POST['sparenumber'];
$baconenumber = $_POST['baconenumber'];
print_r($_POST);

$stmt = $conn->prepare("UPDATE winner SET color = ?, digit= ? WHERE room = ?");
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
}

$arr = json_decode($pickycolor);
$pickyColorArray = createInClause($arr);

$arr = json_decode($paritycolor);
$parityColorArray = createInClause($arr);

$arr = json_decode($sparecolor);
$spareColorArray = createInClause($arr);

$arr = json_decode($baconecolor);
$baconeColorArray = createInClause($arr);

$query = "SELECT money,choice,room,customer_id FROM purchased WHERE (room = 'parity' AND choice IN ($parityColorArray)) OR (room = 'picky' AND choice IN ($pickyColorArray)) OR(room = 'spare' AND choice IN ($spareColorArray)) OR(room = 'bacone' AND choice IN ($baconeColorArray))";
$result = mysqli_query($conn, $query);

while ($row = $result->fetch_assoc()) {
    print_r($row);
    switch ($row['room']) {
        case 'picky':
            checkWinningColorAndUpdateBalance($row, $pickycolor, $conn);
            break;
        case 'parity':
            checkWinningColorAndUpdateBalance($row, $paritycolor, $conn);
            break;
        case 'spare':
            checkWinningColorAndUpdateBalance($row, $sparecolor, $conn);
            break;
        case 'bacone':
            checkWinningColorAndUpdateBalance($row, $baconecolor, $conn);
            break;
        default:
            print_r($row);
            echo "default case new";
    }
}
function checkWinningColorAndUpdateBalance($row, $roomColor, $conn)
{
    switch ($roomColor) {
        case '["green"]':
        case '["red"]':
            $money = $row['money'];
            if ($money < 100) {
                $money = $money * 1.9;
            } else {
                $money = $money * 1.98;
            }
            $query = "UPDATE tbl_wallet SET my_money = my_money + $money WHERE user_id = " . $row['customer_id'];
            $result1 = mysqli_query($conn, $query);
            echo $result1;
            break;
        case '["red","violet"]':
            echo "two";
            $money = $row['money'];
            switch ($row['choice']) {
                case 'red':
                    if ($money < 100) {
                        $money = $money * 1.45;
                    } else {
                        $money = $money * 1.49;
                    }
                    $query = "UPDATE tbl_wallet SET my_money = my_money + $money WHERE user_id = " . $row['customer_id'];
                    $result1 = mysqli_query($conn, $query);
                    break;
                case 'violet':
                    $money = $money * 4.6;
                    $query = "UPDATE tbl_wallet SET my_money = my_money + $money WHERE user_id = " . $row['customer_id'];
                    $result1 = mysqli_query($conn, $query);
                    break;
                default:
                    echo "came in default case1";
            }
            break;
        case '["green","violet"]':
            echo "three";
            $money = $row['money'];
            switch ($row['choice']) {
                case 'green':
                    if ($money < 100) {
                        $money = $money * 1.45;
                    } else {
                        $money = $money * 1.49;
                    }
                    $query = "UPDATE tbl_wallet SET my_money = my_money + $money WHERE user_id = " . $row['customer_id'];
                    $result1 = mysqli_query($conn, $query);
                    break;
                case 'violet':
                    $money = $money * 4.6;
                    $query = "UPDATE tbl_wallet SET my_money = my_money + $money WHERE user_id = " . $row['customer_id'];
                    $result1 = mysqli_query($conn, $query);
                    break;
                default:
                    echo "came in default case2";
            }
            break;
        default:
            echo "came in default cas3";
    }
}
function createInClause($arr)
{
    return '\'' . implode('\', \'', $arr) . '\'';
}
