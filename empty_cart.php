<?php 

include 'db_connect.php';
$pdo = ConnectDB();

//Empty the cart by deleting the all elements
$queryEmptyCart = "DELETE FROM cart";
if($pdo->query($queryEmptyCart)){
    header("Location: cart.php");
    exit();
}
else{
    http_response_code(500);
}
?>