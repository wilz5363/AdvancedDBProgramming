<?php
$section = 'rent';
include 'inc\head.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET)) {
        try {
            $rent = $conn->prepare('begin show_one_rent(?,?,?,?,?,?,?,?,?); end;');
            $rent->bindParam(1, $_GET['q']);
            $rent->bindParam(2, $cust_id, PDO::PARAM_INPUT_OUTPUT, 32);
            $rent->bindParam(3, $cust_name, PDO::PARAM_INPUT_OUTPUT, 32);
            $rent->bindParam(4, $cust_ic, PDO::PARAM_INPUT_OUTPUT, 32);
            $rent->bindParam(5, $car_plate, PDO::PARAM_INPUT_OUTPUT, 32);
            $rent->bindParam(6, $car_model, PDO::PARAM_INPUT_OUTPUT, 32);
            $rent->bindParam(7, $car_color, PDO::PARAM_INPUT_OUTPUT, 32);
            $rent->bindParam(8, $cc_category, PDO::PARAM_INPUT_OUTPUT, 32);
            $rent->bindParam(9, $cc_price, PDO::PARAM_INPUT_OUTPUT, 32);
            $rent->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>

<div class="container" style="margin-top: 3%">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="" method="post" role="form">
                <legend>Update Rent</legend>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="rent">Rent ID: </label>
                            <input type="text" class="form-control" name="rentInput" id="rent"
                                   value="<?php echo htmlspecialchars($_GET['q']); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="custId">Customer ID: </label>
                            <input type="text" class="form-control" name="custIdInput" id="custId"
                                   value="<?php echo htmlspecialchars($cust_id); ?>">
                        </div>
                        <div class="form-group">
                            <label for="custName">Customer Name: </label>
                            <input type="text" class="form-control" name="custNmaeInput" id="custName"
                                   value="<?php echo htmlspecialchars($cust_name); ?>">
                        </div>
                        <div class="form-group">
                            <label for="nric">Customer NRIC:</label>
                            <input type="text" class="form-control" name="custNricInput" id="nric"
                                   value="<?php echo htmlspecialchars($cust_ic); ?>">
                        </div>
                        <div class="form-group">
                            <label for="carPlate">Car Plate: </label>
                            <input type="text" class="form-control" name="carPlateInput" id="carPlate"
                                   value="<?php echo htmlspecialchars($car_plate); ?>" onblur="searchCategory()"><span id="errorSpan"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="carModel">Car Model: </label>
                            <input type="text" class="form-control" name="carModelInput" id="carModel"
                                   value="<?php echo htmlspecialchars($car_model); ?>">
                        </div>
                        <div class="form-group">
                            <label for="carColor">Car Color: </label>
                            <input type="text" class="form-control" name="carColorInput" id="carColor"
                                   value="<?php echo htmlspecialchars($car_color); ?>">
                        </div>
                        <div class="form-group">
                            <label for="carCategory">Car Category: </label>
                            <input type="text" class="form-control" name="carCategoryInput" id="carCategory"
                                   value="<?php echo htmlspecialchars($cc_category); ?>">
                        </div>
                        <div class="form-group">
                            <label for="price">Price (Per Hour): </label>
                            <input type="text" class="form-control" name="priceInput" id="price"
                                   value="<?php echo htmlspecialchars($cc_price); ?>">
                        </div>
                    </div>
                </div>


                <input type="submit" class="btn btn-primary btn-block">
            </form>
        </div>
    </div>
</div>
<script>
    function searchCategory(){
        var cc = document.getElementById("carPlate");
        if(cc.value.trim() != ""){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState == 4 && xmlhttp.status==200){
                    if(){

                    }else{
                        document.getElementById("errorSpan").innerHTML = xmlhttp.responseText;
                    }
                }
            };
            xmlhttp.open("GET","checkNric.php?q=" + cc.value, true);
            xmlhttp.send();
        }
    }
</script>

<?php
include 'inc\footer.php';
?>
