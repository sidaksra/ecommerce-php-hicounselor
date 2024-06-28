<?php 

include 'db_connect.php';
$pdo = ConnectDB();

//Checking if cart_id is set and not empty 
if(isset($_POST['cart_id']) && !empty($_POST['cart_id'])){
    $productId = (int)$_POST['cart_id'];

    $queryRemove = "DELETE FROM cart WHERE product_id = $productId";
    if($pdo->query($queryRemove)){
        header("Location: cart.php");
        exit();
    }
    else{
        http_response_code(500);
    }
}else{
    http_response_code(400);
}


?>