<?php
require_once 'init.php';

$email = $_POST['email'];
$password = $_POST['password'];

$user = new User();
$user -> logUser($email, $password, $pdo);