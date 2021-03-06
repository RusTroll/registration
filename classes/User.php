<?php


class User
{
    private function checkEmail($email, $pdo)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $query = $pdo -> prepare($sql);
        $query -> execute(['email' => $email]);
        $col = $query -> fetchColumn();

        if ($col != '') {
            return false;
        } else {
            return true;
        }
    }

    private function checkLogin($login, $pdo)
    {
        $sql = "SELECT * FROM users WHERE login = :login";
        $query = $pdo -> prepare($sql);
        $query -> execute(['login' => $login]);
        $col = $query -> fetchColumn();

        if ($col != '') {
            return false;
        } else {
            return true;
        }
    }

    public function addUser($login, $email, $password, $pdo)
    {
        if ($this -> checkEmail($email, $pdo) && $this -> checkLogin($login, $pdo))
        {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = 'INSERT INTO users(login, email, password) VALUES(:login, :email, :password)';
            $query = $pdo -> prepare($sql);
            $query -> execute(['login' => $login, 'email' => $email, 'password' => $password]);
            echo successSignup;
            exit();
        } elseif (!($this -> checkEmail($email, $pdo))) {
            echo existsEmail;
            exit();
        } elseif (!($this -> checkLogin($login, $pdo))) {
            echo existsLogin;
            exit();
        }
    }

    public function logUser($email, $password, $pdo)
    {
        $sql = 'SELECT * FROM users WHERE email = :email';
        $query = $pdo -> prepare($sql);
        $query -> execute(['email' => $email]);

        while ($row = $query -> fetch(PDO::FETCH_OBJ)) {
            if (password_verify($password, $row -> password)) {
                $_SESSION['auth'] = true;
                $_SESSION['login'] = $row -> login;
                echo successSignin;
                exit();
            } else {
                echo passwordNotValid;
                exit();
            }
        }
        echo emailNotValid;
        exit();
    }
}