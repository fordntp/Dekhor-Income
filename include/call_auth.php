<?php

    include 'database.php';
    session_start();
    $user = $_REQUEST['username'];
    $pass = $_REQUEST['password'];
    $user = mysqli_real_escape_string($conn,$user);
    $pass = mysqli_real_escape_string($conn,$pass);
    $info = array();
    $cmd = "SELECT * FROM dekhor_user WHERE username='$user' && password = '$pass';";
    $qry = mysqli_query($conn,$cmd);
    $RowCheck = mysqli_num_rows($qry);
    if($RowCheck > 0)
    {
        $data = mysqli_fetch_array($qry);
        $_SESSION['user_id'] = $data['id'];
        echo 1;
    }
    else
    {
        echo 0;
    }


    
    
?>