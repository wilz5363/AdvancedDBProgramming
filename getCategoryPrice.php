<?php
include 'inc\dbcon.php';
$carPlate = $_GET['q'];
$carModel = $_GET['m'];
$carColor = $_GET['color'];
$result = $conn->query("select cc_name, cc_price from car,CAR_CATEGORY where car_plate = '".$carPlate."' and car_model = '".$carModel."' and car_color = '".$carColor."' and car.CAR_CATEGORY = CAR_CATEGORY.CC_ID")->fetch(PDO::FETCH_ASSOC);
echo json_encode($result);
