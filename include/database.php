<?php
include 'config.php';

date_default_timezone_set("Asia/Bangkok");

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

function getRealip()
{
    if (isset($_SERVER)) {
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
            if (strpos($ip, ",")) {
                $exp_ip = explode(",", $ip);
                $ip = $exp_ip[0];
            }
        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        } else {
            $ip = $_SERVER["REMOTE_ADDR"];
        }
    } else {
        if (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
            if (strpos($ip, ",")) {
                $exp_ip = explode(",", $ip);
                $ip = $exp_ip[0];
            }
        } else if (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
        } else {
            $ip = getenv('REMOTE_ADDR');
        }
    }
    return $ip;
}
