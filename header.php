<?php require_once 'init.php'; ?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= title; ?></title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous">
    </script>
    <?php if ($_COOKIE['language'] == 'en'): ?>
        <script src="js/script_en.js"></script>
    <?php else: ?>
        <script src="js/script_ru.js"></script>
    <?php endif; ?>
</head>
<body>
<header class="container">
    <div class="row col-2 offset-8">
        <a href="language/language.php?language=ru" class="m-2"><img src="img/russia.png" alt="Russian language"></a>
        <a href="language/language.php?language=en" class="m-2"><img src="img/united-kingdom.png" alt="English language"></a>
    </div>
</header>