<?php
/**
 * Created by PhpStorm.
 * User: Wilson
 * Date: 4/17/2016
 * Time: 3:09 PM
 */
if(!isset($_SESSION['user'])){
    header('location:login.php');
}