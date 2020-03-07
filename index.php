<?php
include 'navbar.php';
?>

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
        <div class="preview-area">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
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
                                    <a class="nav-link" id="graph-tab" data-toggle="tab" href="#graph" role="tab" aria-controls="graph" aria-selected="false">ภาพรวม</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="transaction" role="tabpanel" aria-labelledby="transaction-tab">
                                    <div id="transactionsShow" class="row" style="display: none;"></div>
                                </div>
                                <div class="tab-pane fade" id="graph" role="tabpanel" aria-labelledby="graph-tab">
                                    <div id="showGraph" class="row" style="display: none;"></div>
                                </div>
                            <!-- [ Main Content ] end -->
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->

    <!-- [ Add Transaction Button ] start -->
    <div class="btn-group dropup fixed-m" style="display: none;">
        <button class="btn btn-icon btn-rounded btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="feather icon-plus"></i>
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item md-trigger" data-toggle="modal" data-target="#addExpenses" href="#!">รายจ่าย</a>
            <a class="dropdown-item md-trigger" data-toggle="modal" data-target="#addIncome" href="#!">รายรับ</a>
        </div>
    </div>
    <!-- [ Add Transaction Button ] end -->

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
                            <input type="text" id="expensesMemo" class="memo-input form-control col-8" onkeyup="memoSearch(this.value,'expensesMemo');" placeholder="บันทึกช่วยจำ">
                            <input type="text" id="expensesValue" class="form-control col-4 autonumber" placeholder="0.00" aria-label="จำนวนเงิน" aria-describedby="basic-addon2" data-v-min="0" data-v-max="99999999.99">
                            <div class="input-group-append">
                                <button class="btn btn-primary" id="addExpensesbtn" onclick="addExpenses();"><i class="fas fa-check"></i></button>
                            </div>
                        </div>
                        <div id="expensesMemoOutput" class="memo-output form-group btn-group-sm">
                            <!-- <a href="#" class="btn btn-sm mr-0 word" onclick="document.getElementById('expensesMemo').value = this.text;">กะเพราหมูกรอบ</a>
                            <a href="#" class="btn btn-sm mr-0 word" onclick="document.getElementById('expensesMemo').value = this.text;">กะเพราหมูสับ</a>
                            <a href="#" class="btn btn-sm mr-0 word" onclick="document.getElementById('expensesMemo').value = this.text;">กะเพราหมูสับกุ้ง</a>
                            <a href="#" class="btn btn-sm mr-0 word" onclick="document.getElementById('expensesMemo').value = this.text;">กะเพราเนื้อสับ</a>
                            <a href="#" class="btn btn-sm mr-0 word" onclick="document.getElementById('expensesMemo').value = this.text;">กะเพราเครื่องในหมู</a>
                            <a href="#" class="btn btn-sm mr-0 word" onclick="document.getElementById('expensesMemo').value = this.text;">กะเพราทะเล</a> -->
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

                    <?php
$cmd = "SELECT * ,dekhor_category.id as category_id FROM dekhor_category WHERE category_type = 'OUT' ORDER BY id ASC;";
$qry = mysqli_query($conn, $cmd);
while ($data = mysqli_fetch_array($qry)) {
    echo "<div class=\"col-lg-2 col-3 mb-2 text-center\">
            <button class=\"btn " . $data["category_theme"] . " btn-circle btn-circle-lg select-ex-category\" onclick=\"selectCategory(" . $data["category_id"] . ", '" . $data["category_theme"] . "', '" . $data["category_type"] . "');\"><i class=\"" . $data["category_icon"] . " f-20\"></i></button>
            <div class=\"h6 text-c-gray\">" . $data["category_name"] . "</div>
        </div>";
}
?>

                    </div> <!--row-->

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
                            <input type="text" id="incomeMemo" class="form-control col-8" onkeyup="memoSearch(this.value,'incomeMemo');" placeholder="บันทึกช่วยจำ" >
                            <input type="text" id="incomeValue" class="form-control col-4 autonumber" placeholder="0.00" aria-label="จำนวนเงิน" aria-describedby="basic-addon2" data-v-min="0" data-v-max="99999999.99">
                            <div class="input-group-append">
                                <button class="btn btn-primary" id="addIncomebtn" onclick="addIncome();"><i class="fas fa-check"></i></button>
                            </div>
                        </div>
                        <div id="incomeMemoOutput" class="memo-output form-group btn-group-sm"></div>
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
                    <?php
