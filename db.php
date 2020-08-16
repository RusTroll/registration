<?php
session_start();

$serverName = "localhost";
$userName = "root";
$password = "root";
$dataBase = "db_test";

try {
    $pdo = new PDO ("mysql:host=$serverName; dbname=$dataBase", $userName, $password);
}
catch (PDOException $e) {
    echo "Соединение не установлено, ошибка: ".$e -> getMessage();
}