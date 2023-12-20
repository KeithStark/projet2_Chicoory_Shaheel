<?php
include "./includes/Header.php";
require_once "../controllers/CartController.php";
require_once "../controllers/orderController.php";
require_once "../models/User.php";
require_once "../models/Address.php";

$cartController = new CartController();
$cartItems = $cartController->getCartItems();

$userModel = new User();
$addressModel = new Address();

$user_id = SessionManager::getSessionData('user_id');
$user = $userModel->getUserById($user_id);

$billingAddress = $addressModel->getAddressById($user['billing_address_id']);
$shippingAddress = $addressModel->getAddressById($user['shipping_address_id']);

$total = array_sum(array_map(function ($item) {
    return $item['price'] * $item['quantity'];
}, $cartItems));

if (isset($_POST['payer'])) {
    $orderController = new orderController();
    $orderController->createOrder($user_id, $cartItems);
}
?>

<main>
    <section class="checkout-container" style="margin-top: 2%;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><b>User Information</b></h5>
                            <br>
                            <p><b>First Name :</b> <?= $user['fname']; ?></p>
                            <p><b>Last Name :</b> <?= $user['lname']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><b>Billing Address</b></h5>
                            <br>
                            <p><?= $billingAddress['street_name'] ?>, <?= $billingAddress['street_nb'] ?></p>
                            <p><?= $billingAddress['city'] ?>, <?= $billingAddress['province'] ?></p>
                            <p><?= $billingAddress['zipcode'] ?></p>
                            <p><?= $billingAddress['country'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><b>Shipping Address</b></h5>
                            <br>
                            <p><?= $shippingAddress['street_name'] ?>, <?= $shippingAddress['street_nb'] ?></p>
                            <p><?= $shippingAddress['city'] ?>, <?= $shippingAddress['province'] ?></p>
                            <p><?= $shippingAddress['zipcode'] ?></p>
                            <p><?= $shippingAddress['country'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><b>Order Summary</b></h5>
                            <br>
                            <ul class="list-group">
                                <?php foreach ($cartItems as $item) { ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center"><img src="<?= $item['url_img'] ?>" alt="<?= $item['name'] ?>" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                        <?= $item['name'] ?>
                                        <span class="badge bg-primary rounded-pill">$<?= $item['price'] * $item['quantity'] ?></span>
                                    </li>
                                <?php } ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <b>Total :</b>
                                    <span class="badge bg-primary rounded-pill">$<?= $total ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <center>
                        <form action="" method="post">
                            <button class="btn btn-info" name="payer" type="submit"><i class="bi bi-coin"></i> <b>Pay Now</b></button><br><br>
                            <div id="paypal-payment-button" name="payer" style="width: 300px;"></div>
                        </form>
                    </center>
                </div>
            </div>
        </div>
    </section>
</main>
<script src="https://www.paypal.com/sdk/js?client-id=AeNR5aCDiC3uGG8jDi6KBG_RgBSxh1GcIQ80ANEo_cE-adwN62-Zfaym-lsaJkk0ssHuc1XLgkl2uEU-&currency=CAD"></script>
<script src="../public/paypal.js"></script>

<?php include './includes/Footer.php'; ?>