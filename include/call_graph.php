<?php
    include 'database.php';
    $month = $_REQUEST['month'];
    $year = $_REQUEST['year'];
    $month = mysqli_real_escape_string($conn,$month);
    $year = mysqli_real_escape_string($conn,$year);
    $BIG_ARR = array();
    $cat_arr = array();
    $sum_arr = array();
    $color_arr = array();
    $sum = 0;

    $cmd = "SELECT * FROM dekhor_record a JOIN dekhor_category b ON a.category_id = b.id 
            WHERE month(create_date)=$month AND year(create_date)=$year 
            ORDER BY a.category_id ASC;";
    $qry = mysqli_query($conn,$cmd);
    while($data = mysqli_fetch_array($qry))
    {
        $cat_name = $data['category_name'];
        $cat_id = $data['category_id'];
        $cat_color = $data['category_color'];
        $value = $data['value'];
        $sum = $sum + $value;
        //ARRAY CATEGORY
        if(!in_array($cat_name,$cat_arr))
        {
            array_push($cat_arr,$cat_name);
            array_push($color_arr,$cat_color);
            array_push($sum_arr,$sum);
            $sum = 0;
        }
    }
    array_push($BIG_ARR,$cat_arr);
    array_push($BIG_ARR,$sum_arr);
    array_push($BIG_ARR,$color_arr);

    array_multisort($BIG_ARR[1],SORT_DESC,$BIG_ARR[2],$BIG_ARR[0]);

     echo "<pre>";
     print_r($BIG_ARR);
     echo "<pre>";

    $BIG_ARR = json_encode($BIG_ARR, JSON_UNESCAPED_UNICODE);
    echo $BIG_ARR;
?>