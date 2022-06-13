<?php

    session_start();
    require_once 'connect.php';

    $name = $_POST['name'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    
    if(mb_strlen($login) < 5 || mb_strlen($login) > 90)
    {
    echo "Недопустимая длина логина";
    exit();
    }
    else if(mb_strlen($name) < 2 || mb_strlen($name) > 50)
    {
    echo "Недопустимая длина имени";
    exit();
    }
    else if(mb_strlen($password) < 2 || mb_strlen($password) > 7)
    {
    echo "Недопустимая длина пароля";
    exit();
    }
    
    $password=md5($password."gjkbyfnegfz");
    
    mysqli_query($connect,"INSERT INTO `users` (`login`, `password`, `name`)
    VALUES ('$login', '$password', '$name')");
    
    header('Location:/www/index11.php' );


?>
