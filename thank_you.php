<?php

// Start the session
session_start();

// Connecting with database 
include 'db_connect.php';
$pdo = ConnectDB();

$showOrder = "SELECT * FROM orders WHERE ";
$stmtOrderShow = $pdo->prepare($showOrder);
$stmtOrderShow->execute();
$resultDetails = $stmtOrderShow->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thank You</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

  <!-- Thank You Message -->
  <div class="container mt-5">
    <div class="jumbotron">
      <h1 class="display-4">Thank You!</h1>
      <p class="lead">Your order has been successfully placed.</p>
      <hr class="my-4">
      <p>Order details:</p>
      
      <ul>
        <li>Name: <?php echo $resultDetails['name']?></li>
        <li>Email: <?php echo $resultDetails['email']?></li>
        <li>Phone: <?php echo $resultDetails['phone']?></li>
        <li>Address: <?php echo $resultDetails['address']?></li>
        <!-- Additional order details can be displayed here -->
      </ul>

      <a class="btn btn-primary btn-lg" href="index.php" role="button">Continue Shopping</a>
    </div>
  </div>

</body>
</html>