<?php

include 'database.php';
session_start();
$user_id = $_SESSION['user_id'];
$wallet_id = $_SESSION['wallet_id'];
//$wallet_id = 1;
$memo = mysqli_real_escape_string($conn, $_REQUEST['textmemo']);
$categoryID = mysqli_real_escape_string($conn, $_REQUEST['categoryid']);
$value = mysqli_real_escape_string($conn, $_REQUEST['value']);
$type = mysqli_real_escape_string($conn, $_REQUEST['type']);
$value = normalizeDecimal($value);

/*echo $memo."<br>";
echo $categoryID."<br>";
echo $value."<br>";
echo $type."<br>";*/

//ADD to dekhor_record
$cmd = "INSERT INTO dekhor_record (user_id,type,category_id,wallet_id,memo,value,create_date) VALUES ('$user_id','$type','$categoryID','$wallet_id','$memo','$value','$get_date');";
$qry = mysqli_query($conn, $cmd);

/*-----------------------BALANCE Calculation----------------------------------------------------------------------------*/
$select = "SELECT * FROM dekhor_wallet WHERE id = '$wallet_id' AND user_id = '$user_id';";
$qry3 = mysqli_query($conn, $select);
while ($data = mysqli_fetch_array($qry3)) {
    $Balance = $data['balance'];
}

//echo $Balance."<br>";

if ($type == "IN") {
    $NewBalance = $Balance + $value;

    $update = "UPDATE dekhor_wallet SET balance = '$NewBalance', last_update = '$get_date' WHERE id = '$wallet_id' AND user_id = '$user_id';";
    $qry2 = mysqli_query($conn, $update);

} else if ($type == "OUT") {
    $NewBalance = $Balance - $value;

    $update = "UPDATE dekhor_wallet SET balance = '$NewBalance', last_update = '$get_date' WHERE id = '$wallet_id' AND user_id = '$user_id';";
    $qry2 = mysqli_query($conn, $update);

} else if ($type == "TRF") {
    // Developing
}
/*----------------------------------------------------------------------------------------------------------------------------------------*/

echo 1;
