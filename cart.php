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
  <title>Shopping Cart</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script>
    function checkCart() {
      var cartIsEmpty = <?php echo empty($cartProducts) ? 'true' : 'false'; ?>;
      if (cartIsEmpty) {
        alert("Your cart is empty!");
        return false;
      }
      return true;
    }
  </script>
</head>

<body>

  <?php include 'header.php'; ?>

  <!-- Cart Content -->
  <div class="container mt-5">
    <h2>Shopping Cart</h2>
    <div class="row">
      <div class="col-md-8">
        <table class="table">
          <thead>
            <tr>
              <th>Product</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($cartProducts as $cartProduct): ?>
            <tr>
              <td><?php echo $cartProduct['title']; ?></td>
              <td><?php echo $cartProduct['price'];?></td>
              <!-- As Quantity is same, we are not adding products again as per requirements -->
              <td>1</td>
              <td>
                <form action="remove_from_cart.php" method="post">
                  <input type="hidden" name="cart_id" value="<?php echo $cartProduct['cart_id']; ?>">
                  <button type="submit" class="btn btn-danger">Remove</button>
                </form>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Cart Summary</h5>
            <!-- We will display total price of all products in cart here -->
            <p class="card-text">Total Price: <?php echo "$".$totalPrice ?></p>
            <!-- Created form to empty cart on button click -->
            <form action="empty_cart.php" method="post">
              <button type="submit" class="btn btn-danger">Empty Cart</button>
            </form>
            <a href="checkout.php" id="checkout" class="btn btn-primary mt-3" onclick="return checkCart()">Checkout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>