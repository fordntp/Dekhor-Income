<?php

include 'database.php';

session_start();
$user_id = $_SESSION['user_id'];
$wallet_id = $_SESSION['wallet_id'];
$dayNew = 0;
$dayOld = 0;
$sum_IN = 0;
$sum_OUT = 0;
$sum_TRF = 0;
$month = $_REQUEST['month'];
$year = $_REQUEST['year'];

$MonthArr = array();
$DayArr = array();

/*$cmd = "SELECT * , Day(a.create_date) as day FROM dekhor_record a JOIN dekhor_category b ON a.category_id = b.id
WHERE /*a.wallet_id a.user_id = '1' AND Month(a.create_date) = '11'
ORDER BY Date(a.create_date) DESC;";*/

$cmd = "SELECT * , a.id as item_id, day(a.create_date) as day FROM dekhor_record a JOIN dekhor_category b ON a.category_id = b.id
            WHERE a.wallet_id = '$wallet_id' /* a.user_id = */ AND ( month(a.create_date) = '$month' && year(a.create_date)='$year' )
            ORDER BY a.create_date DESC;";

$qry = mysqli_query($conn, $cmd);
$numRows = mysqli_num_rows($qry);

if ($numRows > 0) {
    while ($data = mysqli_fetch_array($qry)) {
        $dayNew = $data['day'];
        $item_id = $data['item_id'];
        $create_date = $data['create_date'];
        $create_date = date("d/m/y", strtotime($create_date));
        $category_icon = $data['category_icon'];
        $category_theme = $data['category_theme'];
        $category_name = $data['category_name'];
        $type = $data['type'];
        $memo = $data['memo'];
        $value = $data['value'];

        $infoArr = array(
            "item_id" => $item_id,
            "create_date" => $create_date,
            "category_icon" => $category_icon,
            "category_theme" => $category_theme,
            "category_name" => $category_name,
            "type" => $type,
            "memo" => $memo,
            "value" => ($type == "OUT" ? '- ' . number_format($value, 2) . '' : number_format($value, 2)),
        );

        if (($dayNew == $dayOld) || ($dayOld == 0)) {

            array_push($DayArr, $infoArr);

            if ($type == "IN") {
                $sum_IN = $sum_IN + $value;
            } else if ($type == "OUT") {
                $sum_OUT = $sum_OUT + $value;
            } else if ($type == "TRF") {
                $sum_TRF = $sum_TRF + $value;
            }

            $dayOld = $dayNew;
        } else {
            $SumArr = array(
                "sum_IN" => number_format($sum_IN, 2),
                "sum_OUT" => number_format($sum_OUT, 2),
                "sum_TRF" => number_format($sum_TRF, 2),
            );

            array_push($DayArr, $SumArr);
            array_push($MonthArr, $DayArr);

            unset($DayArr);
            $DayArr = array();
            unset($SumArr);
            $SumArr = array();
            $sum_TRF = 0;
            $sum_OUT = 0;
            $sum_IN = 0;

            array_push($DayArr, $infoArr);

            if ($type == "IN") {
                $sum_IN = $sum_IN + $value;
            } else if ($type == "OUT") {
                $sum_OUT = $sum_OUT + $value;
            } else if ($type == "TRF") {
                $sum_TRF = $sum_TRF + $value;
            }

            $dayOld = $dayNew;
        }

    }

    $SumArr = array(
        "sum_IN" => number_format($sum_IN, 2),
        "sum_OUT" => number_format($sum_OUT, 2),
        "sum_TRF" => number_format($sum_TRF, 2),
    );

    array_push($DayArr, $SumArr);
    array_push($MonthArr, $DayArr);

// echo "<pre>";
    // print_r($MonthArr);
    // echo "<pre>";

    $json_arr = json_encode($MonthArr, JSON_UNESCAPED_UNICODE);
    echo $json_arr;
} else {
    echo 0;
}

// echo json_encode($MonthArr, JSON_UNESCAPED_UNICODE);
