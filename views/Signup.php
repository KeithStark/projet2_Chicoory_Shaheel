<?php

require_once('../controllers/authController.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $authController = new AuthController();
    $result = $authController->signup($_POST);

    if ($result['success']) {
        header("Location: ./Home.php");
        exit();
    } else {
        $errorMessage = $result['message'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Sign Up</title>
    <style>

    </style>
</head>

<body>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="login-container">

                        <center>
                            <h3 class="mb-3" style="margin-top: 2%;"><b>SIGN UP</b></h3>
                        </center>

                        <form method="post">
                            <!-- User Information -->
                            <div class="container-box">
                                <h4 style="text-align: center; padding:10px;"><b>User Information</b></h4>
                                <hr>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="fname" class="form-label"><b>First Name</b></label>
                                            <input type="text" class="form-control" id="fname" name="fname" required placeholder="Enter your first name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="lname" class="form-label"><b>Last Name</b></label>
                                            <input type="text" class="form-control" id="lname" name="lname" required placeholder="Enter your last name">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label"><b>Username</b></label>
                                    <input type="text" class="form-control" id="username" name="username" required placeholder="Enter a username">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label"><b>Password</b></label>
                                    <input type="password" class="form-control" id="password" name="password" required placeholder="Enter a password">
                                </div>
                            </div>

                            <?php if (isset($errorMessage)) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $errorMessage; ?>
                                </div>
                            <?php endif; ?>

                            <div class="container" style="text-align: center;">
                                <button type="submit" name="register" class="btn btn-warning btn-md">SIGN UP</button>
                                <div class="mt-3">
                                    <p>Already have an account? <a href="login.php" style="color: navy; font-weight:bold; text-decoration:none;"><b>Login here</b></a></p>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>