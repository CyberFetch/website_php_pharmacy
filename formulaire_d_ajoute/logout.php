<?php
require_once('../connexion.php');



if (isset($_POST['logout'])) {
    session_destroy(); 
    header('Location: login.php');
} else {
    if (isset($_POST['login'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $res = $conn->query("SELECT * from user where name='$name'");
        $table = $res->fetchAll(PDO::FETCH_OBJ);
        if (count($table) === 0) {
            header('Location: index.php');
        } elseif (!password_verify($password, $table[0]->password))  {
            header('Location: index.php');
        } else {
            $_SESSION['name'] = $table[0]->id;
            $_SESSION['email'] = $table[0]->username;
            $_SESSION['password'] = $table[0]->role;
            header('Location: home.php');
        }
    }
}