$(document).ready(() => {

    let patternEmail = /^[a-z0-9_-]+@[a-z0-9-]+\.([a-z]{2,6}\.)?[a-z]{2,6}$/i;
    let patternLogin = /^[a-z][a-z0-9]{4,19}$/i;

    $('#login').blur(() => {
       checkLogin($('#login'), $('#errorSignup'), $('#signupSubmit'));
    });

    $('#email').blur(() => {
       checkEmail($('#email'), $('#errorSignup'), $('#signupSubmit'));
    });

    $('#emailLog').blur(() => {
       checkEmail($('#emailLog'), $('#errorSignin'), $('#signinSubmit'));
    });

    function checkLogin(login, error, submit) {
        if (login.val().trim() != '') {
            if(login.val().search(patternLogin) != 0){
                error.text('Только английские буквы и цифры (первый символ обязательно буква)');
                submit.attr('disabled', true);
            } else {
                error.text('');
                submit.attr('disabled', false);
            }
        } else {
            error.text('Введите логин')
        }
    };

     function checkEmail(email, error, submit) {
        if (email.val().trim() != '') {
            if(email.val().search(patternEmail) != 0){
                error.text('Email не подходит');
                submit.attr('disabled', true);
            } else {
                error.text('');
                submit.attr('disabled', false);
            }
        } else {
            error.text('Введите email')
        }
    };

   $('#signup').click(() => {
        $('#signupForm').toggle(1000);
   }) ;

   $('#signin').click(() => {
        $('#signinForm').toggle(1000);
   }) ;

    $('#signupForm').submit((event) => {
        event.preventDefault();

        let $login = $('#login').val().trim();
        let $email = $('#email').val().trim();
        let $password1 = $('#password1').val().trim();
        let $password2 = $('#password2').val().trim();

        if ($login.length < 5 || $login.length > 20) {
            $("#errorSignup").text("Введите логин (от 5 до 20 символов)");
            return false;
        } else if ($email == "") {
            $("#errorSignup").text("Введите email");
            return false;
        } else if ($password1.length < 6) {
            $("#errorSignup").text("Введите пароль (не менее 6 символов)");
            return false;
        } else if ($password2 == "") {
            $("#errorSignup").text("Повторите пароль");
            return false;
        } else if ($password1 != $password2) {
            $("#errorSignup").text("Пароли не совпадают");
            return false;
        }
        $("#errorSignup").text("");

        $.ajax({
            url: 'signup.php',
            type: 'POST',
            cache: false,
            data: {'login': $login, 'email': $email, 'password': $password1},
            dataType: 'html',
            error: (data, exception) => {
                if (data.status === 0) {
                    alert('Not connect. Verify Network.');
                } else if (data.status == 404) {
                    alert('Requested page not found (404).');
                } else if (data.status == 500) {
                    alert('Internal Server Error (500).');
                } else if (exception === 'parsererror') {
                    alert('Requested JSON parse failed.');
                } else if (exception === 'timeout') {
                    alert('Time out error.');
                } else if (exception === 'abort') {
                    alert('Ajax request aborted.');
                } else {
                    alert('Uncaught Error. ' + data.responseText);
                }
            },
            success: (result) => {
                alert(result);
                if (result == 'Вы успешно зарегистрировались!') {
                    $('#signupForm').trigger('reset');
                    $('#signupForm').hide(1000);
                    $('#signinForm').show(1000);
                }
            }
        })
    });

    $('#signinForm').submit((event) => {
        event.preventDefault();

        let $email = $('#emailLog').val().trim();
        let $password = $('#passwordLog').val();

        if ($email == "") {
            $("#errorSignin").text("Введите email");
            return false;
        } else if ($password.length < 6) {
            $("#errorSignin").text("Введите пароль (не менее 6 символов)");
            return false;
        }
        $("#errorSignin").text("");

        $.ajax({
            url: 'signin.php',
            type: 'POST',
            cache: false,
            data: {'email': $email, 'password': $password},
            dataType: 'html',
            error: (data, exception) => {
                if (data.status === 0) {
                    alert('Not connect. Verify Network.');
                } else if (data.status == 404) {
                    alert('Requested page not found (404).');
                } else if (data.status == 500) {
                    alert('Internal Server Error (500).');
                } else if (exception === 'parsererror') {
                    alert('Requested JSON parse failed.');
                } else if (exception === 'timeout') {
                    alert('Time out error.');
                } else if (exception === 'abort') {
                    alert('Ajax request aborted.');
                } else {
                    alert('Uncaught Error. ' + data.responseText);
                }
            },
            success: (result) => {
                if (result == 'Вы успешно авторизовались!') {
                    window.location.reload();
                } else {
                    alert(result);
                }
            }
        })
    });

    $('body').on('click', '#logout', (event) => {
        event.preventDefault();

        $.ajax({
            url: 'logout.php',
            type: 'POST',
            dataType: 'html',
            error: (data, exception) => {
                if (data.status === 0) {
                    alert('Not connect. Verify Network.');
                } else if (data.status == 404) {
                    alert('Requested page not found (404).');
                } else if (data.status == 500) {
                    alert('Internal Server Error (500).');
                } else if (exception === 'parsererror') {
                    alert('Requested JSON parse failed.');
                } else if (exception === 'timeout') {
                    alert('Time out error.');
                } else if (exception === 'abort') {
                    alert('Ajax request aborted.');
                } else {
                    alert('Uncaught Error. ' + data.responseText);
                }
            },
            success: (result) => {
                window.location.reload();
            }
        })
    });
});