<?php
include "./includes/Header.php";
require_once('../controllers/sessions.php');

$userModel = new User();
$addressModel = new Address();
$user_id = SessionManager::getSessionData('user_id');
$user = $userModel->getUserById($user_id);

if ($user) {

    $billingAddress = $addressModel->getAddressById($user['billing_address_id']);
    $shippingAddress = $addressModel->getAddressById($user['shipping_address_id']);
?>

    <main>
        <section style="background-color: #eee;">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3">
                                    <b><?= $user['fname'] . " " . $user['lname']; ?></b>
                                </h5>
                                <p class="text-muted mb-1"><b>ID:</b><?= $user['id']; ?></p>
                                <p class="text-muted mb-1"><b>Role :</b> <?= $user['role_id'] == 1 ? 'Super Admin' : ($user['role_id'] == 2 ? 'Admin' : 'Client'); ?></p>

                                <div class="d-block justify-content-center mb-2">
                                    <a href="editMyProfile.php" class="btn btn-primary">Edit Profile</a>
                                </div>
                                <div class="d-block justify-content-center mb-2">
                                    <a href="changePassword.php" class="btn btn-warning">Change Password</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <!--Personal Information Section-->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h5 class="mb-3" style="text-align: center;">User Information</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"><b>First Name</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= $user['fname']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"><b>Last Name</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= $user['lname']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"><b>Username</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= $user['username']; ?></p>
                                    </div>
                                </div>
                                <hr>
                                <!-- Billing Address Section -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h5 class="mb-3" style="text-align: center;">Billing Address</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"><b>Street Name</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= $billingAddress['street_name']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"><b>Street Number</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= $billingAddress['street_nb']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"><b>City</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= $billingAddress['city']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"><b>Province</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= $billingAddress['province']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"><b>ZipCode</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= $billingAddress['zipcode']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"><b>Country</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= $billingAddress['country']; ?></p>
                                    </div>
                                </div>
                                <hr>
                                <!--Shipping Address Section-->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h5 class="mb-3" style="text-align: center;">Shipping Address</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"><b>Street Name</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= $shippingAddress['street_name']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"><b>Street Number</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= $shippingAddress['street_nb']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"><b>City</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= $shippingAddress['city']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"><b>Province</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= $shippingAddress['province']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"><b>ZipCode</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= $shippingAddress['zipcode']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"><b>Country</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= $shippingAddress['country']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php
} else { ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-center">USER NOT FOUND!</h1>
            </div>
        </div>
    </div>
<?php
}
include './includes/Footer.php';
?>