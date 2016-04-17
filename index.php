<?php
$section = 'rent';
include 'inc\head.php';
include 'inc\auth.php';
?>
<h1>RENT</h1>

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
