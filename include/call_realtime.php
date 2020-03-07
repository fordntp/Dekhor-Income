<?php

include 'database.php';
session_start();
$user_id = $_SESSION['user_id'];
$wallet_id = $_SESSION['wallet_id'];

// Get record data
$selectRecord = "SELECT last_update FROM dekhor_wallet WHERE user_id = '$user_id' ;";
$qry1 = mysqli_query($conn, $selectRecord);
while ($data = mysqli_fetch_array($qry1)) {
    $last_update = $data['last_update'];
}
$timestamp = strtotime($last_update);
if ($last_update != '0000-00-00 00:00:00') {
    $json_arr = json_encode($timestamp, JSON_UNESCAPED_UNICODE);
    echo $json_arr;
} else {
    echo 0;
}
