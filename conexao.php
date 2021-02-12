<?php
define('HOST', 'localhost');
define('USER', 'admin');
define('PASS', '123456');
define('DBNAME', 'agenda');

try{

    $conn = new PDO('mysql:host='. HOST . ';dbname='.DBNAME.';', USER, PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    throw new PDOException($e);
 }
