<?php
include_once 'init.php';

$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];

$user = new User();
$user -> addUser($login, $email, $password, $pdo);