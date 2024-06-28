<?php

$countProducts = "SELECT SUM(quantity) AS count FROM cart";
$stmt2 = $pdo->prepare($countProducts);
$stmt2->execute();
$result_countProducts = $stmt2->fetch();


?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">My Shop</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">Cart <span id="cart-count"><?php echo $result_countProducts['count']==0?0:$result_countProducts['count']; ?></span></a>
        </li>
      </ul>
    </div>
  </nav>