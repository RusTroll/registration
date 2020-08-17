<?php
session_start();

require_once 'config_db.php';
include 'classes/User.php';

if ($_COOKIE['language'] == 'en') {
    include 'language/en.php';
} else {
    include 'language/ru.php';
}