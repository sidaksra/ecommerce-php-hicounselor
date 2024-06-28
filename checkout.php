<?php

// Connecting with database 
include 'db_connect.php';
$pdo = ConnectDB();

//fetch products in the cart
$quertCart = "SELECT cart.product_id as cart_id, products.title, products.price FROM cart JOIN products ON cart.product_id=products.id";
$stmtCart = $pdo->query($quertCart);
$cartProducts = $stmtCart->fetchAll();

//Calculate Total Price
$totalPrice = 0;
foreach($cartProducts as $cartProduct){
  $totalPrice += $cartProduct['price'];
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

  <!-- including the header of the page  -->
  <?php include 'header.php'; ?>

  <!-- Checkout Form -->
  <div class="container mt-5">
    <h2>Checkout</h2>
    <!-- Cart Details -->
    <div class="mb-3">
      <h4>Cart Details</h4>
      <table class="table">
        <thead>
          <tr>
            <th>Product</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($cartProducts as $cartProduct): ?>
          <tr>
            <td><?php echo $cartProduct['title']; ?></td>
            <td><?php echo $cartProduct['price'];?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
      <p>Total Price: <?php echo "$".$totalPrice ?></p>
    </div>
    <!-- Checkout Form -->
    <form action="order_place.php" method="post">
    <input type="hidden" name="total_price" value="<?php echo $totalPrice?>"
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>

        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
  
        <label for="phone">Phone</label>
        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
    
        <label for="address">Address</label>
        <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your address"
          required></textarea>
    
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="cash_on_delivery" name="cash_on_delivery">
        <label class="form-check-label" for="cash_on_delivery">Cash on Delivery</label>
      </div>
      <button type="submit" class="btn btn-primary">Place Order</button>
    </div>
  </form>

  <!-- Footer -->
  <footer class="bg-light text-center text-lg-start mt-5">
    <div class="text-center p-3">
      Developed by Sidak
    </div>
  </footer>

</body>

</html>