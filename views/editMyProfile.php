<?php
include "./includes/Header.php";
require_once('../controllers/sessions.php');

// Fetch user details and address based on the session
$userModel = new User();
$addressModel = new Address();
$user = $userModel->getUserById(SessionManager::getSessionData('user_id'));
$billingAddress = $addressModel->getAddressById($user['billing_address_id']);
$shippingAddress = $addressModel->getAddressById($user['shipping_address_id']);

// Handle form submission for updating user details
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve updated user information from the form
    $updatedUser = [
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname'],
        'username' => $_POST['username'],
    ];

    // Update user details
    $userModel->updateUserById($user['id'], $updatedUser);

    // Retrieve updated billing address information from the form
    $updatedBillingAddress = [
        'street_name' => $_POST['billing_street_name'],
        'street_nb' => $_POST['billing_street_nb'],
        'city' => $_POST['billing_city'],
        'province' => $_POST['billing_province'],
        'zipcode' => $_POST['billing_zipcode'],
        'country' => $_POST['billing_country'],
    ];

    // Update billing address
    $addressModel->updateAddressById($user['billing_address_id'], $updatedBillingAddress);

    // Retrieve updated shipping address information from the form
    $updatedShippingAddress = [
        'street_name' => $_POST['shipping_street_name'],
        'street_nb' => $_POST['shipping_street_nb'],
        'city' => $_POST['shipping_city'],
        'province' => $_POST['shipping_province'],
        'zipcode' => $_POST['shipping_zipcode'],
        'country' => $_POST['shipping_country'],
    ];

    // Update shipping address
    $addressModel->updateAddressById($user['shipping_address_id'], $updatedShippingAddress);

    // Redirect to MyProfile page after successful update
    header("Location: ./MyProfile.php");
    exit();
}
?>

<main>
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="post">
                                <!--User Information Section-->
                                <h5 class="mb-3" style="text-align: center;">Edit User Information</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="fname" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="fname" name="fname" value="<?= $user['fname']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="lname" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="lname" name="lname" value="<?= $user['lname']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>" required>
                                </div>

                                <!--Billing Address Section-->
                                <h5 class="mb-3" style="text-align: center;">Edit Billing Address</h5>
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

                                <!--Shipping Address Section-->
                                <h5 class="mb-3" style="text-align: center;">Edit Shipping Address</h5>
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

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include './includes/Footer.php'; ?>