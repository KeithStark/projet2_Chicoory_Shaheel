<?php
include "./includes/Header.php";

$cartController = new CartController();
$cartItems = $cartController->getCartItems();
?>

<main>
    <section class="cart-container" style="margin-top: 2%;">
        <center>
            <h3 class="mb-3">My Cart</h3>
        </center>
        <div class="container">
            <hr>

            <?php if (empty($cartItems)) { ?>
                <div class="alert alert-info" role="alert">
                    Your cart is empty.
                </div>
            <?php } else { ?>
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <?php foreach ($cartItems as $item) { ?>
                        <div class="col">
                            <div class="card">
                                <img src="<?= $item['url_img'] ?>" class="card-img-top" alt="<?= $item['name'] ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $item['name'] ?></h5>
                                    <p class="card-text">Price: $<?= $item['price'] ?></p>
                                    <p class="card-text">Quantity: <?= $item['quantity'] ?></p>
                                    <p class="card-text">Total: $<?= $item['price'] * $item['quantity'] ?></p>
                                    <a href="#" class="btn btn-danger">Remove</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </section>
</main>

</body>

</html>