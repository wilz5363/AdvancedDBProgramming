<?php
$section = 'car';
include 'inc\head.php';
$data;
$query = 'select * from car_category';
$result = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $plateno = $_POST['platenoInput'];
    $model = $_POST['modelInput'];
    $color = $_POST['colorInput'];
    $category = $_POST['category'];

//    var_dump($plateno, $model, $color, $category);

    $stmt = $conn->prepare('begin insert_car_proc(?,?,?,?); end;');
    try{
        $stmt->bindParam(1, $plateno);
        $stmt->bindParam(2, $model);
        $stmt->bindParam(3, $color);
        $stmt->bindParam(4, $category);
        $exe = $stmt->execute();
    }catch(PDOException $e){
        if($e->errorInfo[1] == '1'){
            echo 'Duplicated Car Inserted';
        }
    }


}

?>

<h1>Car</h1>


<a class="btn btn-primary" data-toggle="modal" href="#modal-id" style="bottom:5%; right: 5%;position: fixed; border-radius: 50%; font-size: 45px; width:70px;height:70px;text-align: center;line-height:60px">+</a>
<div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Insert New Car</h4>
            </div>
            <div class="modal-body">
                <form action="car.php" method="post">

                    <div class="form-group">
                        <label for="platenoInput">Plate No: </label>
                        <input type="text" name="platenoInput" id="platenoInput" class="form-control"
                               required="required">
                    </div>

                    <div class="form-group">
                        <label for="modelInput">Car Model: </label>
                        <input type="text" name="modelInput" id="modelInput" class="form-control"
                               required="required">
                    </div>

                    <div class="form-group">
                        <label for="colorInput">Color: </label>
                        <input type="text" name="colorInput" id="colorInput" class="form-control"
                               required="required">
                    </div>

                    <div class="form-group">
                        <label for="category_select">Category: </label>
                        <select name="category" id="category_select" class="form-control">
                            <option value=""> -- Select One --</option>
                            <?php
                            foreach ($result as $res) {
                                ?>
                                <option value="<?php echo $res['CC_ID']; ?>"><?php echo $res['CC_NAME']; ?></option>

                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>

                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php include 'inc\footer.php'; ?>
