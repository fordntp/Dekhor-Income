<?php
include 'database.php';

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);
$password_encrypt = encryptPass($password);

$cmd_check = "SELECT username FROM dekhor_user WHERE username = '$username';";
$qry_check = mysqli_query($conn, $cmd_check);
$rows = mysqli_num_rows($qry_check);
if ($rows > 0) {
    echo 0;
}
// already have user
else {

    $cmd_insert = "INSERT INTO dekhor_user (username,password,role) VALUES ('$username','$password_encrypt', 1);";
    $qry_insert = mysqli_query($conn, $cmd_insert);

    // AUTO CREATE WALLET
    $cmd_select = "SELECT * FROM dekhor_user WHERE username = '$username' ;";
    $qry_select = mysqli_query($conn, $cmd_select);
    while ($data = mysqli_fetch_array($qry_select)) {
        $user_id = $data['id'];
    }

    $cmd_insert2 = "INSERT INTO dekhor_wallet (type,user_id,wallet_name,balance,create_date) VALUES ('wallet','$user_id','PiggyBank','0.00',now());";
    $qry_select2 = mysqli_query($conn, $cmd_insert2);

    echo 1; // complete

}
