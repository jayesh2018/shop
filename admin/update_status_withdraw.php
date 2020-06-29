<?php
require('../connection.php');

if (isset($_POST['id'])) {
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$updateid = mysqli_real_escape_string($conn, $_POST['updateid']);
	$arr = array();
	$arr['status'] = 1;
	$msg = "Rejected";
	$class = "badge-danger";
	if ($id == 1) {
		$query = "SELECT a.my_money-w.amount x FROM withdrawl_request w
		INNER JOIN tbl_wallet a
		ON a.user_id=w.user_id
		WHERE w.user_id = '$updateid'";
		$result = mysqli_query($conn, $query);
		$fMoney = mysqli_fetch_assoc($result)['x'];
		if ($fMoney >= 100) {
			$query = "UPDATE withdrawl_request SET status='$id' WHERE user_id='$updateid'";
			$result1 = mysqli_query($conn, $query);
			$query = "UPDATE tbl_wallet SET my_money='$fMoney' WHERE user_id='$updateid'";
			$result2 = mysqli_query($conn, $query);
			if (isset($result1) && isset($result2)) {
				$arr['status'] = 1;
				$class = "badge-success";
				$msg = "Withdrawel Request Approved";
			} else {
				$arr['status'] = 0;
				$msg = "Server error";
			}
		} else {
			$arr['status'] = 1;
			$msg = "Insufficient wallet Balance < 100";
			$class = "badge-warning";
		}
	} else if ($id == 2) {
		$query =  "UPDATE withdrawl_request SET status='$id' WHERE user_id='$updateid'";
		if (mysqli_query($conn, $query)!== null) {
		} else {
			$arr['status'] = 0;
			$msg = "Server error";
		}
	} else {
		$msg = "Unidentified Request";
		$arr['status'] = 0;
	}
	$arr['html'] = "<span class='badge " . $class . "'>" . $msg . "</span>";
}
header('Content-Type:application/json');
echo json_encode($arr);
