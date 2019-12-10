<?php
include 'include/database.php';
session_start();
if (!isset($_SESSION["user_id"])) {
    header("location:" . $dirurl . "/auth-signin");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?=$title?></title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
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

    <!--modal-md-style-->
    <link rel="stylesheet" href="assets/plugins/modal-window-effects/css/md-modal.css">

    <!--SmartWizard-->
    <link rel="stylesheet" href="assets/plugins/smart-wizard/css/smart_wizard.min.css">
    <link rel="stylesheet" href="assets/plugins/smart-wizard/css/smart_wizard_theme_arrows.min.css">
    <link rel="stylesheet" href="assets/plugins/smart-wizard/css/smart_wizard_theme_circles.min.css">
    <link rel="stylesheet" href="assets/plugins/smart-wizard/css/smart_wizard_theme_dots.min.css">

    <!--Datetime Picker-->
    <link rel="stylesheet" href="assets/plugins/material-datetimepicker/css/bootstrap-material-datetimepicker.css">
    <link rel="stylesheet" href="assets/plugins/bootstrap-datetimepicker/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="assets/fonts/material/css/materialdesignicons.min.css">

    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/category-theme.css">
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
    @media screen and (min-width: 320px) {
      div.balance-header {
        font-size: 3.5vw;
      }
    }
    @media screen and (min-width: 768px) {
      div.balance-header {
        font-size: 1.5vw;
      }
    }
    .form-rounded {
      border-radius: 1rem;
    }
  </style>
