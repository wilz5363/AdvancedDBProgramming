<?php
include 'inc\dbcon.php';
$q = $_GET['q'];
$data="";
$result = $conn->query("select customer_name, customer_id from customer where customer_nric = '".$q."'")->fetch(PDO::FETCH_ASSOC);
echo json_encode($result);



