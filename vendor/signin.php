<?php

    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = $_POST['password'];
    $password=md5($password."gjkbyfnegfz");
    
    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
     If (mysqli_num_rows($check_user)>0) 
     {
        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "name" => $user['name'],
            
        ];

        echo $_SESSION['user'];
        header('Location:/www/index11.php');
     }
     else
     {
         echo 'Неверный логин или пароль';
         
     }

?>