<?php
require('./../connection.php');
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

/*
if(isset($result)) {
    $query = "SELECT customer_id,money FROM purchased WHERE choice IN ('$color',$digit)";
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
  // output data of each row
        while($row = $result->fetch_assoc()) {
            $customer_id = $row['customer_id'];
            $money = $row['money'];
            $money=$money+($money*0.98);
            $query = "UPDATE tbl_wallet set my_money = my_money + $money where user_id='$customer_id'";
            $result = mysqli_query($conn, $query);
            // print_r($conn);
            echo "success";
        }
    }  else {
        echo "if2";
    }
} else {
    echo "if1";
}
*/
function createInClause($arr)
{
    return '\'' . implode('\', \'', $arr) . '\'';
}
