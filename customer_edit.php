<?php
$section = 'customer';
include 'inc/head.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($_GET == null) {
        header('Location: car_category.php');
        exit();
    } else {
        try {
            $customer = $conn->prepare('begin show_one_customer(?,?,?,?,?,? ); end;');
            $customer->bindParam(1, $_GET['custId']);
            $customer->bindParam(2, $custName, PDO::PARAM_INPUT_OUTPUT, 100);
            $customer->bindParam(3, $custNric, PDO::PARAM_INPUT_OUTPUT, 100);
            $customer->bindParam(4, $custAddress, PDO::PARAM_INPUT_OUTPUT, 100);
            $customer->bindParam(5, $custPcode, PDO::PARAM_INPUT_OUTPUT, 100);
            $customer->bindParam(6, $custCity, PDO::PARAM_INPUT_OUTPUT, 100);
            $customer->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['customerNameInput'];
    $nric = $_POST['customerNricInput'];
    $address = $_POST['customerAddressInput'];
    $postcode = $_POST['customerPcodeInput'];
    $city = $_POST['customerCityInput'];
    $id = $_POST['customerIdInput'];

    try{
        $update_customer = $conn->prepare('begin update_customer_proc(?,?,?,?,?,?); end;');
        $update_customer->bindParam(1, $name);
        $update_customer->bindParam(2, $nric);
        $update_customer->bindParam(3, $address);
        $update_customer->bindParam(4, $postcode);
        $update_customer->bindParam(5, $city);
        $update_customer->bindParam(6, $id);
        $update_customer->execute();

        header('location: customer.php');

    }catch(PDOException $e){
        echo $e->getMessage();
    }


}
?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="" method="post" role="form">
                    <legend>Edit Customer</legend>

                    <div class="form-group">
                        <label for="customerId">Customer ID: </label>
                        <input type="text" class="form-control" name="customerIdInput" id="customerId"
                               value="<?php echo htmlspecialchars($_GET['custId']);?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="customerName">Name: </label>
                        <input type="text" class="form-control" name="customerNameInput" id="customerName"
                               value="<?php echo htmlspecialchars($custName);?>">
                    </div>
                    <div class="form-group">
                        <label for="customerNric">NRIC: </label>
                        <input type="text" class="form-control" name="customerNricInput" id="customerNric"
                               value="<?php echo htmlspecialchars($custNric);?>">
                    </div>
                    <div class="form-group">
                        <label for="customerAdd">Address: </label>
                        <input type="text" class="form-control" name="customerAddressInput" id="customerAdd"
                               value="<?php echo htmlspecialchars($custAddress);?>">
                    </div>
                    <div class="form-group">
                        <label for="customerPcode">Postcode: </label>
                        <input type="text" class="form-control" name="customerPcodeInput" id="customerPcode"
                               value="<?php echo htmlspecialchars($custPcode);?>">
                    </div>
                    <div class="form-group">
                        <label for="customerCity">City: </label>
                        <input type="text" class="form-control" name="customerCityInput" id="customerCity"
                               value="<?php echo htmlspecialchars($custCity);?>">
                    </div>



                 <button type="submit" class="btn btn-primary">Update</button>
             </form>
         </div>
     </div>
 </div>
