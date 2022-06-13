<?php

require_once 'connect.php';

$product_id = $_GET['id'];

mysqli_query($connect, "DELETE FROM `mes_post` WHERE `mes_post`.`id` = '$product_id'");

header('Location: /www/lk.php');