<?php

include 'database.php';

$sum_IN = 0;
$sum_OUT = 0;
$sum_ALL = 0;
$month = $_REQUEST['month'];
$year = $_REQUEST['year'];

session_start();
$user_id = $_SESSION['user_id'];
$wallet_id = $_SESSION['wallet_id'];


$cmd = "SELECT * FROM dekhor_record WHERE wallet_id = '$wallet_id' /*user_id = */ and ( month(create_date)='$month' && year(create_date)='$year' );";
$qry = mysqli_query($conn, $cmd);
while ($data = mysqli_fetch_array($qry)) {
    $type = $data['type'];
    $value = $data['value'];
    if ($type == "IN") {
        $sum_IN = $sum_IN + $value;
    } else {
        $sum_OUT = $sum_OUT + $value;
    }
}

$sum_ALL = $sum_IN - $sum_OUT;

$cmd2 = "SELECT balance FROM dekhor_wallet WHERE id = '$wallet_id';";
$qry2 = mysqli_query($conn, $cmd2);
while ($data2 = mysqli_fetch_array($qry2)) {
    $balance = $data2['balance'];
}

$json_arr = array(
    "sum_IN" => number_format($sum_IN, 2),
    "sum_OUT" => number_format($sum_OUT, 2),
    "sum_ALL" => number_format($sum_ALL, 2),
    "balance" => number_format($balance, 2),
);

// echo "<pre>";
// print_r($json_arr);
// echo "<pre>";

$json_arr = json_encode($json_arr, JSON_UNESCAPED_UNICODE);
echo $json_arr;
