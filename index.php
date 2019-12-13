<?php
include 'navbar.php';
?>

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->
                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <div class="row mb-2">
                                <div class="col-6">
                                    <a class="btn text-darklight text-c-gray" id="currentMonth" onclick="selectMonth();" href="#!"></a>
                                </div>
                                <div class="col-6 text-right">
                                    <a class="text-c-red" href="logout"><i class="feather icon-log-out"></i> ออกจากระบบ</a><br>
                                    <small class="text-muted" style="text-transform: capitalize;"><?=$_SESSION['uname']?></small>
                                </div>
                            </div>
                            <div id="selectMonth" class="form-group" style="display: none">
                                <div class="card bg-white earning-date">
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-4">
                                                <a href="#!" onclick="yearValue('minus');" class="btn text-darklight btn-lg btn-block text-c-gray p-3"><i class="fas fa-angle-left f-40"></i></a>
                                            </div>
                                            <div class="col-4">
                                                <div id="select-year" class="select-year-header text-center p-3"></div>
                                            </div>
                                            <div class="col-4">
                                                <a href="#!" onclick="yearValue('plus');" class="btn text-darklight btn-lg btn-block text-c-gray p-3"><i class="fas fa-angle-right f-40"></i></a>
                                            </div>
                                        </div>
                                        <div class="bd-example bd-example-tabs">
                                            <ul class="nav nav-pills align-items-center justify-content-center" id="pills-tab2" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link show" onclick="monthValue(1);" id="pills-view-jan" data-toggle="pill" href="#view-jan" role="tab" aria-controls="view-jan" aria-selected="false">Jan</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link show" onclick="monthValue(2);" id="pills-view-feb" data-toggle="pill" href="#view-feb" role="tab" aria-controls="view-feb" aria-selected="false">Feb</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link show" onclick="monthValue(3);" id="pills-view-mar" data-toggle="pill" href="#view-mar" role="tab" aria-controls="view-mar" aria-selected="false">Mar</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link show" onclick="monthValue(4);" id="pills-view-apr" data-toggle="pill" href="#view-apr" role="tab" aria-controls="view-apr" aria-selected="false">Apr</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link show" onclick="monthValue(5);" id="pills-view-may" data-toggle="pill" href="#view-may" role="tab" aria-controls="view-may" aria-selected="false">May</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link show" onclick="monthValue(6);" id="pills-view-jun" data-toggle="pill" href="#view-jun" role="tab" aria-controls="view-jun" aria-selected="false">Jun</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link show" onclick="monthValue(7);" id="pills-view-jul" data-toggle="pill" href="#view-jul" role="tab" aria-controls="view-jul" aria-selected="false">Jul</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link show" onclick="monthValue(8);" id="pills-view-aug" data-toggle="pill" href="#view-aug" role="tab" aria-controls="view-aug" aria-selected="false">Aug</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link show" onclick="monthValue(9);" id="pills-view-sep" data-toggle="pill" href="#view-sep" role="tab" aria-controls="view-sep" aria-selected="false">Sep</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link show" onclick="monthValue(10);" id="pills-view-oct" data-toggle="pill" href="#view-oct" role="tab" aria-controls="view-oct" aria-selected="false">Oct</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link show" onclick="monthValue(11);" id="pills-view-nov" data-toggle="pill" href="#view-nov" role="tab" aria-controls="view-nov" aria-selected="false">Nov</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link show active" onclick="monthValue(12);" id="pills-view-dec" data-toggle="pill" href="#view-dec" role="tab" aria-controls="view-dec" aria-selected="true">Dec</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <!--[ daily sales section ] start-->
                                <div class="col-md-12 col-xl-12">
                                    <div class="card Active-visitor">
                                        <div class="card-block text-center">
                                            <div class="row card-active">
                                                <div class="col-md-4 col-4">
                                                    <div class="balance-header" id="sum_in">0.00</div>
                                                    <span class="text-muted">รายรับ</span>
                                                </div>
                                                <div class="col-md-4 col-4">
                                                    <div class="balance-header" id="sum_out">0.00</div>
                                                    <span class="text-muted">รายจ่าย</span>
                                                </div>
                                                <div class="col-md-4 col-4">
                                                    <div class="balance-header" id="sum_balance">0.00</div>
                                                    <span class="text-muted">คงเหลือ</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <ul class="nav nav-tabs" id="myTab" role="tablist" style="display: none;">
                                <li class="nav-item">
                                    <a class="nav-link active" id="transaction-tab" data-toggle="tab" href="#transaction" role="tab" aria-controls="transaction" aria-selected="true">รายการ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="graph-tab" data-toggle="tab" href="#graph" role="tab" aria-controls="graph" aria-selected="false">กราฟ</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="transaction" role="tabpanel" aria-labelledby="transaction-tab">
                                    <div id="transactionsShow" class="row" style="display: none;"></div>

                                    <div class="btn-group dropup fixed-m" style="display: none;">
                                        <button class="btn btn-icon btn-rounded btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="feather icon-plus"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item md-trigger" data-toggle="modal" data-target="#addExpenses" href="#!">รายจ่าย</a>
                                            <a class="dropdown-item md-trigger" data-toggle="modal" data-target="#addIncome" href="#!">รายรับ</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="graph" role="tabpanel" aria-labelledby="graph-tab">
                                    <div id="showGraph" class="row" style="display: none;"></div>

                                <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
                                <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.4.0/dist/chartjs-plugin-datalabels.min.js"></script>
                            </div>

                            <!-- [ Main Content ] end -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->

    <!-- [ addExpenses Modal ] start -->
    <div id="addExpenses" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addExpenses" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="addExpensesTitle">เพิ่มรายจ่าย</h5>
                    <a href="#!" onclick="unselectCategory('OUT');" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                </div>
                <div class="modal-body">
                    <div id="showupExpenses" style="display: none">
                        <div class="input-group mb-3">
                            <input type="text" id="expensesMemo" class="form-control col-8" placeholder="บันทึกช่วยจำ">
                            <input type="text" id="expensesValue" class="form-control col-4 autonumber" placeholder="0.00" aria-label="จำนวนเงิน" aria-describedby="basic-addon2" data-v-min="-99.99" data-v-max="99999999.99">
                            <div class="input-group-append">
                                <button class="btn btn-primary" id="addExpensesbtn" onclick="addExpenses();"><i class="fas fa-check"></i></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="iconCalendar"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" id="expensesDate" aria-describedby="iconCalendar" class="date-input form-control" value="<?=date('Y-m-d')?>" placeholder="วันที่ทำรายการ">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn yellow btn-circle btn-circle-lg select-ex-category" onclick="selectCategory(1, 'yellow', 'OUT');"><i class="fas fa-utensils f-20"></i></button>
                            <div class="h6 text-c-gray">อาหาร</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn deepskyblue btn-circle btn-circle-lg select-ex-category" onclick="selectCategory(2, 'deepskyblue', 'OUT');"><i class="fas fa-bolt f-20"></i></button>
                            <div class="h6 text-c-gray">บิล</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn lime btn-circle btn-circle-lg select-ex-category" onclick="selectCategory(3, 'lime', 'OUT');"><i class="fas fa-taxi f-20"></i></button>
                            <div class="h6 text-c-gray">เดินทาง</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn orange btn-circle btn-circle-lg select-ex-category" onclick="selectCategory(4, 'orange', 'OUT');"><i class="fa fa-shopping-cart f-20"></i></button>
                            <div class="h6 text-c-gray">ช้อปปิ้ง</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn sandybrown btn-circle btn-circle-lg select-ex-category" onclick="selectCategory(5, 'sandybrown', 'OUT');"><i class="fas fa-graduation-cap f-20"></i></button>
                            <div class="h6 text-c-gray">การศึกษา</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn hotpink btn-circle btn-circle-lg select-ex-category" onclick="selectCategory(6, 'hotpink', 'OUT');"><i class="fas fa-briefcase-medical f-20"></i></button>
                            <div class="h6 text-c-gray">สุขภาพ</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn mediumpurple btn-circle btn-circle-lg select-ex-category" onclick="selectCategory(7, 'mediumpurple', 'OUT');"><i class="fas fa-plane f-20"></i></button>
                            <div class="h6 text-c-gray">ท่องเที่ยว</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn limegreen btn-circle btn-circle-lg select-ex-category" onclick="selectCategory(8, 'limegreen', 'OUT');"><i class="fas fa-laptop f-20"></i></button>
                            <div class="h6 text-c-gray">งาน</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn thistle btn-circle btn-circle-lg select-ex-category" onclick="selectCategory(9, 'thistle', 'OUT');"><i class="fas fa-book f-20"></i></button>
                            <div class="h6 text-c-gray">หนังสือ</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn goldenrod btn-circle btn-circle-lg select-ex-category" onclick="selectCategory(10, 'goldenrod', 'OUT');"><i class="fas fa-beer f-20"></i></button>
                            <div class="h6 text-c-gray">ปาร์ตี้</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn red btn-circle btn-circle-lg select-ex-category" onclick="selectCategory(11, 'red', 'OUT');"><i class="fas fa-gamepad f-20"></i></button>
                            <div class="h6 text-c-gray">เกม</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn salmon btn-circle btn-circle-lg select-ex-category" onclick="selectCategory(12, 'salmon', 'OUT');"><i class="fas fa-ellipsis-h f-20"></i></button>
                            <div class="h6 text-c-gray">อื่น ๆ</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- [ addExpenses Modal ] end -->

    <!-- [ addIncome Modal ] start -->
    <div id="addIncome" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addIncome" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="addIncomeTitle">เพิ่มรายรับ</h5>
                    <a href="#!" onclick="unselectCategory('IN');" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                </div>
                <div class="modal-body">
                    <div id="showupIncome" style="display: none">
                        <div class="input-group mb-3">
                            <input type="text" id="incomeMemo" class="form-control col-8" placeholder="บันทึกช่วยจำ">
                            <input type="text" id="incomeValue" class="form-control col-4 autonumber" placeholder="0.00" aria-label="จำนวนเงิน" aria-describedby="basic-addon2" data-v-min="-99.99" data-v-max="99999999.99">
                            <div class="input-group-append">
                                <button class="btn btn-primary" id="addIncomebtn" onclick="addIncome();"><i class="fas fa-check"></i></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="iconCalendar"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" id="incomeDate" aria-describedby="iconCalendar" class="date-input form-control" value="<?=date('Y-m-d')?>" placeholder="วันที่ทำรายการ">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn mediumpurple btn-circle btn-circle-lg select-in-category" onclick="selectCategory(13, 'mediumpurple', 'IN');"><i class="fas fa-wallet f-20"></i></button>
                            <div class="h6 text-c-gray">เงินเดือน</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn yellow btn-circle btn-circle-lg select-in-category" onclick="selectCategory(14, 'yellow', 'IN');"><i class="fas fa-calendar f-20"></i></button>
                            <div class="h6 text-c-gray">เงินสัปดาห์</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn lime btn-circle btn-circle-lg select-in-category" onclick="selectCategory(15, 'lime', 'IN');"><i class="fas fa-bolt f-20"></i></button>
                            <div class="h6 text-c-gray">รายได้เสริม</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn deepskyblue btn-circle btn-circle-lg select-in-category" onclick="selectCategory(16, 'deepskyblue', 'IN');"><i class="fas fa-hand-holding-usd f-20"></i></button>
                            <div class="h6 text-c-gray">ขายของ</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn limegreen btn-circle btn-circle-lg select-in-category" onclick="selectCategory(17, 'limegreen', 'IN');"><i class="fas fa-chart-line f-20"></i></button>
                            <div class="h6 text-c-gray">ลงทุน</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn salmon btn-circle btn-circle-lg select-in-category" onclick="selectCategory(18, 'salmon', 'IN');"><i class="fas fa-ellipsis-h f-20"></i></button>
                            <div class="h6 text-c-gray">อื่น ๆ</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- [ addIncome Modal ] end -->

    <?php include 'footer.php';?>
