<?php
include 'constant.php';

include 'dbcon.php';
include 'header.php';
if($section != 'login'){
    include 'navigation.php';
    if(!isset($_SESSION['user'])){
        session_destroy();
        header('location:../ADP/login.php');
    }
}


