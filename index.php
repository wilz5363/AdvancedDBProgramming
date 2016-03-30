<?php
/**
 * Created by PhpStorm.
 * User: Wilson
 * Date: 3/29/2016
 * Time: 9:15 PM
 */
$tns = "
(DESCRIPTION =
    (ADDRESS_LIST =
      (ADDRESS = (PROTOCOL = TCP)(HOST = 10.131.79.166)(PORT = 1522))
    )
    (CONNECT_DATA =
        (SERVER = DEDICATED)
        (SERVICE_NAME = ADP)
    )
  )
       ";
$db_username = "wilson";
$db_password = "chanwilson";
try{
    $conn = new PDO("oci:dbname=".$tns,$db_username,$db_password);
    $query = "SELECT table_name FROM user_tables";
    $result = $conn->query($query)->fetchAll();
    print_r($result);
}catch(PDOException $e){
    echo ($e->getMessage());
}