let categoryID;
let removeExSelected = document.querySelectorAll('.select-ex-category');
let removeInSelected = document.querySelectorAll('.select-in-category');

function unselectCategory(type) {
    if (type == 'OUT') {
        //loop to remove selected category
        for (i = 0; i < removeExSelected.length; i++) {
            $(removeExSelected[i]).removeClass('active');
        }
        categoryID = "";
        // hide expenses input
        $("#showupExpenses").slideUp("fast");
        // set input to blank
        $("#expensesMemo").val("");
        $("#expensesValue").val("");
    } else if (type == 'IN') {
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
            url: "../../include/add_transactions.php",
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
            url: "../../include/add_transactions.php",
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

function selectCategory(id, type) {
    if (type == "OUT") {
        for (i = 0; i < removeExSelected.length; i++) {
            $(removeExSelected[i]).removeClass('active');
        }
        $(".select-ex-category").click(function() {
            $(this).addClass('active');
            categoryID = id;
        });
    } else if (type == "IN") {
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
        url: "../../include/call_main_header.php",
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
        url: "../../include/call_main_transactions.php",
        data: "",
        success: function(result) {
            let Obj = jQuery.parseJSON(result);
            let card = "";
            // alert(Obj[0][Obj[0].length - 1]["sum_IN"]);
            for (i = 0; i < Obj.length; i++) {
                card += '<div class="col-xl-12">\
                                        <div class="card">\
                                            <div class="card-header">\
                                                <h5>' + Obj[i][0]["create_date"] + '</h5>\
                                                <span class="text-muted float-right">รายรับ: ' + Obj[i][Obj[i].length - 1]["sum_IN"] + ' <br> รายจ่าย: ' + Obj[i][Obj[i].length - 1]["sum_OUT"] + '</span>\
                                            </div>\
                                            <div class="card-block">\
                                            ';
                for (j = 0; j < Obj[i].length - 1; j++) {
                    card += '<h5 class="text-muted f-w-300 mt-4">\
                                            <button class="btn ' + Obj[i][j]["category_theme"] + ' btn-circle btn-circle-sm active"><i class="' + Obj[i][j]["category_icon"] + '"></i></button> ' + Obj[i][j]["memo"] + ' \
                                            <span class="float-right">' + Obj[i][j]["value"] + '</span>\
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