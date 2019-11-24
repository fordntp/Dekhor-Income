<?php
include 'config.php';

$conn = mysqli_connect("$host","$dbuser","$dbpass","$dbtable");
mysqli_query($conn,"SET NAMES UTF8");


if(mysqli_connect_error())
    echo "***SYSTEM : CONNECTION_ERROR***";

 $get_month = date('m');