<?php
define('HOST', 'localhost');
define('USER', 'admin');
define('PASS', '123456');
define('DBNAME', 'agenda');

$conn = new PDO('mysql:host='. HOST . ';dbname='.DBNAME.';', USER, PASS);
