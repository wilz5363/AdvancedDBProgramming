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
      (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
    )
    (CONNECT_DATA =
        (SERVER = DEDICATED)
        (SERVICE_NAME = orcl)
    )
  )
       ";
$db_username = "wilson";
$db_password = "chanwilson";
try{
    $conn = new PDO("oci:dbname=".$tns,$db_username,$db_password);
}catch(PDOException $e){
    echo ($e->getMessage());
}

