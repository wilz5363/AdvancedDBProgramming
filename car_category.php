<?php
$section = 'car_category';
include 'inc\head.php';?>
<h1>CAR CATEGORY</h1>
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
						<label for="category_name">Category Name: </label>
						<input type="text" class="form-control" name="nameInput" id="category_name" required>
					</div>

                    <div class="form-group">
                        <label for="category_price">Price (per hour): </label>
                        <input type="number" class="form-control" name="priceInput" id="category_price" required>
                    </div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php include 'inc\footer.php';?>
