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
                                <button class="btn btn-primary" onclick="addExpenses();"><i class="fas fa-check"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn yellow btn-circle btn-circle-lg select-ex-category" onclick="selectCategory(1,'OUT');"><i class="fas fa-utensils f-20"></i></button>
                            <div class="h6 text-c-gray">อาหาร</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn deepskyblue btn-circle btn-circle-lg select-ex-category" onclick="selectCategory(2,'OUT');"><i class="fas fa-bolt f-20"></i></button>
                            <div class="h6 text-c-gray">บิล</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn lime btn-circle btn-circle-lg select-ex-category" onclick="selectCategory(3,'OUT');"><i class="fas fa-taxi f-20"></i></button>
                            <div class="h6 text-c-gray">เดินทาง</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn orange btn-circle btn-circle-lg select-ex-category" onclick="selectCategory(4,'OUT');"><i class="fa fa-shopping-cart f-20"></i></button>
                            <div class="h6 text-c-gray">ช้อปปิ้ง</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn sandybrown btn-circle btn-circle-lg select-ex-category" onclick="selectCategory(5,'OUT');"><i class="fas fa-graduation-cap f-20"></i></button>
                            <div class="h6 text-c-gray">การศึกษา</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn hotpink btn-circle btn-circle-lg select-ex-category" onclick="selectCategory(6,'OUT');"><i class="fas fa-briefcase-medical f-20"></i></button>
                            <div class="h6 text-c-gray">สุขภาพ</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn mediumpurple btn-circle btn-circle-lg select-ex-category" onclick="selectCategory(7,'OUT');"><i class="fas fa-plane f-20"></i></button>
                            <div class="h6 text-c-gray">ท่องเที่ยว</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn limegreen btn-circle btn-circle-lg select-ex-category" onclick="selectCategory(8,'OUT');"><i class="fas fa-laptop f-20"></i></button>
                            <div class="h6 text-c-gray">งาน</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn thistle btn-circle btn-circle-lg select-ex-category" onclick="selectCategory(9,'OUT');"><i class="fas fa-book f-20"></i></button>
                            <div class="h6 text-c-gray">หนังสือ</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn goldenrod btn-circle btn-circle-lg select-ex-category" onclick="selectCategory(10,'OUT');"><i class="fas fa-beer f-20"></i></button>
                            <div class="h6 text-c-gray">ปาร์ตี้</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn red btn-circle btn-circle-lg select-ex-category" onclick="selectCategory(11,'OUT');"><i class="fas fa-gamepad f-20"></i></button>
                            <div class="h6 text-c-gray">เกม</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn salmon btn-circle btn-circle-lg select-ex-category" onclick="selectCategory(12,'OUT');"><i class="fas fa-ellipsis-h f-20"></i></button>
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
                                <button class="btn btn-primary" onclick="addIncome();"><i class="fas fa-check"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn mediumpurple btn-circle btn-circle-lg select-in-category" onclick="selectCategory(13,'IN');"><i class="fas fa-wallet f-20"></i></button>
                            <div class="h6 text-c-gray">เงินเดือน</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn yellow btn-circle btn-circle-lg select-in-category" onclick="selectCategory(14,'IN');"><i class="fas fa-calendar f-20"></i></button>
                            <div class="h6 text-c-gray">เงินสัปดาห์</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn lime btn-circle btn-circle-lg select-in-category" onclick="selectCategory(15,'IN');"><i class="fas fa-bolt f-20"></i></button>
                            <div class="h6 text-c-gray">รายได้เสริม</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn deepskyblue btn-circle btn-circle-lg select-in-category" onclick="selectCategory(16,'IN');"><i class="fas fa-hand-holding-usd f-20"></i></button>
                            <div class="h6 text-c-gray">ขายของ</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn limegreen btn-circle btn-circle-lg select-in-category" onclick="selectCategory(17,'IN');"><i class="fas fa-chart-line f-20"></i></button>
                            <div class="h6 text-c-gray">ลงทุน</div>
                        </div>
                        <div class="col-lg-2 col-3 mb-2 text-center">
                            <button class="btn salmon btn-circle btn-circle-lg select-in-category" onclick="selectCategory(18,'IN');"><i class="fas fa-ellipsis-h f-20"></i></button>
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