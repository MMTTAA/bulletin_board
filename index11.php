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
     
     <h3>Каждый найдет то что искал.</h3>
     <h4 class="mb-5">Здесь ваши объявления увидят миллионы!</h4> 
     <h5 style="position:relative;text-align:center" class="mb-5">Каталог.</h5> 
    <div class ="d-flex flex-wrap">
    
    <?php 

require_once 'vendor/connect.php';
//$categories = mysqli_query($connect, "SELECT * FROM `mes_caregories`");

$sql = "SELECT * FROM `mes_caregories`";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {
    //echo "id: " . $row["id"]. " - Name: " . $row["name"].  "<br>";
   
    echo 
    '
      
      <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">'.$row["name"].'</h4>
          </div>
          <div class="card-body">
          <img src="img/'.$row["img"].'" class="img-thumbnail">
            <ul class="list-unstyled mt-3 mb-4">
            </ul>
            <button type="button" class="w-100 btn btn-lg btn-outline-primary"> 
              <a href="products.php?category='.$row["idc"].'">посмотреть</a>
            </button>
          </div>
        </div>
    ';

  }
} else {
  echo "0 results";
}
$connect->close();
    ?>
     

    </div>
    
    <?php require "blocks/footer.php" ?>
    
 </body>
</html>