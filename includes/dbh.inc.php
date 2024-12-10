<?php

$hostname = "localhost";
$dbname = "db_project";
$dbusername = "root";
$dbpwd = "";

try {
    $pdo = new PDO("mysql:host=$hostname; dbname=$dbname", $dbusername, $dbpwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed : ". $e->getMessage();
}