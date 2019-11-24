<?php
include 'header.php';
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
                                <div class="col-md-4 col-xl-4">
                                    <div class="card">
                                        <div class="card-block">
                                            <h5 class="mb-4 text-c-gray-300">รายรับ</h5>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-9">
                                                    <h2 class="text-c-gray f-w-300 d-flex align-items-center m-b-0">10,249.95</h2>
                                                </div>
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
                                                <div class="col-9">
                                                    <h2 class="text-c-gray f-w-300 d-flex align-items-center  m-b-0">2,942.32</h3>
                                                </div>
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
                                                <div class="col-9">
                                                    <h2 class="text-c-gray f-w-300 d-flex align-items-center  m-b-0">7,307.63</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--[ year  sales section ] end-->
                            </div>
                            <div class="row">

                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>15/11/62 ศ.</h5>
                                        <span class="text-muted float-right">รายรับ: 10,249.95 | รายจ่าย: 2,942.32</span>
                                    </div>
                                    <div class="card-block">
                                        <h5 class="text-muted f-w-300 mt-4">ช๊อปปิ้ง <span class="float-right">- 1,439.32‬</span></h5>
                                        <h5 class="text-muted f-w-300 mt-4">ชานมไข่มุก <span class="float-right">- 40</span></h5>
                                        <h5 class="text-muted f-w-300 mt-4">ข้าว <span class="float-right">- 55</span></h5>
                                        <h5 class="text-muted f-w-300 mt-4">ช๊อปปิ้ง <span class="float-right">- 940</span></h5>
                                        <h5 class="text-muted f-w-300 mt-4">ช๊อปปิ้ง <span class="float-right">- 468</span></h5>
                                        <h5 class="text-muted f-w-300 mt-4">เงินรายเดือน <span class="float-right">10,249.95</span></h5>
                                    </div>
                                </div>
                            </div>

                            </div>
                            <!-- [ Main Content ] end -->
                            <div class="btn-group dropup d-lg-none fixed-m">
                                <button class="btn btn-icon btn-rounded btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-plus"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#!">รายจ่าย</a>
                                    <a class="dropdown-item" href="#!">รายรับ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
<?php
include 'footer.php';
?>
<script>
$(document).ready(function() {
    var $window = $(window);
    var nav = $('.fixed-m');
    $window.scroll(function() {
        if ($window.scrollTop() == 0) {
            nav.fadeIn( "fast" );
        } else {
            nav.fadeOut( "fast" );
        }
    });
});
</script>