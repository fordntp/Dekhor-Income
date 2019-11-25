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
                                            <h5>10,249.95</h5>
                                            <span class="text-muted">รายรับ</span>
                                            </div>
                                            <div class="col-md-4 col-4">
                                            <h5>2,942.32</h5>
                                            <span class="text-muted">รายจ่าย</span>
                                            </div>
                                            <div class="col-md-4 col-4">
                                            <h5>7,307.63</h5>
                                            <span class="text-muted">คงเหลือ</span>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row d-none">
                                <!--[ daily sales section ] start-->
                                <div class="col-md-4 col-xl-4">
                                    <div class="card">
                                        <div class="card-block">
                                            <h5 class="mb-4 text-c-gray-300">รายรับ</h5>
                                            <div class="row d-flex align-items-center">
                                                <div class="col">
                                                    <h2 class="text-c-gray f-w-300 d-flex align-items-center m-b-0">10,249.95</h2>
                                                </div>
                                                <!-- <div class="col-auto">
                                                <i class="fas fa-hand-holding-usd d-none d-lg-block f-50"></i>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--[ daily sales section ] end-->
                                <!--[ Monthly  sales section ] starts-->
                                <div class="col-md-4 col-xl-4">
                                    <div class="card">
                                        <div class="card-block">
                                            <h5 class="mb-4 text-c-gray-300">รายจ่าย</h5>
                                            <div class="row d-flex align-items-center">
                                                <div class="col">
                                                    <h2 class="text-c-gray f-w-300 d-flex align-items-center  m-b-0">2,942.32</h3>
                                                </div>
                                                <!-- <div class="col-auto">
                                                    <i class="fas fa-comment-dollar d-none d-lg-block f-50"></i>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--[ Monthly  sales section ] end-->
                                <!--[ year  sales section ] starts-->
                                <div class="col-md-4 col-xl-4">
                                    <div class="card">
                                        <div class="card-block">
                                            <h5 class="mb-4 text-c-gray-300">คงเหลือ</h5>
                                            <div class="row d-flex align-items-center">
                                                <div class="col">
                                                    <h2 class="text-c-gray f-w-300 d-flex align-items-center  m-b-0">7,307.63</h3>
                                                </div>
                                                <!-- <div class="col-auto">
                                                    <i class="fas fa-wallet d-none d-lg-block f-50"></i>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--[ year  sales section ] end-->
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
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>15/11/62 ศ.</h5>
                                                <span class="text-muted float-right">รายรับ: 10,249.95 | รายจ่าย: 2,942.32</span>
                                            </div>
                                            <div class="card-block">
                                                <h5 class="text-muted f-w-300 mt-4"><button class="btn btn-primary btn-circle btn-circle-sm"><i class="fa fa-shopping-cart"></i></button> ช๊อปปิ้ง <span class="float-right">- 1,439.32‬</span></h5>
                                                <h5 class="text-muted f-w-300 mt-4"><button class="btn btn-warning btn-circle btn-circle-sm"><i class="fas fa-utensils"></i></button> ชานมไข่มุก <span class="float-right">- 40</span></h5>
                                                <h5 class="text-muted f-w-300 mt-4"><button class="btn btn-warning btn-circle btn-circle-sm"><i class="fas fa-utensils"></i></button> ข้าว <span class="float-right">- 55</span></h5>
                                                <h5 class="text-muted f-w-300 mt-4"><button class="btn btn-primary btn-circle btn-circle-sm"><i class="fa fa-shopping-cart"></i></button> ช๊อปปิ้ง <span class="float-right">- 940</span></h5>
                                                <h5 class="text-muted f-w-300 mt-4"><button class="btn btn-primary btn-circle btn-circle-sm"><i class="fa fa-shopping-cart"></i></button> ช๊อปปิ้ง <span class="float-right">- 468</span></h5>
                                                <h5 class="text-muted f-w-300 mt-4"><button class="btn btn-danger btn-circle btn-circle-sm"><i class="fas fa-piggy-bank"></i></button> เงินรายเดือน <span class="float-right">10,249.95</span></h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>15/11/62 ศ.</h5>
                                                <span class="text-muted float-right">รายรับ: 10,249.95 | รายจ่าย: 2,942.32</span>
                                            </div>
                                            <div class="card-block">
                                                <h5 class="text-muted f-w-300 mt-4"><button class="btn btn-primary btn-circle btn-circle-sm"><i class="fa fa-shopping-cart"></i></button> ช๊อปปิ้ง <span class="float-right">- 1,439.32‬</span></h5>
                                                <h5 class="text-muted f-w-300 mt-4"><button class="btn btn-warning btn-circle btn-circle-sm"><i class="fas fa-utensils"></i></button> ชานมไข่มุก <span class="float-right">- 40</span></h5>
                                                <h5 class="text-muted f-w-300 mt-4"><button class="btn btn-warning btn-circle btn-circle-sm"><i class="fas fa-utensils"></i></button> ข้าว <span class="float-right">- 55</span></h5>
                                                <h5 class="text-muted f-w-300 mt-4"><button class="btn btn-primary btn-circle btn-circle-sm"><i class="fa fa-shopping-cart"></i></button> ช๊อปปิ้ง <span class="float-right">- 940</span></h5>
                                                <h5 class="text-muted f-w-300 mt-4"><button class="btn btn-primary btn-circle btn-circle-sm"><i class="fa fa-shopping-cart"></i></button> ช๊อปปิ้ง <span class="float-right">- 468</span></h5>
                                                <h5 class="text-muted f-w-300 mt-4"><button class="btn btn-danger btn-circle btn-circle-sm"><i class="fas fa-piggy-bank"></i></button> เงินรายเดือน <span class="float-right">10,249.95</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-group dropup fixed-m">
                                    <button class="btn btn-icon btn-rounded btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="feather icon-plus"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item md-trigger" data-modal="expensesinput" href="#!">รายจ่าย</a>
                                        <a class="dropdown-item md-trigger" data-toggle="modal" data-target="#exampleModalCenter" href="#!">รายรับ</a>
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
    <!-- Start Modal -->
    <div class="md-modal md-effect-3" id="expensesinput">
    <div class="md-content">
    <div class="modal-header">
    <h5 class="h3 modal-title text-dark">เพิ่มรายจ่าย</h5>
    <a class="close md-close"><h2>×</h2></a>
    </div>
    <!-- <h3 class="text-dark">เพิ่มรายจ่าย</h3>
    <hr>-->
    <div>

    <div id="showup" style="display: none">
    <div class="input-group mb-3">
        <input type="text" class="form-control col-8" placeholder="บันทึกช่วยจำ">
        <input type="text" class="form-control col-4 autonumber" placeholder="0.00" aria-label="จำนวนเงิน" aria-describedby="basic-addon2" data-v-min="-99.99" data-v-max="1000000000.00">
        <div class="input-group-append">
            <button class="btn btn-primary" onclick="addExpenses();"><i class="fas fa-check"></i></button>
        </div>
    </div>
        <!-- <div class="form-group">
            <input type="text" class="form-control" placeholder="บันทึกช่วยจำ">
        </div>
        <div class="form-group">
            <div class="input-group mb-3">
                <input type="text" class="form-control autonumber" placeholder="จำนวนเงิน" aria-label="จำนวนเงิน" aria-describedby="basic-addon2" data-v-min="-99.99" data-v-max="1000000000.00">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">เพิ่ม</button>
                </div>
            </div>
        </div> -->
    </div>

    <div class="row">
        <div class="col-lg-2 col-4 mb-2">
        <button class="btn btn-light btn-circle btn-circle-lg select-category"><i class="fas fa-utensils f-20 text-c-gray"></i></button>
        <div class="h6 text-c-gray text-center">อาหาร</div>
        </div>
        <div class="col-lg-2 col-4 mb-2">
        <button class="btn btn-light btn-circle btn-circle-lg select-category"><i class="fas fa-bolt f-20 text-c-gray"></i></button>
        <div class="h6 text-c-gray text-center">บิล</div>
        </div>
        <div class="col-lg-2 col-4 mb-2">
        <button class="btn btn-light btn-circle btn-circle-lg select-category"><i class="fas fa-taxi f-20 text-c-gray"></i></button>
        <div class="h6 text-c-gray text-center">เดินทาง</div>
        </div>
        <div class="col-lg-2 col-4 mb-2">
        <button class="btn btn-light btn-circle btn-circle-lg select-category"><i class="fa fa-shopping-cart f-20 text-c-gray"></i></button>
        <div class="h6 text-c-gray text-center">ช้อปปิ้ง</div>
        </div>
        <div class="col-lg-2 col-4 mb-2">
        <button class="btn btn-light btn-circle btn-circle-lg select-category"><i class="fas fa-graduation-cap f-20 text-c-gray"></i></button>
        <div class="h6 text-c-gray text-center">การศึกษา</div>
        </div>
        <div class="col-lg-2 col-4 mb-2">
        <button class="btn btn-light btn-circle btn-circle-lg select-category"><i class="fas fa-briefcase-medical f-20 text-c-gray"></i></button>
        <div class="h6 text-c-gray text-center">สุขภาพ</div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-4 mb-2">
        <button class="btn btn-light btn-circle btn-circle-lg select-category"><i class="fas fa-plane f-20 text-c-gray"></i></button>
        <div class="h6 text-c-gray text-center">ท่องเที่ยว</div>
        </div>
        <div class="col-lg-2 col-4 mb-2">
        <button class="btn btn-light btn-circle btn-circle-lg select-category"><i class="fas fa-laptop f-20 text-c-gray"></i></button>
        <div class="h6 text-c-gray text-center">งาน</div>
        </div>
        <div class="col-lg-2 col-4 mb-2">
        <button class="btn btn-light btn-circle btn-circle-lg select-category"><i class="fas fa-book f-20 text-c-gray"></i></button>
        <div class="h6 text-c-gray text-center">หนังสือ</div>
        </div>
        <div class="col-lg-2 col-4 mb-2">
        <button class="btn btn-light btn-circle btn-circle-lg select-category"><i class="fas fa-beer f-20 text-c-gray"></i></button>
        <div class="h6 text-c-gray text-center">ปาร์ตี้</div>
        </div>
        <div class="col-lg-2 col-4 mb-2">
        <button class="btn btn-light btn-circle btn-circle-lg select-category"><i class="fas fa-gamepad f-20 text-c-gray"></i></button>
        <div class="h6 text-c-gray text-center">เกม</div>
        </div>
        <div class="col-lg-2 col-4 mb-2">
        <button class="btn btn-light btn-circle btn-circle-lg select-category"><i class="fas fa-ellipsis-h f-20 text-c-gray"></i></button>
        <div class="h6 text-c-gray text-center">อื่น ๆ</div>
        </div>
    </div>

    <!-- <div id="showup" style="display: none">
    <div class="input-group mt-3">
        <input type="text" class="form-control col-8" placeholder="บันทึกช่วยจำ">
        <input type="text" class="form-control col-4 autonumber" placeholder="0.00" aria-label="จำนวนเงิน" aria-describedby="basic-addon2" data-v-min="-99.99" data-v-max="1000000000.00">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button"><i class="fas fa-check"></i></button>
        </div>
    </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="บันทึกช่วยจำ">
        </div>
        <div class="form-group">
            <div class="input-group mb-3">
                <input type="text" class="form-control autonumber" placeholder="จำนวนเงิน" aria-label="จำนวนเงิน" aria-describedby="basic-addon2" data-v-min="-99.99" data-v-max="1000000000.00">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">เพิ่ม</button>
                </div>
            </div>
        </div>
    </div> -->
    <!-- <button class="btn btn-primary md-close">ยกเลิก</button> -->
    </div>
    </div>
    </div>
    <div class="md-overlay"></div>
    <!-- End Modal -->
<?php
include 'footer.php';
?>
<script>
$(document).ready(function() {
    var $window = $(window);
    var nav = $('.fixed-m');
    $window.scroll(function() {
        if ($window.scrollTop() <= 10) {
            nav.fadeIn( "fast" );
        } else {
            nav.fadeOut( "fast" );
        }
    });
    $(".select-category").click(function(){
    $("#showup").slideDown("fast");
  });
});
</script>