<script>
    //select month & year to show transaction
    let monthShow = false;

    // Strings and translations
    let monthsFull = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October','November', 'December'];
    let monthsShort = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    let weekdaysFull = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    let weekdaysShort = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

    //define date
    let date = new Date();
    let month = date.getMonth()+1;
    let year = date.getFullYear();

    //update html year & month value
    $("#select-year").html(year);
    $("#currentMonth").html(""+monthsShort[month-1]+" <i class=\"fas fa-sort-down\"></i>");
    // console.log('current'+month+''+year+'');

    function selectMonth(){
        if (monthShow != true){
            $("#selectMonth").slideDown("fast");
            monthShow = true;
        } else{
            $("#selectMonth").slideUp("fast");
            monthShow = false;
        }

    }
    function yearValue(type){
        if (type == 'minus'){
            year -= 1;
            $("#select-year").html(year);
            //load Header & Transactions
            loadData(month, year);
            // console.log('yearValue minus'+month+''+year+'');
        }else{
            year += 1;
            $("#select-year").html(year);
            //load Header & Transactions
            loadData(month, year);
            // console.log('yearValue plus'+month+''+year+'');
        }
    }
    function monthValue(m){
        month = m;
        // console.log('monthValue'+month+''+year+'');
        $("#currentMonth").html(""+monthsShort[month-1]+" <i class=\"fas fa-sort-down\"></i>");
        loadData(month, year);
        selectMonth();
    }

    //select category object
    let categoryID;
    let removeExSelected = document.querySelectorAll('.select-ex-category');
    let removeInSelected = document.querySelectorAll('.select-in-category');

    function unselectCategory(type){
        if (type == 'OUT') {
            // loop to remove selected category
            for (i = 0; i < removeExSelected.length; i++) {
                $(removeExSelected[i]).removeClass('active');
            }
            categoryID = "";
            // hide expenses input
            $("#showupExpenses").slideUp("fast");
            // set input to blank
            $("#expensesMemo").val("");
            $("#expensesValue").val("");
            $("#expensesDate").val("<?=date('Y-m-d')?>");
        }
        else if (type == 'IN') {
            // loop to remove selected category
            for (i = 0; i < removeInSelected.length; i++) {
                $(removeInSelected[i]).removeClass('active');
            }
            categoryID = "";
            // hide income input
            $("#showupIncome").slideUp("fast");
            // set input to blank
            $("#incomeMemo").val("");
            $("#incomeValue").val("");
            $("#incomeDate").val("<?=date('Y-m-d')?>");
        }
    }
    function addExpenses() {
        let expensesMemo = $("#expensesMemo").val();
        let expensesValue = $("#expensesValue").val();
        let expensesdate = $("#expensesDate").val();
        let type = "OUT";
        if (expensesMemo != "" && expensesValue != "") {
            $.ajax({
                type: "POST",
                url: "include/add_transactions.php",
                data: {
                    textmemo: expensesMemo,
                    value: expensesValue,
                    categoryid: categoryID,
                    date: expensesdate,
                    type: type
                },
                success: function(result) {
                    if (result == 1) {
                        // load lasted balance data
                        //load Header & Transactions
                        loadData(month, year);
                        // unselect category
                        unselectCategory(type);
                        // close modal dialog
                        $("[data-dismiss=modal]").trigger({
                            type: "click"
                        });
                        // alert success
                        Swal.fire({
                            icon: 'success',
                            title: 'เพิ่มรายจ่ายเรียบร้อย',
                            timer: 3000
                        });
                    }
                }
            });
        }
    }

    function addIncome() {
        let incomeMemo = $("#incomeMemo").val();
        let incomeValue = $("#incomeValue").val();
        let incomedate = $("#incomeDate").val();
        let type = "IN";
        if (incomeMemo != "" && incomeValue != "") {
            $.ajax({
                type: "POST",
                url: "include/add_transactions.php",
                data: {
                    textmemo: incomeMemo,
                    value: incomeValue,
                    categoryid: categoryID,
                    date: incomedate,
                    type: type
                },
                success: function(result) {
                    if (result == 1) {
                        // load lasted balance data
                        //load Header & Transactions
                        loadData(month, year);
                        // unselect category
                        unselectCategory(type);
                        // close modal dialog
                        $("[data-dismiss=modal]").trigger({
                            type: "click"
                        });
                        // alert success
                        Swal.fire({
                            icon: 'success',
                            title: 'เพิ่มรายรับเรียบร้อย',
                            timer: 3000
                        });
                    }
                }
            });
        }
    }

    function selectCategory(id, theme, type) {
        if (type == "OUT") {
            //change color addExpensesbtn when select category
            $("#addExpensesbtn").attr("class", "btn "+theme+" active");

            for (i = 0; i < removeExSelected.length; i++) {
                $(removeExSelected[i]).removeClass('active');
            }
            $(".select-ex-category").click(function() {
                $(this).addClass('active');
                categoryID = id;
            });
        } else if (type == "IN") {
            //change color addExpensesbtn when select category
            $("#addIncomebtn").attr("class", "btn "+theme+" active");

            for (i = 0; i < removeInSelected.length; i++) {
                $(removeInSelected[i]).removeClass('active');
            }
            $(".select-in-category").click(function() {
                $(this).addClass('active');
                categoryID = id;
            });
        }
    }

    function loadmainHeader(month, year) {
        // console.log('loadMain'+month+''+year+'');
        $.ajax({
            type: "POST",
            url: "include/call_main_header.php",
            data: { month: month, year: year },
            success: function(result) {
                let data = jQuery.parseJSON(result);
                $("#sum_in").html(data["sum_IN"]);
                $("#sum_out").html(data["sum_OUT"]);
                $("#sum_balance").html(data["balance"]);
            }
        });
    }

    function loadTransactions(month, year) {
        // console.log('loadTrans'+month+''+year+'');
        $.ajax({
            type: "POST",
            url: "include/call_main_transactions.php",
            data: { month: month, year: year },
            success: function(result) {
                let card = "";
                // alert(Obj[0][Obj[0].length - 1]["sum_IN"]);
                if (result != "0"){
                    $("#myTab").fadeIn();
                    let Obj = jQuery.parseJSON(result);
                    for(i = 0; i < Obj.length; i++){
                        card += '<div class="col-xl-12">\
                                    <div class="card">\
                                        <div class="card-header">\
                                            <h5>'+Obj[i][0]["create_date"]+'</h5>\
                                            <span class="text-muted float-right">รายรับ: '+Obj[i][Obj[i].length - 1]["sum_IN"]+' <br> รายจ่าย: '+Obj[i][Obj[i].length - 1]["sum_OUT"]+'</span>\
                                        </div>\
                                        <div class="card-block p-4">\
                                        ';
                        for(j = 0; j < Obj[i].length - 1; j++){
                            card += '<h5 class="text-muted f-w-300 mt-4 mb-4">\
                                        <button class="btn '+Obj[i][j]["category_theme"]+' btn-circle btn-circle-sm active"><i class="'+Obj[i][j]["category_icon"]+'"></i></button> '+Obj[i][j]["memo"]+' \
                                        <span class="float-right">'+Obj[i][j]["value"]+'</span>\
                                    </h5>';
                            //console.log(Obj[i][j]["sum_IN"]);
                        }
                        card += '</div>\
                            </div>\
                        </div>';
                    }
                } else {

                    $("#myTab").fadeOut("fast");

                    card += '<div class="col-xl-12 p-5">\
                                <div class="text-center">\
                                    <h1 class="text-muted mb-4"><i class="fas fa-list"></i></h1>\
                                    <h5 class="text-muted mb-4">No transaction list.</h5>\
                                </div>\
                            </div>';
                }
                $('#transactionsShow').html(card);
                $('#transactionsShow').fadeIn("fast");
            }
        });
    }

    function loadGraph(month, year){

        let cardGraph = "";
        let Obj;
        $.ajax({
            type: "POST",
            url: "include/call_graph.php",
            data: { month: month, year: year },
            success: function(result) {
                // console.log(result);
                if(result != "0"){

                    Obj = jQuery.parseJSON(result);
                    // console.log(Obj);

                    cardGraph += '<div class="col-xl-12">\
                                    <div class="card">\
                                        <div class="card-block">\
                                            <div class="row">\
                                                <div class="col-xl-4 col-12"></div>\
                                                <div id="showCanvas" class="col-xl-4 col-12">\
                                                </div>\
                                                <div class="col-xl-4 col-12"></div>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>';

                    //code here
                    //ex Obj = [
                    //     ["เกม","อาหาร"],
                    //     [8001,111],
                    //     ["#ff5050","#ffcc00"],
                    //     ["fas fa-gamepad","fas fa-utensils"],
                    //     ["red","yellow"]
                    // ]
                    //Obj[4][0] = red
                    //Obj[0][1] = อาหาร

                    /*------------------------------------------------------------*/

                    //sum values in array
                    //ref https://www.w3schools.com/jsref/jsref_reduce.asp
                    let sum = Obj[1].reduce(myFunc);
                    function myFunc(total, num) {
                        return total + num;
                    }

                    //currencyformat
                    //ref https://blog.abelotech.com/posts/number-currency-formatting-javascript/
                    function currencyFormat(num) {
                        return num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
                    }
                    // console.info(currencyFormat(2665))

                    cardGraph += ' <div class="col-xl-12">\
                                        <div class="card">\
                                            <div class="card-block">';

                    for(i = 0; i < Obj[0].length; i++){
                        cardGraph += '\
                        <h5 class="text-muted f-w-300 mt-4 mb-4">\
                            <button class="btn '+Obj[4][i]+' btn-circle btn-circle-sm active">\
                                <i class="'+Obj[3][i]+'"></i>\
                            </button> '+Obj[0][i]+' \
                            <small>( '+(Obj[1][i]*100/sum).toFixed(2)+'% )</small>\
                            <span class="float-right">'+currencyFormat(Obj[1][i])+'</span>\
                        </h5>';
                    }

                    cardGraph += '</div>\
                                </div>\
                            </div>';

                    // console.log(cardGraph);
                    $("#showGraph").html(cardGraph);
                    $('#showGraph').fadeIn("fast");

                    $("#showCanvas").html('<canvas id="myChart" width="300" height="300"></canvas>');
                    let canvas = document.getElementById('myChart');
                    // let context = canvas.getContext('2d');
                    // context.clearRect(0, 0, canvas.width, canvas.height);
                    let ctx = canvas.getContext('2d');
                    let myChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: Obj[0],
                            datasets: [{
                            label: '# of Tomatoes',
                            data: Obj[1],
                            backgroundColor: Obj[2]
                            }]
                        },
                        options: {
                            cutoutPercentage: 40,
                            responsive: true,
                            // onAnimationComplete: addText,
                            tooltips: {
                                enabled: false
                            },
                            plugins: {
                                datalabels: {
                                    formatter: (value, ctx) => {
                                    let sum = 0;
                                    let dataArr = ctx.chart.data.datasets[0].data;
                                    dataArr.map(data => {
                                        sum += data;
                                    });
                                    let percentage = (value*100 / sum).toFixed(2)+"%";
                                    return percentage;
                                    },
                                    color: '#fff',
                                }
                            }
                        },
                    });
                } else {

                    $("#myTab").fadeOut("fast");

                    cardGraph += '<div class="col-xl-12 p-5">\
                                <div class="text-center">\
                                    <h1 class="text-muted mb-4"><i class="fas fa-list"></i></h1>\
                                    <h5 class="text-muted mb-4">No transaction list.</h5>\
                                </div>\
                            </div>';

                    // console.log(cardGraph);
                    $("#showGraph").html(cardGraph);
                    $('#showGraph').fadeIn("fast");
                }
            }
        });
    }

    function loadData(month, year){
        // console.log('loadData'+month+''+year+'');
        loadTransactions(month, year);
        loadmainHeader(month, year);
        loadGraph(month, year);
    }

    //load Header & Transactions
    loadData(month, year);

    //fix button add transaction at bottom

    //check user is scrolling
    //ref https://stackoverflow.com/questions/56994840/
    let $window = $(window);
    let nav = $('.fixed-m');
    let scroll_active = false;
    let scroll_timer = new Date();
    check_scroll_time();

    $window.scroll(function(){
        scroll_timer = new Date();
    });

    function check_scroll_time(){
        now = new Date();
        if ((now.getTime() - scroll_timer.getTime())/1000 >= 0.2){
            nav.fadeIn(200);
        }else{
            nav.fadeOut(100);
        }
        setTimeout(function(){ check_scroll_time() },100);
    }

    //when select category show transaction form input
    $(".select-ex-category").click(function() {
        $("#showupExpenses").slideDown("fast");
    });
    $(".select-in-category").click(function() {
        $("#showupIncome").slideDown("fast");
    });

</script>
