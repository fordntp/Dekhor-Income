<?php

include 'database.php';
session_start();
$user_id = $_SESSION['user_id'];
$wallet_id = $_SESSION['wallet_id'];

$val = mysqli_real_escape_string($conn, $_REQUEST['val']);
$type = (mysqli_real_escape_string($conn, $_REQUEST['type']) == "expensesMemo" ? "OUT" : "IN");
$category = mysqli_real_escape_string($conn, $_REQUEST['category']);
$suggestion = array();

if (isset($val)) {

    $query = "SELECT * FROM dekhor_record WHERE memo LIKE '%{$val}%' AND wallet_id = '$wallet_id' AND category_id = '$category' AND type = '$type' LIMIT 15";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_array($result)) {
            if (!in_array($data['memo'], $suggestion)) {
                array_push($suggestion, $data['memo']);
                // echo "<a href=\"#\" class=\"btn btn-sm mr-0 word\" onclick=\"document.getElementById('expensesMemo').value = this.text;\">" . $data['memo'] . "</a>";
            }
        }

        $json_arr = json_encode($suggestion, JSON_UNESCAPED_UNICODE);
        echo $json_arr;

    } else {
        echo 0;
    }
}
