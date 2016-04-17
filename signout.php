<?php
/**
 * Created by PhpStorm.
 * User: Wilson
 * Date: 4/17/2016
 * Time: 4:17 PM
 */
session_start();
if(isset($_SESSION['user'])){
    session_destroy();
    header('location:login.php');
}