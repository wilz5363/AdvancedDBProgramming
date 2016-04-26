<?php
$section = 'customer';
include 'inc\head.php';

$select_query = 'select * from table(all_customer)';
try{

	$customers = $conn->query($select_query)->fetchAll(PDO::FETCH_ASSOC);
}catch(PDOException $e){
	echo $e->getMessage();
}

if($_SERVER['REQUEST_METHOD']=='POST'){
	$name = $_POST['nameInput'];
	$nric = $_POST['nricInput'];
	$address = $_POST['addressInput'];
	$postcode = $_POST['postcodeInput'];
	$city = $_POST['cityInput'];

	$query = 'begin insert_customer_proc(?,?,?,?,?); end;';
	try{
		$stmt = $conn->prepare($query);
		$stmt->bindParam(1,$name);
		$stmt->bindParam(2,$nric);
		$stmt->bindParam(3,$address);
		$stmt->bindParam(4,$postcode);
		$stmt->bindParam(5,$city);
		$stmt->execute();
		header('Location:http://localhost/ADP/customer.php');
		exit();
	}catch(PDOException $e){
		echo $e->getMessage();
	}
}
?>

<div class="container">
    <h1>CUSTOMER</h1>
    <table class="table table-hover">
    	<thead>
    		<tr>
                <th>Customer ID</th>
                <th>Name</th>
                <th>NRIC</th>
                <th>Address</th>
                <th>Postcode</th>
                <th>City</th>
                <th>Free Ride</th>
                <th>Registered On</th>
    		</tr>
    	</thead>
    	<tbody>
    		<?php foreach ($customers as $customer){?>
                <tr>
                    <td><?php echo $customer['CUSTOMER_ID'];?></td>
                    <td><?php echo $customer['CUSTOMER_NAME'];?></td>
                    <td><?php echo $customer['CUSTOMER_NRIC'];?></td>
                    <td><?php echo $customer['CUSTOMER_ADDRESS'];?></td>
                    <td><?php echo $customer['CUSTOMER_POSTCODE'];?></td>
                    <td><?php echo $customer['CUSTOMER_CITY'];?></td>
                    <td><?php echo $customer['CUSTOMER_FREE_RIDE'];?></td>
                    <td><?php echo $customer['CREATED_ON'];?></td>
                    <td><a class="btn btn-info" href="customer_edit.php?=<?php echo $customer['CUSTOMER_ID'];?>">Edit</a></td>
                </tr>
            <?php } ?>
    	</tbody>
    </table>
</div>


<a class="btn btn-primary" data-toggle="modal" href="#modal-id" style="bottom:5%; right: 5%;position: fixed; border-radius: 50%; font-size: 45px; width:70px;height:70px;text-align: center;line-height:60px">+</a>
<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">New Customer</h4>
			</div>
			<div class="modal-body">
				<form action="" method="post" role="form">
					<div class="form-group">
						<label for="customerName">Name: </label>
						<input type="text" class="form-control" name="nameInput" id="customerName" required">
					</div>
                    <div class="form-group">
                        <label for="customerNric">NRIC: </label>
                        <input type="text" class="form-control" name="nricInput" id="customerNric" required>
                    </div>
                    <div class="form-group">
                        <label for="customerAddress">Address: </label>
                        <input type="text" class="form-control" name="addressInput" id="customerAddress" required>
                    </div>
                    <div class="form-group">
                        <label for="customerPostcode">Postcode: </label>
                        <input type="text" class="form-control" name="postcodeInput" id="customerPostcode" required>
                    </div>
                    <div class="form-group">
                        <label for="customerCity">City: </label>
                        <input type="text" class="form-control" name="cityInput" id="customerCity" required>
                    </div>

					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php include 'inc\footer.php';?>