$cmd = "SELECT * ,dekhor_category.id as category_id FROM dekhor_category WHERE category_type = 'IN' ORDER BY id ASC;";
$qry = mysqli_query($conn, $cmd);
while ($data = mysqli_fetch_array($qry)) {
    echo "<div class=\"col-lg-2 col-3 mb-2 text-center\">
            <button class=\"btn " . $data["category_theme"] . " btn-circle btn-circle-lg select-in-category\" onclick=\"selectCategory(" . $data["category_id"] . ", '" . $data["category_theme"] . "', '" . $data["category_type"] . "');\"><i class=\"" . $data["category_icon"] . " f-20\"></i></button>
            <div class=\"h6 text-c-gray\">" . $data["category_name"] . "</div>
        </div>";
}
?>
                    </div> <!--row-->

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

    //generate select month tab pill
    let monthselect = "";
    for (i = 0; i < monthsShort.length; i++ ){
        if ((i+1) == month){
            monthselect += '<li class="nav-item">\
                                <a class="nav-link show active" onclick="monthValue('+(i+1)+');" id="pills-view-'+monthsShort[i]+'" data-toggle="pill" href="#view-'+monthsShort[i]+'" role="tab" aria-controls="view-'+monthsShort[i]+'" aria-selected="true">'+monthsShort[i]+'</a>\
                            </li>';
        } else {
            monthselect += '<li class="nav-item">\
                                <a class="nav-link show" onclick="monthValue('+(i+1)+');" id="pills-view-'+monthsShort[i]+'" data-toggle="pill" href="#view-'+monthsShort[i]+'" role="tab" aria-controls="view-'+monthsShort[i]+'" aria-selected="false">'+monthsShort[i]+'</a>\
                            </li>';
        }
    }
    //show month tab pill
    $("#pills-tab2").html(monthselect);

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
            //hide expensesMemoOutput
            $(`#expensesMemoOutput`).css('display', 'none');
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
            //hide expensesMemoOutput
            $(`#incomeMemoOutput`).css('display', 'none');
        }
    }
    function addExpenses() {
        let expensesMemo = $("#expensesMemo").val();
        let expensesValue = $("#expensesValue").val();
        let expensesdate = $("#expensesDate").val();
        let type = "OUT";
        if (expensesMemo != "" && expensesValue != "") {

            // disabled button after submit transaction
            $('#addExpensesbtn').prop('disabled', true);
            $('#addExpensesbtn').html('<i class="fas fa-circle-notch fa-spin">');

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
                        // load Header & Transactions
                        loadData(month, year);
                        // unselect category
                        unselectCategory(type);
                        // // close modal dialog
                        $("[data-dismiss=modal]").trigger({
                            type: "click"
                        });
                        // alert success
                        Swal.fire({
                            icon: 'success',
                            title: 'เพิ่มรายจ่ายเรียบร้อย',
                            timer: 3000
                        });
                        // enable button after submit transaction
                        $('#addExpensesbtn').prop('disabled', false);
                        $('#addExpensesbtn').html('<i class="fas fa-check">');
                    }
                }
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'กรุณากรอกข้อมูลให้ถูกต้อง'
            });
        }
    }

    function addIncome() {
        let incomeMemo = $("#incomeMemo").val();
        let incomeValue = $("#incomeValue").val();
        let incomedate = $("#incomeDate").val();
        let type = "IN";
        if (incomeMemo != "" && incomeValue != "") {

            // disabled button after submit transaction
            $('#addIncomebtn').prop('disabled', true);
            $('#addIncomebtn').html('<i class="fas fa-circle-notch fa-spin">');

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
                        // enable button after submit transaction
                        $('#addIncomebtn').prop('disabled', false);
                        $('#addIncomebtn').html('<i class="fas fa-check">');
                    }
                }
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'กรุณากรอกข้อมูลให้ถูกต้อง'
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

    function deleteItem(id){
        console.log(`delete item ${id}`);
        Swal.fire({
            title: 'ยืนยันการลบรายการ',
            text: "รายการที่ถูกลบจะไม่สามารถกู้คืนกลับมาได้",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#fd6b6b',
            cancelButtonColor: '#858796',
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก',
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "include/call_delete.php",
                        type: "POST",
                        data: { id: id },
                        success: function(response) {
                            if (response == 1) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'ลบรายการแล้ว',
                                    text: 'รายการถูกลบออกจากกระเป๋าเงิน',
                                    timer: 5000
                                });
                                // load lasted balance data
                                // load Header & Transactions
                                loadData(month, year);
                            }
                        }
                    });
                }
            })
        loadData(month, year);
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
                            card += '<h5 class="text-muted f-w-300 mt-4 mb-4" onclick="deleteItem('+Obj[i][j]["item_id"]+')">\
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


    function loadGraph(month, year, type){

        $.ajax({
            type: "POST",
            url: "include/call_graph.php",
            data: { month: month, year: year, type: type },
            success: function(result) {

                // console.log(result,type);
                let cardGraph = "";
                if(result != "0"){

                    let Obj = jQuery.parseJSON(result);

                    //check empty type
                    let inType = Obj[5][0];
                    let outType = Obj[5][1];
                    let inState, outState = "";
                    if (inType == 1){
                        inState = "";
                    }else{
                        inState = " disabled";
                        // console.log("in "+inState);
                    }
                    if (outType == 1){
                        outState = "";
                    }else{
                        outState = " disabled";
                        // console.log("out "+outState);
                    }
                    // console.log(Obj);
                    cardGraph += '<div class="col-xl-12">\
                                    <div class="card">\
                                        <div class="card-block">\
                                            <div class="row">\
                                                <div class="col-xl-4 col-12"></div>\
                                                <div id="showCanvas" class="col-xl-4 col-12"></div>\
                                                <div class="col-xl-4 col-12"></div>\
                                            </div> <!-- row -->\
                                        </div> <!-- card-block -->\
                                    </div> <!-- card -->\
                                </div> <!-- col-xl-12 -->';

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

                    $("#showCanvas").append('<div class="row">\
                                                <div class="col-6 p-2"><a href="#!" onclick="loadGraph('+month+', '+year+', \'IN\')" class="btn btn-light btn-block'+inState+'">รายรับ</a></div>\
                                                <div class="col-6 p-2"><a href="#!" onclick="loadGraph('+month+', '+year+', \'OUT\')" class="btn btn-light btn-block'+outState+'">รายจ่าย</a></div>\
                                            <div>');
                    $("#showCanvas").append('<canvas id="myChart" width="300" height="300"></canvas>');

                    let canvas = document.getElementById('myChart');
                    // let context = canvas.getContext('2d');
                    // context.clearRect(0, 0, canvas.width, canvas.height);
                    let ctx = canvas.getContext('2d');
                    let myChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: Obj[0],
                            datasets: [{
                            label: '# of Transactions',
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

                    // $("#myTab").fadeOut("fast");

                    cardGraph += '<div class="col-xl-12 p-5">\
                                <div class="text-center">\
                                    <h1 class="text-muted mb-4"><i class="fas fa-chart-pie"></i></h1>\
                                    <h5 class="text-muted mb-4">No data list.</h5>\
                                </div>\
                            </div>';

                    // console.log(cardGraph);
                    $("#showGraph").html(cardGraph);
                    $('#showGraph').fadeIn("fast");
                }
            }
        });
    }

    // let firstLoad = false, NewtransactionsList, OldtransactionsList;
    // function realtimeData(){
    //     setInterval(function(){
    //         $.ajax({
    //             type: "POST",
    //             url: "include/call_main_transactions.php",
    //             data: { month: month, year: year },
    //             success: function(result) {
    //                 if (!firstLoad){
    //                     // run once
    //                     // set OldtransactionsList = result
    //                     OldtransactionsList = result;
    //                     firstLoad = true;
    //                 } else {
    //                     // now firstLoad = true , so not run that if statement again untill user refresh page
    //                     // set NewtransactionsList = lasted result
    //                     NewtransactionsList = result;
    //                     // if NewtransactionsList != OldtransactionsList run loadData
    //                     if ( NewtransactionsList != OldtransactionsList){
    //                         loadData(month, year);
    //                         // set OldtransactionsList to lasted result
    //                         OldtransactionsList = NewtransactionsList;
    //                         console.log('Data Updated !');
    //                     }
    //                 }
    //             }
    //         });
    //     }, 1500);
    // }

    let firstLoad = false, newUpdateTime, oldUpdateTime;
    function realTimeData(){
        setInterval(function(){
            $.ajax({
                type: "POST",
                url: "include/call_realtime.php",
                data: {},
                success: function(result) {
                    if (!firstLoad){
                        // run once
                        // set oldUpdateTime = result
                        oldUpdateTime = result;
                        firstLoad = true;
                    } else {
                        // now firstLoad = true , so not run that if statement again untill user refresh page
                        // set newUpdateTime = lasted result
                        newUpdateTime = result;
                        // if newUpdateTime != oldUpdateTime run loadData
                        if ( newUpdateTime != oldUpdateTime){
                            loadData(month, year);
                            // set oldUpdateTime = newUpdateTime
                            oldUpdateTime = newUpdateTime;
                            console.log('Data Updated !');
                        }
                    }
                }
            });
        }, 1000);
    }

    //ref https://www.tutsmake.com/ajax-php-mysql-search-example/
    function memoSearch(val,type){
          if (val != "") {
            $.ajax({
              url: 'include/call_memosearch.php',
              method: 'POST',
              data: {val:val,type:type,category:categoryID},
              success: function(result){
                  if (result != '0'){
                    let Obj = jQuery.parseJSON(result);
                    let suggestion = "";
                    for (i=0; i<Obj.length; i++){
                        suggestion += `<a href="#" class="btn btn-sm word mr-1" onclick="document.getElementById('${type}').value = this.text;">${Obj[i]}</a>`;
                    }
                    $(`#${type}Output`).html(suggestion);
                    $(`#${type}Output`).css('display', 'block');
                    // $(`#${type}`).focusout(function(){
                    //     $(`#${type}Output`).css('display', 'none');
                    // });
                    // $(`#${type}`).focusin(function(){
                    //     $(`#${type}Output`).css('display', 'block');
                    // });
                  }
              }
            });
          } else {
          $(`#${type}Output`).css('display', 'none');
        }
    }

    function loadData(month, year){
        // console.log('loadData'+month+''+year+'');
        loadTransactions(month, year);
        loadmainHeader(month, year);
        loadGraph(month, year, "OUT");
    }

    //load Header & Transactions
    loadData(month, year);

    //auto reload Header & Transactions
    realTimeData();

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
        if ((now.getTime() - scroll_timer.getTime())/1000 >= 0.1){
            nav.fadeIn(100);
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

    $(document).ready(function(){
        //loading spinner
        $('.preview-area').fadeOut("fast");
    });

</script>
