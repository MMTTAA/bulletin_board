<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>форма регистрации</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/registr.css">
</head>
 <body>
     <div class="conreiner mt-4">
     <div class="row">
        <div class = "col"> 
            <h1 style="position:relative;text-align:center" 
            class="mb-5"> Форма регистрации</h1> 
         <form action="vendor/signup.php" method="post">

            <input type="text" class="form-control" name="login"
            id="login" placeholder="Введите логин"><br>
            
            <input type="text" class="form-control" name="name"
            id="name" placeholder="Введите имя"><br>

            <input type="password" class="form-control" name="password"
            id="password" placeholder="Введите пароль"><br>

            <button class="btn btn-success" type="submit">Зарегистрироваться</button>
            <p> у вас есть акаунт? - <a href ="avtoriz.php"> Авторизуйтесь </a>
         </p>
         </form>
        </div>
     </div>
     </div>
     <?php require "blocks/footer.php" ?>
 </body>
</html>