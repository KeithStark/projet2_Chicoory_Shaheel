<?php
include "./includes/Header.php";
include "../models/Product.php";


if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $productModel = new Product();
    $product = $productModel->getProductById($productId);
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
                    <p><strong>Quantity:</strong> <?= $product['qtty'] ?></p>
                    <p><strong>Description:</strong> <?= $product['description'] ?></p>

                    <!-- Add to Cart Button -->
                    <form action="addToCart.php" method="post">
                        <input type="hidden" name="productId" value="<?= $product['id'] ?>">
                        <input type="submit" name="addToCart" value="Add to Cart" class="btn btn-success">
                    </form>

                </div>
            </div>
        </div>
    </section>
</main>
</body>

</html>