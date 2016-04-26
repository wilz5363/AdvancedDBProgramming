<?php
$section = 'rent';
include 'inc\head.php';
$rentals = $conn->query('select * from show_rent')->fetchAll(PDO::FETCH_ASSOC);

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
				<?php foreach ($rentals as $rental){?>
					<tr>
						<td><?php echo $rental['RENTAL_ID'];?></td>
						<td><?php echo $rental['CUSTOMER_ID'];?></td>
						<td><?php echo $rental['CUSTOMER_NAME'];?></td>
						<td><?php echo $rental['CUSTOMER_NRIC'];?></td>
						<td><?php echo $rental['CAR_PLATE'];?></td>
						<td><?php echo $rental['CAR_MODEL'];?></td>
						<td><?php echo $rental['CAR_COLOR'];?></td>
						<td><?php echo $rental['CC_NAME'];?></td>
						<td><?php echo $rental['CC_PRICE'];?></td>
						<td>
							<a href="rent_edit.php?q=<?php echo $rental['RENTAL_ID'];?>" class="btn btn-primary" name="update">Update</a>
							<a href="rent_return.php?q=<?php echo $rental['RENTAL_ID'];?>" class="btn btn-success" name="return">Return</a>
						</td>
					</tr>
				<?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>




<a class="btn btn-primary" data-toggle="modal" href="#modal-id" style="bottom:5%; right: 5%;position: fixed; border-radius: 50%; font-size: 45px; width:70px;height:70px;text-align: center;line-height:60px">+</a>
<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Add Rental</h4>
			</div>
			<div class="modal-body">
				<form action="" method="post" role="form">
					<div class="form-group">
						<label for=""></label>
						<input type="text" class="form-control" name="" id="" placeholder="Input...">
					</div>
                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" class="form-control" name="" id="" placeholder="Input...">
                    </div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<?php include 'inc\footer.php';?>
