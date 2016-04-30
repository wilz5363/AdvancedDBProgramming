<?php
include 'inc\dbcon.php';
$q = $_GET['q'];
$result = $conn->query("select DISTINCT (car_model)from car where CAR_PLATE = '".$q."'")->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);
