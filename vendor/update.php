<?php

require_once 'connect.php';

$product_id = $_POST['id'];
$title = $_POST['title'];
$text = $_POST['text'];
$price = $_POST['price'];
$id=$_POST['id_categories'];
$img=$_POST['img'];


mysqli_query($connect, "UPDATE `mes_post` SET `title` = '$title', `price` = '$price', 
`text` = '$text',`id_categories` = '$id',`img` = '$img'
WHERE `mes_post`.`id` = '$product_id'");


header('Location: /www/lk.php');