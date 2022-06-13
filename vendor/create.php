<?php

require_once 'connect.php';

$title = $_POST['title'];
$text = $_POST['text'];
$price = $_POST['price'];
$id=$_POST['id_categories'];
$img=$_POST['img'];

mysqli_query($connect,"INSERT INTO `mes_post` (`id`, `title`, `price`, `text`,`id_categories`,`img`) 
VALUES (NULL, '$title', '$price', '$text', '$id','$img')");

header('Location:/www/index11.php');

?>


