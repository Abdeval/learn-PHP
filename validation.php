<?php
    require 'config.php';

    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if(empty($login) || empty($password)) {
        header('Location: login.php?error=1');
        exit();
    }

    if($login !== USERLOGIN || $password !== USERPASS) {
        header('Location: login.php?error=2');
        exit();
    }

    if (isset($_GET['afaire']) && $_GET['afaire'] == 'deconnexion') {
        session_start();
        session_destroy();
        header('Location: login.php?error=3');
        exit();
    }

    header('Location: home.php');
    exit();

?>