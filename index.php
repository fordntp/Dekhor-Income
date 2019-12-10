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

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="transaction-tab" data-toggle="tab" href="#transaction" role="tab" aria-controls="transaction" aria-selected="true">รายการ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="graph-tab" data-toggle="tab" href="#graph" role="tab" aria-controls="graph" aria-selected="false">กราฟ</a>
                                </li>
                            </ul>
                            <div id="myTabContent">
                                <div class="tab-pane fade show active" id="transaction" role="tabpanel" aria-labelledby="transaction-tab">
                                    <div id="transactionsShow" class="row"></div>
                                    <div class="btn-group dropup fixed-m">
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
                                    <p class="mb-0"></p>
                                </div>
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

    <?php
include 'footer.php';
?>
        <script>

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
                }
            }
            function addExpenses() {
                let expensesMemo = $("#expensesMemo").val();
                let expensesValue = $("#expensesValue").val();
                let type = "OUT";
                if (expensesMemo != "" && expensesValue != "") {
                    $.ajax({
                        type: "POST",
                        url: "include/add_transactions.php",
                        data: {
                            textmemo: expensesMemo,
                            value: expensesValue,
                            categoryid: categoryID,
                            type: type
                        },
                        success: function(result) {
                            if (result == 1) {
                                // load lasted balance data
                                loadmainHeader();
                                loadTransactions();
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
                let type = "IN";
                if (incomeMemo != "" && incomeValue != "") {
                    $.ajax({
                        type: "POST",
                        url: "include/add_transactions.php",
                        data: {
                            textmemo: incomeMemo,
                            value: incomeValue,
                            categoryid: categoryID,
                            type: type
                        },
                        success: function(result) {
                            if (result == 1) {
                                // load lasted balance data
                                loadmainHeader();
                                loadTransactions();
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

            function loadmainHeader() {
                $.ajax({
                    type: "POST",
                    url: "include/call_main_header.php",
                    data: "",
                    success: function(result) {
                        let data = jQuery.parseJSON(result);
                        $("#sum_in").html(data["sum_IN"]);
                        $("#sum_out").html(data["sum_OUT"]);
                        $("#sum_balance").html(data["balance"]);
                    }
                });
            }

            function loadTransactions() {
                $.ajax({
                    type: "POST",
                    url: "include/call_main_transactions.php",
                    data: "",
                    success: function(result) {
                        let Obj = jQuery.parseJSON(result);
                        let card = "";
                        // alert(Obj[0][Obj[0].length - 1]["sum_IN"]);
                        for(i = 0; i < Obj.length; i++){
                            card += '<div class="col-xl-12">\
                                        <div class="card">\
                                            <div class="card-header">\
                                                <h5>'+Obj[i][0]["create_date"]+'</h5>\
                                                <span class="text-muted float-right">รายรับ: '+Obj[i][Obj[i].length - 1]["sum_IN"]+' <br> รายจ่าย: '+Obj[i][Obj[i].length - 1]["sum_OUT"]+'</span>\
                                            </div>\
                                            <div class="card-block">\
                                            ';
                            for(j = 0; j < Obj[i].length - 1; j++){
                                card += '<h5 class="text-muted f-w-300 mt-4">\
                                            <button class="btn '+Obj[i][j]["category_theme"]+' btn-circle btn-circle-sm active"><i class="'+Obj[i][j]["category_icon"]+'"></i></button> '+Obj[i][j]["memo"]+' \
                                            <span class="float-right">'+Obj[i][j]["value"]+'</span>\
                                        </h5>';
                                //console.log(Obj[i][j]["sum_IN"]);
                            }
                            card += '</div>\
                                </div>\
                            </div>';
                        }
                        $('#transactionsShow').html(card);
                    }
                });
            }
            $(document).ready(function() {
                loadTransactions();
                loadmainHeader();

                var $window = $(window);
                var nav = $('.fixed-m');
                $window.scroll(function() {
                    if ($window.scrollTop() <= 10) {
                        nav.fadeIn("fast");
                    } else {
                        nav.fadeOut("fast");
                    }
                });

                $(".select-ex-category").click(function() {
                    $("#showupExpenses").slideDown("fast");
                });
                $(".select-in-category").click(function() {
                    $("#showupIncome").slideDown("fast");
                });
            });
        </script>