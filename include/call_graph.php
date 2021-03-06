<?php
include 'database.php';
session_start();
$user_id = $_SESSION['user_id'];
$wallet_id = $_SESSION['wallet_id'];

$month = $_REQUEST['month'];
$year = $_REQUEST['year'];
$request_type = $_REQUEST['type'];
// $type = "IN";
$month = mysqli_real_escape_string($conn, $month);
$year = mysqli_real_escape_string($conn, $year);
$BIG_ARR = array();
$cat_arr = array();
$sum_arr = array();
$color_arr = array();
$icon_arr = array();
$theme_arr = array();
$sum = 0;
$i = -1;

//check empty type
$in_type = 0;
$out_type = 0;
$notempty_arr = array();
$cmd = "SELECT * FROM dekhor_record a JOIN dekhor_category b ON a.category_id = b.id
            WHERE wallet_id = '$wallet_id' AND ( month(create_date)='$month' AND year(create_date)='$year' )
            ORDER BY a.category_id ASC;";
$qry = mysqli_query($conn, $cmd);
$numRows = mysqli_num_rows($qry);
if ($numRows > 0) {
    while ($data = mysqli_fetch_array($qry)) {
        //check empty type
        if ($data['category_type'] == "IN") {
            $in_type = 1;
        } else if ($data['category_type'] == "OUT") {
            $out_type = 1;
        }
    }
}
//check one of $type is empty . define $type to other one.
// $type = ($out_type == 1 ? 'OUT' : 'IN');
if ($out_type == 1 && $in_type == 1) {
    $type = $request_type;
} else if ($out_type == 1) {
    $type = "OUT";
} else {
    $type = "IN";
}

$cmd = "SELECT * FROM dekhor_record a JOIN dekhor_category b ON a.category_id = b.id
            WHERE wallet_id = '$wallet_id' AND ( month(create_date)='$month' AND year(create_date)='$year' ) AND a.type='$type'
            ORDER BY a.category_id ASC;";
$qry = mysqli_query($conn, $cmd);
$numRows = mysqli_num_rows($qry);
if ($numRows > 0) {
    while ($data = mysqli_fetch_array($qry)) {
        $cat_name = $data['category_name'];
        $cat_id = $data['category_id'];
        $cat_color = $data['category_color'];
        $value = $data['value'];
        $cat_theme = $data['category_theme'];
        $cat_icon = $data['category_icon'];
        $value = floatval($value);

        //ARRAY CATEGORY
        if (!in_array($cat_name, $cat_arr)) {
            array_push($cat_arr, $cat_name);
            array_push($color_arr, $cat_color);
            array_push($sum_arr, $value);
            array_push($icon_arr, $cat_icon);
            array_push($theme_arr, $cat_theme);
            $i++;
        } else {
            $sum_arr[$i] = $sum_arr[$i] + $value;
        }
    }
    array_push($BIG_ARR, $cat_arr);
    array_push($BIG_ARR, $sum_arr);
    array_push($BIG_ARR, $color_arr);
    array_push($BIG_ARR, $icon_arr);
    array_push($BIG_ARR, $theme_arr);

    array_multisort($BIG_ARR[1], SORT_DESC, $BIG_ARR[2], $BIG_ARR[0], $BIG_ARR[3], $BIG_ARR[4]);

    //for check empty type
    array_push($notempty_arr, $in_type);
    array_push($notempty_arr, $out_type);
    array_push($BIG_ARR, $notempty_arr);

    // echo "<pre>";
    // print_r($BIG_ARR);
    // echo "<pre>";

    $BIG_ARR = json_encode($BIG_ARR, JSON_UNESCAPED_UNICODE);
    echo $BIG_ARR;
} else {
    echo 0;
}
