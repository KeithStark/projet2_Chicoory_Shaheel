<?php
include "./includes/Header.php";
require_once "../controllers/CartController.php";

$cartController = new CartController();
$cartItems = $cartController->getCartItems();

if (isset($_POST['emptyCart'])) {
    $cartController->emptyCart();
    header("Location: MyCart.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateCart'])) {
    foreach ($_POST['quantity'] as $productId => $quantity) {
        $quantity = max(1, (int)$quantity);
        $cartController->modifyCart($productId, $quantity);
    }
    header("Location: MyCart.php");
    exit();
}

$total = array_sum(array_map(function ($item) {
    return $item['price'] * $item['quantity'];
}, $cartItems));
?>

<main>
    <section class="cart-container" style="margin-top: 2%;">
        <center>
            <h3 class="mb-3">My Cart</h3>
        </center>
        <div class="container">
            <form method="post">
                <?php if (!empty($cartItems)) { ?>
                    <button type="submit" name="emptyCart" class="btn btn-danger mb-3">Empty Cart</button>
                    <button type="submit" name="updateCart" class="btn btn-primary mb-3">Update Cart</button>
                    <a href="Checkout.php" class="btn btn-success mb-3">Proceed to checkout</a>
                    <span class="total" style="margin-left: 50%;"><b>Total: $<?= $total ?></b></span>
                    <hr>
                <?php } ?>

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
                                        <label for="quantity<?= $item['id'] ?>">Quantity:</label>
                                        <input type="number" name="quantity[<?= $item['id'] ?>]" id="quantity<?= $item['id'] ?>" value="<?= $item['quantity'] ?>" min="1" max="<?= $item['qtty'] ?>">
                                        <p class="card-text">Total: $<?= $item['price'] * $item['quantity'] ?></p>
                                        <a href="#" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </form>
        </div>
    </section>
</main>

</body>

</html>