<?php

    require_once 'vendor/connect.php';

    $product_id = $_GET['id'];

    $product = mysqli_query($connect, "SELECT * FROM `mes_post` WHERE `id` = '$product_id'");

    $product = mysqli_fetch_assoc($product);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>tanin sait</title>
</head>
 <body>
 <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-body border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">Bulletin Board</h5>
        <nav class="my-2 my-md-0 me-md-3">
        <a class="p-2 text-dark" href="lk.php"> Личный кабинет</a> 
        </nav>
        <a class="btn btn-outline-primary" href="index11.php">Главная</a>
        <a class="btn btn-outline-primary" href="vendor/logout.php">Выйти</a>
      </div>
      <hr>
      

<div class="container mt-5">
    <h3>редактировать данные о товаре</h3>
    <form action="vendor/update.php" method="post">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <p>название</p>
        <input type="text" name="title" value="<?= $product['title'] ?>">
        <p>описание</p>
        <textarea name="text"><?= $product['text'] ?></textarea>

        <p>загрузить картинку</p>
        <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="file" name="img">
        <input type="submit" name="upload" value="Загрузить">
        <br><br>
        
        <?php
        if(isset($_POST['upload'])){
	$img_type = substr($_FILES['img']['type'], 0, 5);
	$img_size = 2*1024*1024;
	if(!empty($_FILES['img']['tmp_name']) and $img_type === 'image' and $_FILES['img']['size'] <= $img_size){ 
	$img = addslashes(file_get_contents($_FILES['img']['tmp_name']));
	$connect->query("INSERT INTO `mes_post`(img) VALUES ('$img')");
	}
}
?>

<?php
	
	$query = $connect->query("SELECT * FROM `mes_post` ORDER BY `id` DESC");
	while($row = $query->fetch_assoc()){
		$show_img = base64_encode($row['img']);?>
		<img src="data:image/jpeg;base64, <?php echo $show_img ?>" alt="">
	<?php } ?>
       

        <p>категория товара
        1-Одежда
        2-дом и дача
        3-бытовая техника
        4-животные
        5-Гаджеты
        6-услуги
        </p>
        <input type="number" name="id_categories" value="<?= $product['id_categories'] ?>">
        <p>цена</p>
        <input type="number" name="price" value="<?= $product['price'] ?>"> <br> <br>
        <button type="submit">Update</button>
     
    </form>
      </div>
      <?php require "blocks/footer.php" ?>
</body>
</html>

