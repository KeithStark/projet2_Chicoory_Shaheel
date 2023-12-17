<?php
include "./includes/Header.php";
require_once('../controllers/sessions.php');
require_once('../models/User.php');

$userModel = new User();
$user = $userModel->getUserById(SessionManager::getSessionData('user_id'));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($newPassword === $confirmPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        $userModel->updatePassword($user['id'], $hashedPassword);

        header("Location: ./MyProfile.php");
        exit();
    } else {
        $errorMessage = "Passwords do not match.";
    }
}
?>

<main>
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-3" style="text-align: center;">Change Password</h5>
                            <?php if (isset($errorMessage)) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $errorMessage; ?>
                                </div>
                            <?php endif; ?>
                            <form method="post">
                                <div class="mb-3">
                                    <label for="new_password" class="form-label">New Password</label>
                                    <input type="password" name="new_password" class="form-control" id="new_password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="confirm_password" class="form-label">Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control" id="confirm_password" required>
                                </div>
                                <div class="container" style="text-align: center;">
                                    <button type="submit" name="change_password" class="btn btn-primary">Change Password</button>
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