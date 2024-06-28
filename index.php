<?php
// Start the session
session_start();

include 'db_connect.php';
$pdo = ConnectDB();

$showProducts = "SELECT * FROM products";
$stmt1 = $pdo->prepare($showProducts);
$stmt1->execute();
$result_products = $stmt1->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="main.js"></script>
</head>
<body>

  <?php include 'header.php' ?>

  <!-- Message -->
  <div class="container mt-5">
    <h2>Welcome to E-Commerce Platform!</h2>
    <p>Make your shopping easy!</p>
  </div>

  <!-- Products -->
  <?php include 'products.php'?>

  <!-- Footer -->
  <footer class="bg-light text-center text-lg-start mt-5">
    <div class="text-center p-3">
      Developed by Sidak Sra 
    </div>
  </footer>

</body>
</html>
