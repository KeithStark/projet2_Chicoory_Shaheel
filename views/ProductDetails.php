<?php
include "./includes/Header.php";
require_once "../controllers/CartController.php";

$cartController = new CartController();

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $productModel = new Product();
    $product = $productModel->getProductById($productId);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addToCart'])) {
        $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
        $cartController->addToCart($productId, $quantity);
        echo "<script>alert('Product has been added to the cart!');</script>";
    }
} else {
    header("Location: products.php");
    exit();
}
?>

<main>
    <!-- Product Details Section -->
    <section class="product-details-container" style="margin-top: 5%;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="<?= $product['url_img'] ?>" class="img-fluid" alt="<?= $product['name'] ?>">
                </div>
                <div class="col-md-6">
                    <h3><?= $product['name'] ?></h3>
                    <p><strong>Price:</strong> $<?= $product['price'] ?></p>
                    <p><strong>Description:</strong> <?= $product['description'] ?></p>

                    <!-- Add to Cart Button -->
                    <form action="" method="post">
                        <input type="hidden" name="productId" value="<?= $product['id'] ?>">
                        <label for="quantity">Quantity:</label>
                        <input type="number" name="quantity" id="quantity" value="1" min="1" max="<?php echo $product['qtty'] ?>">
                        <input type="submit" name="addToCart" value="Add to Cart" class="btn btn-success">
                    </form>

                </div>
            </div>
        </div>
    </section>
</main>
</body>

</html>