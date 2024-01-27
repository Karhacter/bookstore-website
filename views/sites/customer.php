<?php

if (isset($_REQUEST['login'])) {
    require_once "views/sites/login.php";
}

if (isset($_REQUEST['logout'])) {
    unset($_SESSION['iscustom']);
    unset($_SESSION['user_id']);
    unset($_SESSION['name']);
    header('location:index.php');
}

if (isset($_REQUEST['register'])) {
    require_once "views/sites/register.php";
}
