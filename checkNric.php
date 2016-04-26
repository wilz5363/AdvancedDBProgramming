<?php
include 'inc\dbcon.php';
$q = $_GET['q'];
$data="";
$result = $conn->query("select customer_nric from customer where customer_nric = '".$q."'")->fetchColumn();
echo $result == "" ? "" : "This NRIC has been used before.";



