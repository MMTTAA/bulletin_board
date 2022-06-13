<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="container mt-5">
<div class ="d-flex flex-wrap">
<?php


$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']
                === 'on' ? "https" : "http") . "://" .
          $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?" . $_SERVER["QUERY_STRING"];



require_once 'vendor/connect.php';

parse_str($_SERVER["QUERY_STRING"], $cat);
$category_id = $cat["category"];

if ($category_id > 0) {
  $sql = "SELECT * FROM `mes_post` WHERE `id_categories` = ";
  $sql .= $category_id;
} else {
  $sql = "SELECT * FROM `mes_post`";
}


$result = $connect->query($sql);



if ($result!== false && $result->num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {
    
    echo 

  '
 
      <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">'.$row["title"].'</h4>
          </div>
          <div class="card-body">
          <img src="img/'.$row["img"].'" class="img-thumbnail">
            <ul class="list-unstyled mt-3 mb-4">
            <li style="vertical-align: inherit;">описание товара:  '.$row["text"].'</li>
            <li style="vertical-align: inherit;">цена:  '.$row["price"].'</li>
            </ul>
            <button type="button" class="w-100 btn btn-lg btn-outline-primary">заказать</button>
            </button>
          </div>
        </div>

    
    ';
  
    
}
}
?>


