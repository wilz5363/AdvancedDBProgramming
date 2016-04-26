<?php
$section = 'profile';
include 'inc\head.php';
$data = '';
try {

    $profile = $conn->query("select * from staff where username ='" . $_SESSION['user'] . "'")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($profile as $p) {
        $data[] = $p['USERNAME'];
        $data[] = $p['PASSWORD'];
        $data[] = $p['STAFF_IC'];
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['passwordInput'];
    $ic = $_POST['nricInput'];

    try {
        $stmt = $conn->prepare('update staff set password = ?, staff_ic = ? where username = ?');
        $stmt->bindParam(1, $password);
        $stmt->bindParam(2, $ic);
        $stmt->bindParam(3, $_SESSION['user']);
        $stmt->execute();
        if ($password != $data[1]) {
            header('location:signout.php');
        } else {
            header('location:staff_profile.php?update=true');
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
<?php
if (isset($_GET['update'])) {
    ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Success!</strong> Profile successfully updated.
    </div>
    <?php
}
?>


<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form action="" method="post" role="form">
                <legend>Staff Profile</legend>

                <div class="form-group">
                    <label for="username">User Name: </label>
                    <input type="text" class="form-control" name="usernameInput" id="username"
                           value="<?php echo htmlspecialchars($data[0]) ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" class="form-control" name="passwordInput" id="password"
                           value="<?php echo htmlspecialchars($data[1]) ?>" required>
                </div>
                <div class="form-group">
                    <label for="staff_ic">NRIC: </label>
                    <input type="text" class="form-control" name="nricInput" id="staff_ic"
                           value="<?php echo htmlspecialchars($data[2]) ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


<?php include 'inc\footer.php' ?>
