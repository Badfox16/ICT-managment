<?php
$database = "PHP_DB";
$server = "localhost:3306";
$user = "root";
$pass = "Jeremias1";

try {
    $connection = new PDO("mysql:host=$server;dbname=$database", $user, $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro " . $e->getMessage();
}
