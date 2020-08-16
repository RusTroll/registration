<?php require_once 'header.php'; ?>
<div class="container col-8 offset-2 ">
<?php if ($_SESSION['auth'] == false): ?>

<div class="row">
    <div class="col-6">
        <button class="btn btn-success m-4 col-11" id="signup">Зарегистрироваться</button>
        <form action="signup.php" class="form-group mx-4" method="post" id="signupForm">
            <div id="errorSignup" class="mb-4"></div>
            <input type="text" name="login" placeholder="Введите логин" id="login" class="form-control" minlength="5" maxlength="20"><br>
            <input type="email" name="email" placeholder="Введите email" id="email" class="form-control"><br>
            <input type="password" name="password1" placeholder="Введите пароль" id="password1" class="form-control" minlength="6"><br>
            <input type="password" name="password2" placeholder="Повторите пароль" id="password2" class="form-control" minlength="6"><br>
            <input type="submit" name="sign_up" id="signupSubmit" value="Зарегистрироваться" class="btn btn-primary form-control">
        </form>
    </div>
    <div class="col-6">
        <button class="btn btn-success m-4 col-11" id="signin">Авторизоваться</button>
        <form action="signin.php" class="form-group mx-4" method="post" id="signinForm">
            <div id="errorSignin" class="mb-4"></div>
            <input type="email" name="emailLog" placeholder="Введите email" id="emailLog" class="form-control mb-4">
            <input type="password" name="passwordLog" placeholder="Введите пароль" id="passwordLog" class="form-control mb-4" minlength="6">
<!--            <label class="form-check-label mx-4 mb-4">-->
<!--                <input type="checkbox" value="1" name="remember" id="remember" class="form-check-input">-->
<!--                Запомнить меня-->
<!--            </label>-->
            <input type="submit" name="sign_in" id="signinSubmit" value="Авторизоваться" class="btn btn-primary form-control">
        </form>
    </div>
</div>
    <?php else: ?>
    <div class="row mt-4 text-center">
        <div class="col-12">
            <?php
                echo 'Привет, ' . $_SESSION['login'] . '. <br> Вы успешно авторизовались.';
            ?>
        </div>
        <div class="col-12 mt-4">
            <a href="logout.php" name="logout"class="btn btn-danger form-control col-8" id="logout">Выйти из аккаунта</a>
        </div>
    </div>
    <?php endif; ?>
</div>
</body>
</html>