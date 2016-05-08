<?php
$section = 'rent';
include 'inc\head.php';
$rentals = $conn->query('select * from show_rent')->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cust_id = $_POST['custIdInput'];
    $car_plate = $_POST['carPlateInput'];
    $car_model = $_POST['carModelInput'];
    $car_color = $_POST['carColorInput'];
    try {
        $insert_rent = $conn->prepare('begin insert_rent_proc(?,?,?,?);end;');
        $insert_rent->bindParam(1, $cust_id);
        $insert_rent->bindParam(2, $car_plate);
        $insert_rent->bindParam(3, $car_color);
        $insert_rent->bindParam(4, $car_model);
        $insert_rent->execute();
        header('location:index.php');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}


?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>RENT</h1>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Rental ID</th>
                    <th>Customer ID</th>
                    <th>Name</th>
                    <th>NRIC</th>
                    <th>Car Plate</th>
                    <th>Car Model</th>
                    <th>Car Color</th>
                    <th>Category Type</th>
                    <th>Rental Rate (per hour)</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($rentals as $rental) { ?>
                    <tr>
                        <td><?php echo $rental['RENTAL_ID']; ?></td>
                        <td><?php echo $rental['CUSTOMER_ID']; ?></td>
                        <td><?php echo $rental['CUSTOMER_NAME']; ?></td>
                        <td><?php echo $rental['CUSTOMER_NRIC']; ?></td>
                        <td><?php echo $rental['CAR_PLATE']; ?></td>
                        <td><?php echo $rental['CAR_MODEL']; ?></td>
                        <td><?php echo $rental['CAR_COLOR']; ?></td>
                        <td><?php echo $rental['CC_NAME']; ?></td>
                        <td><?php echo $rental['CC_PRICE']; ?></td>
                        <td>
                           <?php
                           if(isset($rental['RETURN_DATE'])) {
                                echo '<p>Returned</p>';
                           }else{
                               echo '<a href="rent_return.php?q='.$rental['RENTAL_ID'].'" class="btn btn-success"
                               name="return">Return</a>';
                           }
                           ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<a class="btn btn-primary" data-toggle="modal" href="#modal-id"
   style="bottom:5%; right: 5%;position: fixed; border-radius: 50%; font-size: 45px; width:70px;height:70px;text-align: center;line-height:60px">+</a>
<div class="modal fade" id="modal-id">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Rental</h4>
            </div>
            <div class="modal-body">
                <form action="" method="post" role="form" onsubmit="confirm('Are you sure you?')">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nric">Customer NRIC:</label>
                                <span id="nric_error" style="color: red"></span> <input type="text" class="form-control"
                                                                                        name="custNricInput" id="nric"
                                                                                        onblur="searchCustomer()"
                                                                                        required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="custId">Customer ID: </label>
                                <input type="text" class="form-control" name="custIdInput" id="custId" readonly
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="custName">Customer Name: </label>
                                <input type="text" class="form-control" name="custNameInput" id="custName" readonly
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="carPlate">Car Plate: </label><span id="carPlate_error"
                                                                               style="color: red"></span>
                                <input type="text" class="form-control" name="carPlateInput" id="carPlate"
                                       onblur="searchCarPlate()" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="carModel">Car Model: </label>
                                <select name="carModelInput" id="carModel" class="form-control"
                                        onblur="searchCarModel()" disabled>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="carColor">Car Color: </label>
                                <select name="carColorInput" id="carColor" class="form-control"
                                        onblur="searchCategorynPrice()" disabled>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="carCategory">Car Category: </label>
                                <input type="text" class="form-control" name="carCategoryInput" id="carCategory"
                                       required readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="price">Price (Per Hour): </label>
                                <input type="text" class="form-control" name="priceInput" id="price" readonly required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" onclick="insertConfirmation()">Submit</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="inc/js/script.js"></script>
<?php include 'inc\footer.php'; ?>
