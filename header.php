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
    <!--Datetime Picker-->
    <link rel="stylesheet" href="assets/plugins/material-datetimepicker/css/bootstrap-material-datetimepicker.css">
    <link rel="stylesheet" href="assets/plugins/bootstrap-datetimepicker/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="assets/fonts/material/css/materialdesignicons.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/category-theme.css">
    <!--ChartJS-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.4.0/dist/chartjs-plugin-datalabels.min.js"></script>
</head>
<body>
<style type="text/css">
    @font-face {
      font-family: sukhumvit;
      src: url('assets/fonts/SukhumvitSet-Text.ttf');
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
      div.select-year-header {
        font-size: 5vw;
      }
    }
    @media screen and (min-width: 768px) {
      div.balance-header {
        font-size: 1.5vw;
      }
      div.select-year-header {
        font-size: 1.8vw;
      }
    }
    .swal2-container {
      z-index: 1073!important;
    }
    .form-rounded {
      border-radius: 1rem;
    }
    .preview-area {
        width: 100%;
        height: 100%;
        position: absolute;
        background-color: rgb(23, 32, 42, 0);
        z-index: 1074!important;
        margin: 0 auto;
    }
    .spinner {
      width: 60px;
      height: 60px;
      position: absolute;
      top: 50%;
      left: 50%;
      margin-right: -50%;
      transform: translate(-50%, -50%)
    }

    .double-bounce1, .double-bounce2 {
      width: 100%;
      height: 100%;
      border-radius: 50%;
      background-color: #333;
      opacity: 0.6;
      position: absolute;
      top: 0;
      left: 0;

      -webkit-animation: sk-bounce 2.0s infinite ease-in-out;
      animation: sk-bounce 2.0s infinite ease-in-out;
    }

    .double-bounce2 {
      -webkit-animation-delay: -1.0s;
      animation-delay: -1.0s;
    }

    @-webkit-keyframes sk-bounce {
      0%, 100% { -webkit-transform: scale(0.0) }
      50% { -webkit-transform: scale(1.0) }
    }

    @keyframes sk-bounce {
      0%, 100% {
        transform: scale(0.0);
        -webkit-transform: scale(0.0);
      } 50% {
        transform: scale(1.0);
        -webkit-transform: scale(1.0);
      }
    }
  </style>
