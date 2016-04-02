<?php
$section = 'customer';
include 'inc\head.php';?>
<h1>CUSTOMER</h1>
<a class="btn btn-primary" data-toggle="modal" href="#modal-id">Trigger modal</a>
<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
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
                        <input type="text" class="form-control" name="customerInput" id="customerAddress" required>
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
