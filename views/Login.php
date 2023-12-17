<?php
require_once('../controllers/AuthController.php');
require_once('../controllers/sessions.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $authController = new AuthController();
    $result = $authController->login($_POST['username'], $_POST['password']);

    if ($result['success']) {
        SessionManager::setSessionData('user_id', $result['user_id']);
        header("Location: ./Home.php");
        exit();
    } else {
        $errorMessage = $result['message'];
    }
}

?>

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="cache-control" content="no-cache">
    <title>KsWears</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../public/css/style.css">
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <a class="navbar-brand" href="../index.php"><b><span class="firstWord">KS WEARS</span></b><span class="secondWord">
                    WORKOUT IN STYLE</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="Login.php"><i class="bi bi-box-arrow-in-right"></i> Sign in</a>
                    <li class="nav-item">
                        <a class="nav-link active" href="Signup.php"><i class="bi bi-r-circle"></i> Register</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

<body>

    <main>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <center>
                            <h3 class="mb-3" style="margin-top: 2%;">LOGIN</h3>
                        </center>
                        <form method="post">
                            <div class="mb-3">
                                <label for="exampleInputUsername" class="form-label"><i class="bi bi-person"></i> <b>Username</b></label>
                                <input type="text" name="username" class="form-control" id="exampleInputUsername" placeholder="Enter your username">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label"><i class="bi bi-lock-fill"></i> <b>Password</b></label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter your password">
                            </div>

                            <?php if (isset($errorMessage)) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $errorMessage; ?>
                                </div>
                            <?php endif; ?>

                            <div class="mb-3">
                                <label class="form-label">Not a Member? <a href="Signup.php" style="color: navy; font-weight:bold; text-decoration:none;">Register Now</a></label>
                            </div>
                            <div class="container" style="text-align: center;">
                                <button type="submit" name="connexion" class="btn btn-primary">Login</button>
                                <div class="mt-3">
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>