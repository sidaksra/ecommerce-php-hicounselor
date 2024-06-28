<?php

include 'db_connect.php';
$pdo = ConnectDB();

if(isset($_POST['product_id']) && isset ($_POST['quantity']) && !empty($_POST['product_id']) && !empty($_POST['quantity'])){
    $productID = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];

    //Checking if products already Exists in the cart or not

    $queryCheck = "SELECT product_id, quantity FROM cart WHERE product_id = $productID";
    $resultCheck = $pdo->query($queryCheck);
    $row = $resultCheck->fetch();

    //If product not Exists in the cart, We will add 
    if(!$row){
        $queryInsert = "INSERT INTO cart(product_id, quantity) VALUES ($productID, $quantity)";

        if($pdo->query($queryInsert)){
            header("Location: cart.php");
            exit();
        }
        else{
            http_response_code(500);
        }
    }
    // else we will show alert that product already exists 
    else{
        echo "<script>
        alert('Product already in the cart');
        window.location.href='index.php;
        </script>";
    }
}
else{
    http_response_code(400);
    echo"invalid Request!";
}



?>