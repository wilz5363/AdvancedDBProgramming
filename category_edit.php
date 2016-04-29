<?php
$section = 'car_category';
include 'inc/head.php';
if($_SERVER['REQUEST_METHOD']=='GET'){
    if($_GET == null){
        header('Location: car_category.php');
        exit();
    }else{
        $cc_id = $_GET['id'];
        try{
            $stmt = $conn->prepare('begin show_one_car_catgory(?,?,?); end;');
            $stmt->bindParam(1, $cc_id);
            $stmt->bindParam(2, $cc_name, PDO::PARAM_INPUT_OUTPUT,32);
            $stmt->bindParam(3, $cc_price, PDO::PARAM_INPUT_OUTPUT,32);
            $stmt->execute();

            echo $cc_name;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $nameInput = $_POST['nameInput'];
    $priceInput = $_POST['priceInput'];
    $cateId = $_POST['idInput'];
    $stmt = $conn->prepare('begin update_car_cate_proc(?,?,?); end;');
    $stmt->bindParam(1,$nameInput);
    $stmt->bindParam(2,$priceInput);
    $stmt->bindParam(3,$cateId);
    if($stmt->execute()){
        header('Location: car_category.php');
        exit();
    }else{
        echo '<script>alert("Unable to update. Please try again.")</script>';
    }

}

?>
<div class="container">
	<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-md-offset-4">
			<form action="" method="post" role="form" autocomplete="off">
				<legend>Update Car Category</legend>
			
				<div class="form-group">
                    <label for="cc_id">Category ID: </label>
                    <input type="text" class="form-control" name="idInput" id="cc_id" value="<?php echo htmlspecialchars($_GET['id'])?>" readonly>
                </div>
                <div class="form-group">
                    <label for="cc_name">Category Name: </label>
                    <input type="text" class="form-control" name="nameInput" id="cc_name" value="<?php echo htmlspecialchars($cc_name)?>">
                </div>
                <div class="form-group">
                    <label for="cc_price">Price (per hour): </label>
                    <input type="text" class="form-control" name="priceInput" id="cc_price" value="<?php echo htmlspecialchars($cc_price)?>">
                </div>
			
				
			
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>