<?php
require_once '../init.php';

$lang = $_GET['language'];

if (!in_array($lang, array('ru', 'en'))) $lang = 'ru';

if ($lang == 'ru') {
    setcookie('language', 'ru', time() + 3600 * 24 * 30, '/');
} else {
    setcookie('language', 'en', time() + 3600 * 24 * 30, '/');
}

header('Location: /');