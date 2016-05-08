<?php
/**
 * Created by PhpStorm.
 * User: Wilson
 * Date: 4/19/2016
 * Time: 5:18 PM
 */
include 'inc/dbcon.php';
$q = $_GET['q'];
try{
    $return_rent = $conn->prepare("begin rental_return(?,?); end;");
    $return_rent->bindParam(1, $q);
    $return_rent->bindParam(2,$totalPrice,PDO::PARAM_INPUT_OUTPUT,32);
    $return_rent->execute();
//    header('location:index.php');
}catch(PDOException $e){
    echo $e->getMessage();
}?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="Page Description">
        <meta name="author" content="Wilson">
        <title>Page Title</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
              integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    </head>
    <body>
    <div class="jumbotron">
    	<div class="container">
    		<h1>Total Payment:</h1>
    		<h1>RM <?php echo $totalPrice;?></h1>
            <p>
                <a href="index.php" class="btn btn-success btn-lg btn-block">Return</a>
            </p>
    	</div>
    </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
                integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
                crossorigin="anonymous"></script>
    </body>
</html>
