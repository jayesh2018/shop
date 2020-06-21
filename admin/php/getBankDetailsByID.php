<?php
// session_start();
require('./../../connection.php');
// print_r($_POST);
if(isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $query = "SELECT * FROM bank_details WHERE user_id = $id";
    $result = mysqli_query($conn, $query);
    $response = array();
    if(mysqli_num_rows($result)>0) {
        $row = $result->fetch_object();
        $response["status"] = 1;
        // $response['html'] = $result->fetch_object();
        $html = "<p>IFSC : " . $row->ifsc
        ."<p>A/c number : " . $row->account
        ."<p>Bank Name : " . $row->bank
        ."<p>Branch : " . $row->branch;

        $response["html"] = $html;
    } else {
        $response["status"] = 0;
        $response["html"] = "Not Found!";
    }
    echo json_encode($response);
}

?>