<?php
$section = 'car';
include 'inc\head.php';

$data = "";
$query = 'select * from car_category';
$result = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($_GET == null) {
        header('Location: car.php');
        exit();
    } else {
        $c_id = $_GET['id'];
        $car = $conn->query("select * from car where car_id ='" . $c_id . "'")->fetchAll();
        foreach ($car as $c) {
            $data[] = $c['CAR_ID'];
            $data[] = $c['CAR_PLATE'];
            $data[] = $c['CAR_MODEL'];
            $data[] = $c['CAR_COLOR'];
        }
    }
}

else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $car_id = $_POST['idInput'];
    $plate = $_POST['plateInput'];
    $color = $_POST['colorInput'];
    $model = $_POST['modelInput'];
    $category = $_POST['category'];
//    try {
        $insert_car = $conn->prepare('begin update_car_proc(?,?,?,?,?); end;');
        $insert_car->bindParam(5, $car_id);
        $insert_car->bindParam(1, $plate);
        $insert_car->bindParam(2, $model);
        $insert_car->bindParam(3, $color);
        $insert_car->bindParam(4, $category);
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
                           value="<?php echo htmlspecialchars($data[0]); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="plateNo">Plate No: </label>
                    <input type="text" class="form-control" name="plateInput" id="plateNo"
                           value="<?php echo htmlspecialchars($data[1]); ?>" required>
                </div>
                <div class="form-group">
                    <label for="model">Model: </label>
                    <input type="text" class="form-control" name="modelInput" id="model"
                           value="<?php echo htmlspecialchars($data[2]); ?>" required>
                </div>
                <div class="form-group">
                    <label for="color">Color: </label>
                    <input type="text" class="form-control" name="colorInput" id="color"
                           value="<?php echo htmlspecialchars($data[3]); ?>" required>
                </div>
                <div class="form-group">
                    <label for="status">Status: </label>
                    <select name="name" id="status" class="form-control" required>
                        <option value=""> -- Select One --</option>
                        <option value="AVAILABLE">AVAILABLE</option>
                        <option value="NOT AVAILABLE">NOT AVAILABLE</option>
                        <option value="MAINTENANCE">MAINTENANCE</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="category_select">Category: </label>
                    <select name="category" id="category_select" class="form-control" required>
                        <option value=""> -- Select One --</option>
                        <?php
                        foreach ($result as $res) {
                            ?>
                            <option value="<?php echo $res['CC_ID']; ?>"><?php echo $res['CC_NAME']; ?></option>

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



