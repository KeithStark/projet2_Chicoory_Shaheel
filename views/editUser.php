<?php
include "./includes/Header.php";
require_once('../controllers/sessions.php');

// Ensure that the user ID is provided in the URL
if (!isset($_GET['id'])) {
    header("Location: ./manageUsers.php");
    exit();
}

// Fetch user details based on the provided user ID
$userModel = new User();
$addressModel = new Address();
$user = $userModel->getUserById($_GET['id']);

// Check if the user exists
if (!$user) {
    header("Location: ./manageUsers.php");
    exit();
}

// Handle form submission for updating user details
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve updated user information from the form
    $updatedUser = [
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname'],
        'username' => $_POST['username'],
    ];

    $userModel->updateUserById($user['id'], $updatedUser);

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
                                <div class="mb-3">
                                    <label for="username" class="form-label">Role_ id</label>
                                    <input type="text" class="form-control" id="role" name="role" value="<?= $user['role_id']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label" style="color: Navy;"><b>* Roles: 1 -> Super Admin, 2 -> Admin, 3 -> Client</b></label>
                                </div>
                                <div class="text-center">
                                    <a href="./ManageUsers.php" class="btn btn-secondary">Cancel</a>
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