<?php

include 'database.php';
session_start();

$ip = getRealip();

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);
$password_encrypt = encryptPass($password);

$info = array();

$cmd = "SELECT *, b.id as wallet_id, a.id as user_id FROM dekhor_user a JOIN dekhor_wallet b ON a.id = b.user_id WHERE username='$username' && password = '$password_encrypt' ORDER BY b.id ASC;";
$qry = mysqli_query($conn, $cmd);
$RowCheck = mysqli_num_rows($qry);
if ($RowCheck > 0) {
    $data = mysqli_fetch_array($qry);
    $_SESSION['user_id'] = $data['user_id'];
    $_SESSION['wallet_id'] = $data['wallet_id'];
    $_SESSION['uname'] = $data['username'];

    //update lastlogin && ip address
    $cmd1 = "UPDATE dekhor_user SET last_login = '$get_date' , ip = '$ip' WHERE id = '" . $_SESSION['user_id'] . "'";
    $qry1 = mysqli_query($conn, $cmd1);
    echo 1;

} else {
    echo 0;
}
