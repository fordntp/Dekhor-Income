<?php
include 'config.php';

$conn = mysqli_connect("$host", "$dbuser", "$dbpass", "$dbtable");
mysqli_query($conn, "SET NAMES UTF8");

if (mysqli_connect_error()) {
    echo "***SYSTEM : CONNECTION_ERROR***";
}

$get_date = date("Y-m-d H:i:s");
$get_month = date('m');

function normalizeDecimal($val, int $precision = 2): string
{
    $input = str_replace(' ', '', $val);
    $number = str_replace(',', '.', $input);
    if (strpos($number, '.')) {
        $groups = explode('.', str_replace(',', '.', $number));
        $lastGroup = array_pop($groups);
        $number = implode('', $groups) . '.' . $lastGroup;
    }
    return bcadd($number, 0, $precision);
}
