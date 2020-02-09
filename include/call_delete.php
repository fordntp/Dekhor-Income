<?php

include 'database.php';
session_start();
$user_id = $_SESSION['user_id'];
$wallet_id = $_SESSION['wallet_id'];

$item_id = mysqli_real_escape_string($conn, $_REQUEST['id']);

/*-----------------------BALANCE Calculation----------------------------------------------------------------------------*/

// Get record data
$selectRecord = "SELECT * FROM dekhor_record WHERE id = '$item_id' ;";
$qry1 = mysqli_query($conn, $selectRecord);
while ($data = mysqli_fetch_array($qry1)) {
    $value = normalizeDecimal($data['value']);
    $type = $data['type'];
}

// Get current balance data
$selectWallet = "SELECT * FROM dekhor_wallet WHERE id = '$wallet_id' ;";
$qry3 = mysqli_query($conn, $selectWallet);
while ($data = mysqli_fetch_array($qry3)) {
    $Balance = $data['balance'];
}

//Check type IN ? OUT
if ($type == "IN") {
    $NewBalance = $Balance - $value;

    $update = "UPDATE dekhor_wallet SET balance = '$NewBalance', last_update = '$get_date' WHERE id = '$wallet_id';";
    $qry2 = mysqli_query($conn, $update);

} else if ($type == "OUT") {
    $NewBalance = $Balance + $value;

    $update = "UPDATE dekhor_wallet SET balance = '$NewBalance', last_update = '$get_date' WHERE id = '$wallet_id';";
    $qry2 = mysqli_query($conn, $update);

} else if ($type == "TRF") {
    // Developing
}
/*----------------------------------------------------------------------------------------------------------------------------------------*/

// Delete item from record
$deleteRecord = "DELETE FROM dekhor_record WHERE id = '$item_id' ;";
$qry4 = mysqli_query($conn, $deleteRecord);

echo 1;
