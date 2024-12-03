<?php

// Gathering data

$dsn = "mysql: host=localhost; dbname=db_project";

$bd_username = "root";
$db_password = "";

// connecting

try {
    $pdo = new PDO($dsn, $bd_username, $bd_password);

    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "connection failed : " . $e->getMessage();
}