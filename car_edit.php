<?php
$section = 'car';
include 'inc\head.php';

$data = "";
$query = 'select * from table (new_car_category_selection())';
$result = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($_GET == null) {
        header('Location: car.php');
        exit();
    } else {
        $c_id = $_GET['id'];
        $car = $conn->prepare('begin show_one_car_proc(?,?,?,?,?,?); end;');
        $car->bindParam(1, $c_id);
        $car->bindParam(2, $carPlate, PDO::PARAM_INPUT_OUTPUT, 32);
        $car->bindParam(3, $carModel, PDO::PARAM_INPUT_OUTPUT, 32);
        $car->bindParam(4, $carColor, PDO::PARAM_INPUT_OUTPUT, 32);
        $car->bindParam(5, $carStatus, PDO::PARAM_INPUT_OUTPUT, 32);
        $car->bindParam(6, $carCategory, PDO::PARAM_INPUT_OUTPUT, 32);
        $car->execute();
    }
}

else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $car_id = $_POST['idInput'];
    $plate = $_POST['plateInput'];
    $color = $_POST['colorInput'];
    $model = $_POST['modelInput'];
    $status = $_POST['statusInput'];
    $category = $_POST['category'];

//    try {
        $insert_car = $conn->prepare('begin update_car_proc(?,?,?,?,?,?); end;');
        $insert_car->bindParam(6, $car_id);
        $insert_car->bindParam(1, $plate);
        $insert_car->bindParam(2, $model);
        $insert_car->bindParam(3, $color);
        $insert_car->bindParam(4, $status);
        $insert_car->bindParam(5, $category);
        if ($insert_car->execute()) {
            header('Location:car.php');
            exit();
        }
//
//    } catch (PDOException $e) {
//        if ($e->errorInfo[1] == '1') {
//            echo 'Duplicated Car Inserted';
//        }
//    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form action="" method="post" role="form">
                <legend>Update Car</legend>

                <div class="form-group">
                    <label for="carId">Car ID: </label>
                    <input type="text" class="form-control" name="idInput" id="carId"
                           value="<?php echo htmlspecialchars($c_id); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="plateNo">Plate No: </label>
                    <input type="text" class="form-control" name="plateInput" id="plateNo"
                           value="<?php echo htmlspecialchars($carPlate); ?>" required>
                </div>
                <div class="form-group">
                    <label for="model">Model: </label>
                    <input type="text" class="form-control" name="modelInput" id="model"
                           value="<?php echo htmlspecialchars($carModel); ?>" required>
                </div>
                <div class="form-group">
                    <label for="color">Color: </label>
                    <input type="text" class="form-control" name="colorInput" id="color"
                           value="<?php echo htmlspecialchars($carColor); ?>" required>
                </div>
                <div class="form-group">
                    <label for="status">Status: </label>
                    <select name="statusInput" id="status" class="form-control" required>
                        <option value=""> -- Select One --</option>
                        <option value="AVAILABLE" <?php if($carStatus == 'AVAILABLE')echo 'selected';?>>AVAILABLE</option>
                        <option value="NOT AVAILABLE" <?php if($carStatus == 'NOT AVAILABLE')echo 'selected';?> disabled>NOT AVAILABLE</option>
                        <option value="MAINTENANCE" <?php if($carStatus == 'MAINTENANCE')echo 'selected';?> >MAINTENANCE</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="category_select">Category: </label>
                    <select name="category" id="category_select" class="form-control" required>
                        <option value=""> -- Select One --</option>
                        <?php
                        foreach ($result as $res) {
                            ?>
                            <option value="<?php echo $res['CC_ID'];?>"<?php if($carCategory == $res['CC_ID']) echo 'selected';?>><?php echo $res['CC_NAME']; ?></option>

                            <?php
                        }
                        ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>
</div>


<?php include 'inc\footer.php'; ?>



