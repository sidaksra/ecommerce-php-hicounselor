<?php

// Connecting with the database 
include 'db_connect.php';
$pdo = ConnectDB();

// Fetch associated products
$queryCart = "SELECT cart.product_id as cart_id, products.title, products.price FROM cart JOIN products ON cart.product_id=products.id";
$stmtCart = $pdo->query($queryCart);
$cartProducts = $stmtCart->fetchAll();

// Variables 
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$totalPrice = $_POST['total_price'];
$current_time = date('Y-m-d H:i:s');


$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
$totalPrice = filter_var($_POST['total_price'], FILTER_VALIDATE_FLOAT);

if ($name === false || $email === false || $phone === false || $address === false || $totalPrice === false) {
    die("Invalid input detected. Please check your data.");
}

// Prepare the SQL statement with placeholders
$queryInsert_Order = $pdo->prepare("INSERT INTO orders (name, email, phone, address, total_price, created_at) VALUES (:name, :email, :phone, :address, :total_price, :created_at)");

// Bind the parameters
$queryInsert_Order->bindParam(':name', $name);
$queryInsert_Order->bindParam(':email', $email);
$queryInsert_Order->bindParam(':phone', $phone);
$queryInsert_Order->bindParam(':address', $address);
$queryInsert_Order->bindParam(':total_price', $totalPrice);
$queryInsert_Order->bindParam(':created_at', $current_time);

// Execute the statement
if ($queryInsert_Order->execute()) {
    // Redirecting to Thank You page 
    header("Location: thank_you.php");
    exit();
} else {
    http_response_code(500);
}

?>
