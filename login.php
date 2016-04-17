<?php
$section = 'login';
$err_message = '';
include 'inc\head.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['usernameInput'];
    $password = $_POST['passwordInput'];
    try {
        $stmt = $conn->prepare('begin USER_LOGIN_PROCEDURE(?,?,?);end;');
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $password);
        $stmt->bindParam(3, $rowCount, PDO::PARAM_INPUT_OUTPUT,32);
        $stmt->execute();


        if ($rowCount !=1) {
            $err_message = 'Wrong username or password.';
        } else if($rowCount == 1) {
            $_SESSION['user'] = $username;
            header('location:index.php');
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
<div class="navbar navbar-default">
    <a class="navbar-brand" href="#">Car Rental</a>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form action="" method="post" role="form">
                <legend>Sign In</legend>

                <div class="form-group">
                    <label for="username">User Name: </label>
                    <input type="text" class="form-control" name="usernameInput" id="username" placeholder="User Name"
                           required>
                </div>
                <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" class="form-control" name="passwordInput" id="password"
                           placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <?php echo $err_message; ?>
        </div>
    </div>
</div>

<?php include 'inc\footer.php'; ?>
