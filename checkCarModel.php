<?php
include 'inc\dbcon.php';
$carPlate = $_GET['q'];
$carModel = $_GET['m'];
$result = $conn->query("select car_color from car where CAR_MODEL = '".$carModel."' AND CAR_PLATE = '".$carPlate."'AND CAR_STATUS = 'AVAILABLE'")->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);
