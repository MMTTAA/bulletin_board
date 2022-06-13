<?php

    $connect = mysqli_connect('localhost', 'root', '', 'registr');

    if (!$connect) {
        die('Error connect to DataBase');
    }
    