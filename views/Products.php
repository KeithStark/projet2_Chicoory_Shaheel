<?php include "./includes/Header.php"; ?>

<main>
    <!-- Products Section -->
    <section class="product-container" style="margin-top: 2%;">
        <div class="container">
            <div class="row">
                <?php
                $productModel = new Product();
                $products = $productModel->getAllProducts();

                foreach ($products as $product) :
                ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="<?= $product['url_img'] ?>" class="card-img-top" alt="<?= $product['name'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $product['name'] ?></h5>
                                <p class="card-text">Price: $<?= $product['price'] ?></p>
                                <p class="card-text">Quantity: <?= $product['qtty'] ?></p>
                                <p class="card-text"><?= $product['description'] ?></p>
                                <center><a href="ProductDetails.php?id=<?= $product['id'] ?>" class="btn btn-warning">View Product</a></center>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php include "./includes/Footer.php"; ?>