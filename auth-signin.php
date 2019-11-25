<?php
session_start();
if (isset($_SESSION["user_id"])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Datta Able Free Bootstrap 4 Admin Template</title>
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
    <meta name="description" content="Datta Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template"/>
    <meta name="author" content="CodedThemes"/>

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
    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="feather icon-unlock auth-icon"></i>
                    </div>
                    <h3 class="mb-4">Login</h3>
                    <div class="input-group mb-3">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="input-group mb-4">
                        <input type="password" name="password" id="password" class="form-control" placeholder="password">
                    </div>
                    <!-- <div class="form-group text-left">
                        <div class="checkbox checkbox-fill d-inline">
                            <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
                            <label for="checkbox-fill-a1" class="cr"> Save Details</label>
                        </div>
                    </div> -->
                    <button class="btn btn-primary shadow-2 mb-4" onclick="return do_login();">Login</button>
                    <p class="mb-2 text-muted">Forgot password? <a href="auth-reset-password.html">Reset</a></p>
                    <p class="mb-0 text-muted">Don’t have an account? <a href="auth-signup.html">Signup</a></p>
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
function do_login(){
    var username = $("#username").val();
    var password = $("#password").val();
    if (username != "" && password != ""){
      $.ajax({
        type: "POST",
        url: "include/call_auth.php",
        //data: $("#myform").serialize(),
        data: { username: username, password: password },
        success: function(result) {
            //alert(result);
            if (result == 1) {

              window.location.href = "https://tarit.in.th/dekhor/";
            } else if (result == 0) {
              Swal.fire({
                  icon: 'error',
                  title: 'ลงชื่อเข้าใช้ไม่สำเร็จ',
                  text: 'ชื่อผู้ใช้งาน หรือ รหัสผ่านไม่ถูกต้อง',
                  timer: 3000
              });
              //alert(result);
            }
        }
    });
    }
    else{
      Swal.fire({
          icon: 'warning',
          title: 'กรุณากรอกข้อมูลผู้ใช้',
          text: 'ชื่อผู้ใช้งาน หรือ รหัสผ่านไม่ถูกต้อง',
          timer: 3000
      });
    }
}
</script>
</body>
</html>
