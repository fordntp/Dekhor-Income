<?php
include 'include/database.php';
session_start();
if (isset($_SESSION["user_id"])) {
    header("location:" . $dirurl . "");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?=$title?></title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content=""/>
    <meta name="author" content="CodedThemes"/>
    <meta name="theme-color" content="#04a9f5">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="apple-touch-icon" sizes="57x57" href="assets/images/app/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/images/app/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/images/app/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/images/app/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/images/app/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/images/app/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/images/app/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/images/app/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/app/apple-icon-180x180.png">
    <link rel="manifest" href="assets/images/app/manifest.json">
    <meta name="msapplication-TileColor" content="#04a9f5">
    <meta name="msapplication-TileImage" content="assets/images/app/ms-icon-144x144.png">

    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="assets/plugins/animation/css/animate.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
<style type="text/css">
    @font-face {
      font-family: sukhumvit;
      src: url('./assets/fonts/SukhumvitSet-Text.ttf');
    }

    body {
      color: var(--default-black);
      font-size: var(--default-size);
      font-family: sukhumvit, Prompt, 'Prompt';
    }
    .fixed-m {
      position: fixed;
      right: 1em;
      bottom: 1em;
      /* left: 0; */
      z-index: 1030;
    }
  </style>
    <div class="auth-wrapper" style="background-color:#04a9f5;">
        <div class="auth-content">
            <div class="card shadow-5">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <img src="assets/images/brand_ico.png" alt="brand">
                    </div>
                    <h3 class="mb-4">สมัครสมาชิก เด็กหอ</h3>
                    <div class="input-group mb-3">
                        <input type="text" name="username" id="username" class="form-control" placeholder="ชื่อผู้ใช้">
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password_1" class="form-control" placeholder="รหัสผ่าน">
                    </div>
                    <div class="input-group mb-4">
                        <input type="password" name="password" id="password_2" class="form-control" placeholder="ยืนยันรหัสผ่าน">
                    </div>
                    <!-- <div class="form-group text-left">
                        <div class="checkbox checkbox-fill d-inline">
                            <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
                            <label for="checkbox-fill-a1" class="cr"> Save Details</label>
                        </div>
                    </div> -->
                    <button class="btn btn-primary shadow-2 mb-4" onclick="return do_register();">สมัครสมาชิก</button>
                    <!-- <p class="mb-2 text-muted">Forgot password? <a href="auth-reset-password.html">Reset</a></p> -->
                    <p class="mb-0 text-muted">มีบัญชีผู้ใช้งานอยู่แล้ว ? <a href="auth-signin">เข้าสู่ระบบ</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css" id="theme-styles">
<script>
  /* ajax */
function do_register(){
    var username = $("#username").val();
    var password = $("#password_1").val();
    var re_password = $("#password_2").val();
    if (username != "" && password != ""){
      $.ajax({
        type: "POST",
        url: "include/call_signup.php",
        //data: $("#myform").serialize(),
        data: { username: username, password: password },
        success: function(result) {
            //alert(result);
            if (result == 1) {

              window.location.href = "<?=$dirurl?>";
            } else if (result == 0) {
              Swal.fire({
                  icon: 'error',
                  title: 'สมัครสมาชิกไม่สำเร็จ',
                  text: 'มีชื่อผู้ใช้งานนี้ในระบบ',
                  timer: 3000
              });
              //alert(result);
            }
        }
    });
    }
    else if (password != re_password){
      Swal.fire({
          icon: 'warning',
          title: 'ข้อมูลผู้ใช้ไม่ถูกต้อง',
          text: 'ยืนยันรหัสผ่านไม่ถูกต้อง',
          timer: 3000
      });
    }
}
</script>
</body>
</html>
