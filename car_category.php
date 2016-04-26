<?php
$section = 'car_category';
include 'inc\head.php';

$query = 'select * from table(all_car_category)';
$stmt = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);

select 


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cate_name = $_POST['nameInput'];
    $price = $_POST['priceInput'];

    $query = 'begin insert_car_categ_proc(?,?);end;';

    try{
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $cate_name);
        $stmt->bindParam(2, $price);
        $stmt->execute();
        echo '<script>alert("Insert new category success.")</script>';
        header('Location:http://localhost/ADP/car_category.php');
        exit();
    }catch(Exception $e){
        $e->getMessage();
    }
}

?>
<div class="container">
<h1>CAR CATEGORY</h1>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Category ID</th>
            <th>Category Name</th>
            <th>Price (per hour)</th>
            <th></th>
        </tr>
	</thead>
	<tbody>

    <?php
    foreach ($stmt as $result){?>
        <tr>
            <td><?php echo $result['CC_ID'];?></td>
            <td><?php echo $result['CC_NAME'];?></td>
            <td><?php echo $result['CC_PRICE'];?></td>
            <td><a class="btn btn-info" href="category_edit.php?id=<?php echo  $result['CC_ID']; ?>">Edit</a></td>
        </tr>
        <?php
    }
    ?>

	</tbody>
</table>
</div>
<a class="btn btn-primary" data-toggle="modal" href="#modal-id" style="bottom:5%; right: 5%;position: fixed; border-radius: 50%; font-size: 45px; width:70px;height:70px;text-align: center;line-height:60px">+</a>
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
