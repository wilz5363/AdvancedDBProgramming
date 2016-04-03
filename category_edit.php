<?php
$section = 'car_category';
include 'inc/head.php';
if($_SERVER['REQUEST_METHOD']=='GET'){
    if($_GET == null){
        header('Location: car_category.php');
        exit();
    }else{
        $cc_id = $_GET['id'];
        $stmt  = $conn->query("select * from car_category where cc_id = '".$cc_id."'")->fetchAll(PDO::FETCH_ASSOC);
        $data="";
        foreach($stmt as $res){
            $data[] = $res['CC_ID'];
            $data[] = $res['CC_NAME'];
            $data[] = $res['CC_PRICE'];
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

        echo '<script>alert("Update Success.")</script>';
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
			<form action="" method="post" role="form">
				<legend>Update Car Category</legend>
			
				<div class="form-group">
                    <label for="cc_id">Category ID: </label>
                    <input type="text" class="form-control" name="idInput" id="cc_id" value="<?php echo htmlspecialchars($data[0])?>" readonly>
                </div>
                <div class="form-group">
                    <label for="cc_name">Category Name: </label>
                    <input type="text" class="form-control" name="nameInput" id="cc_name" value="<?php echo htmlspecialchars($data[1])?>">
                </div>
                <div class="form-group">
                    <label for="cc_price">Price (per hour): </label>
                    <input type="text" class="form-control" name="priceInput" id="cc_price" value="<?php echo htmlspecialchars($data[2])?>">
                </div>
			
				
			
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>