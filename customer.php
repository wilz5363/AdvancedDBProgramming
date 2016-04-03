<?php
$section = 'customer';
include 'inc\head.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
	$name = $_POST['nameInput'];
	$nric = $_POST['nricInput'];
	$address = $_POST['addressInput'];
	$postcode = $_POST['postcodeInput'];
	$city = $_POST['cityInput'];

	var_dump($name,$nric, $address,$postcode, $city);
}











?>
<h1>CUSTOMER</h1>
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
