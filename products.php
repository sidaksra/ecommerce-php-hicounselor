<?php

$showProducts = "SELECT * FROM products ORDER BY id ASC";
$stmt1 = $pdo->prepare($showProducts);
$stmt1->execute();
$result_products = $stmt1->fetchAll();

?>

  <!-- Products -->
  <div class="container mt-5">
    <h2>Products</h2>
    <div class="row">
    <!-- Loop through products and display -->
    <?php foreach($result_products as $product):?>
      <?php 
        //Checking if product is already in the cart or not
        $productId = $product['id'];
        $queryCheck = "SELECT product_id from cart WHERE product_id=$productId";
        $result = $pdo->query($queryCheck);
        $row = $result -> fetch(PDO::FETCH_ASSOC);
      ?>  

      <div class="col-md-4 mb-3">
        
        <div class="card">
          <img src="<?php echo $product['image'] ?>" class="card-img-top" alt="<?php echo $product['title'] ?>">
          <div class="card-body">
            <h5 class="card-title"><?php echo $product['title'] ?></h5>
            <p class="card-text"><?php echo $product['description'] ?></p>
            <?php if($row): ?>
              <!-- Product Already in the Cart  -->
              <button id="alreadyBtn" class="btn btn-primary" >Already in the Cart</button>
            <?php else:?>
            <form action="add_to_cart.php" method="post" class="add-to-cart-form">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <input type="hidden" name="quantity" value="1" min="1">
                <button type="submit" id="add_btn" class="btn btn-primary" name="add_to_cart">Add to Cart</button>
            </form>
            <?php endif; ?>
            </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

