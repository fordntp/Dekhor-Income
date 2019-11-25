<?php
session_start();

if (session_destroy()) {
    header("Location: auth-signin.php");
}
