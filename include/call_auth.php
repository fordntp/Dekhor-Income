<?php

include 'database.php';
session_start();
$user = $_REQUEST['username'];
$pass = $_REQUEST['password'];
$user = mysqli_real_escape_string($conn, $user);
$pass = mysqli_real_escape_string($conn, $pass);
$info = array();
$cmd = "SELECT *, b.id as wallet_id, a.id as user_id FROM dekhor_user a JOIN dekhor_wallet b ON a.id = b.user_id WHERE username='$user' && password = '$pass' ORDER BY b.id ASC;";
$qry = mysqli_query($conn, $cmd);
$RowCheck = mysqli_num_rows($qry);
if ($RowCheck > 0) {
    $data = mysqli_fetch_array($qry);
    $_SESSION['user_id'] = $data['user_id'];
    $_SESSION['wallet_id'] = $data['wallet_id'];
    $_SESSION['uname'] = $data['username'];
    echo 1;
} else {
    echo 0;
}
