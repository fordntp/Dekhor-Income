<?php

include 'database.php';

$user_id = $_SESSION['user_id'];
$dayNew = 0;
$dayOld = 0;
$sum_IN = 0;
$sum_OUT = 0;
$sum_TRF = 0;

$MonthArr = array();
$DayArr = array();

/*$cmd = "SELECT * , Day(a.create_date) as day FROM dekhor_record a JOIN dekhor_category b ON a.category_id = b.id
WHERE /*a.wallet_id a.user_id = '1' AND Month(a.create_date) = '11'
ORDER BY Date(a.create_date) DESC;";*/

$cmd = "SELECT * , Day(a.create_date) as day FROM dekhor_record a JOIN dekhor_category b ON a.category_id = b.id
            WHERE /*a.wallet_id*/ a.user_id = '1' AND Month(a.create_date) = '$get_month'
            ORDER BY Date(a.create_date) DESC;";

$qry = mysqli_query($conn, $cmd);
$numRows = mysqli_num_rows($qry);
while ($data = mysqli_fetch_array($qry)) {
    $dayNew = $data['day'];
    $create_date = $data['create_date'];
    $create_date = date("d/m/Y", strtotime($create_date));
    $category_icon = $data['category_icon'];
    $category_name = $data['category_name'];
    $type = $data['type'];
    $memo = $data['memo'];
    $value = $data['value'];

    $infoArr = array(
        "create_date" => $create_date,
        "category_icon" => $category_icon,
        "category_name" => $category_name,
        "type" => $type,
        "memo" => $memo,
        "value" => $value,
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
            "sum_IN" => $sum_IN,
            "sum_OUT" => $sum_OUT,
            "sum_TRF" => $sum_TRF,
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
    "sum_IN" => $sum_IN,
    "sum_OUT" => $sum_OUT,
    "sum_TRF" => $sum_TRF,
);

array_push($DayArr, $SumArr);
array_push($MonthArr, $DayArr);

echo "<pre>";
print_r($MonthArr);
echo "<pre>";

echo json_encode($MonthArr, JSON_UNESCAPED_UNICODE);
