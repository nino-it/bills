<?php

$dsn = "mysql:host=localhost;dbname=bills;charset=utf8";
$user = "root";
$password = "";

global $pdo;
$pdo = new PDO($dsn, $user, $password);

define("ROOT_PATH", "http://localhost/bills/");