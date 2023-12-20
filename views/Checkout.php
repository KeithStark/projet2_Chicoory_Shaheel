<?php
include "./includes/Header.php";
require_once "../controllers/CartController.php";
require_once "../controllers/orderController.php";
require_once "../controllers/discountController.php";
require_once "../models/User.php";
require_once "../models/Address.php";

$cartController = new CartController();
$cartItems = $cartController->getCartItems();

$userModel = new User();
$addressModel = new Address();

$discountController = new DiscountController();
$discountApplied = false;

$user_id = SessionManager::getSessionData('user_id');
$user = $userModel->getUserById($user_id);

$billingAddress = $addressModel->getAddressById($user['billing_address_id']);
$shippingAddress = $addressModel->getAddressById($user['shipping_address_id']);

$total = array_sum(array_map(function ($item) {
    return $item['price'] * $item['quantity'];
}, $cartItems));

if (isset($_POST['payer'])) {
    $orderController = new orderController();
    $result = $orderController->createOrder($user_id, $cartItems);

    if (is_numeric($result)) {
        $cartController->emptyCart();
        header("Location: ./success.php");
    } else {
        echo "<p>Error: " . $result . "</p>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['applyDiscount'])) {
    $discountCode = $_POST['discountCode'];
    $total = $discountController->applyDiscount($discountCode, $total);
    $discountApplied = true;
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
                            <h5 class="mb-3" style="text-align: center;"><b>Edit Billing Address</b></h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="billing_street_name" class="form-label">Street Name</label>
                                        <input type="text" class="form-control" id="billing_street_name" name="billing_street_name" value="<?= $billingAddress['street_name']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="billing_street_nb" class="form-label">Street Number</label>
                                        <input type="text" class="form-control" id="billing_street_nb" name="billing_street_nb" value="<?= $billingAddress['street_nb']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="billing_city" class="form-label">City</label>
                                        <input type="text" class="form-control" id="billing_city" name="billing_city" value="<?= $billingAddress['city']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="billing_province" class="form-label">Province</label>
                                        <input type="text" class="form-control" id="billing_province" name="billing_province" value="<?= $billingAddress['province']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="billing_zipcode" class="form-label">Postal Code</label>
                                        <input type="text" class="form-control" id="billing_zipcode" name="billing_zipcode" value="<?= $billingAddress['zipcode']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="billing_country" class="form-label">Country</label>
                                        <input type="text" class="form-control" id="billing_country" name="billing_country" value="<?= $billingAddress['country']; ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-3" style="text-align: center;"><b>Edit Shipping Address</b></h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="shipping_street_name" class="form-label">Street Name</label>
                                        <input type="text" class="form-control" id="shipping_street_name" name="shipping_street_name" value="<?= $shippingAddress['street_name']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="shipping_street_nb" class="form-label">Street Number</label>
                                        <input type="text" class="form-control" id="shipping_street_nb" name="shipping_street_nb" value="<?= $shippingAddress['street_nb']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="shipping_city" class="form-label">City</label>
                                        <input type="text" class="form-control" id="shipping_city" name="shipping_city" value="<?= $shippingAddress['city']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="shipping_province" class="form-label">Province</label>
                                        <input type="text" class="form-control" id="shipping_province" name="shipping_province" value="<?= $shippingAddress['province']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="shipping_zipcode" class="form-label">Postal Code</label>
                                        <input type="text" class="form-control" id="shipping_zipcode" name="shipping_zipcode" value="<?= $shippingAddress['zipcode']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="shipping_country" class="form-label">Country</label>
                                        <input type="text" class="form-control" id="shipping_country" name="shipping_country" value="<?= $shippingAddress['country']; ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><b>Order Summary</b></h5>
                            <!-- Add the discount code field here -->
                            <div class="mb-3">
                                <form action="Checkout.php" method="post">
                                    <label for="discountCode" class="form-label" style="color: red;">Discount Code</label>
                                    <div class="row">
                                        <div class="col-sm-8 col-md-6 col-lg-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="discountCode" name="discountCode" placeholder="Enter code (optional)">
                                                <button type="submit" name="applyDiscount" class="btn btn-primary" style="margin-left: 5%;">Apply</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if ($discountApplied) : ?>
                                        <small class="text-success" style="color: blue;"><b>Discount applied!</b></small>
                                    <?php endif; ?>
                                </form>
                            </div>
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