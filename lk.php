<?php

    session_start();
    require_once 'vendor/connect.php';
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
      <style>
    th, td {
        padding: 10px;
    }

    th {
        background: #606060;
        color: #fff;
    }

    td {
        background: #b5b5b5;
    }
</style>

    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>text</th>
            <th>Price</th>
        </tr>

      <?php
       $products = mysqli_query($connect, "SELECT * FROM `mes_post`");

       $products = mysqli_fetch_all($products);


       foreach ($products as $product) {
           ?>
               <tr>
                   <td><?= $product[0] ?></td>
                   <td><?= $product[1] ?></td>
                   <td><?= $product[2] ?></td>
                   <td><?= $product[7] ?></td>
                   <td><a href="update1.php?id=<?= $product[0] ?>">Update</a></td>
                   <td><a style="color: red;" href="vendor/delete.php?id=<?= $product[0] ?>">Delete</a></td>
               </tr>
           <?php
       }
   ?>
</table>


      <div class="container mt-5">
<h3>добавьте свой товар</h3>
    <form action="vendor/create.php" method="post">
        <p>название</p>
        <input type="text" name="title">
        <p>описание</p>
        <textarea name="text"></textarea>

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
        <input type="number" name="id_categories">
        <p>цена</p>
        <input type="number" name="price"> <br> <br>
        <button type="submit">Add new product</button>
    </form>
      </div>
      <?php require "blocks/footer.php" ?>
</body>
</html>
