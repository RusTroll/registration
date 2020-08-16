<?php
require_once 'connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

$user = new User();
$user -> logUser($email, $password, $pdo);