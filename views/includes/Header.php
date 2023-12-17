<?php
require_once('../models/User.php');
require_once('../controllers/sessions.php');

// Check if the user is logged in
SessionManager::startSession();
$user_id = SessionManager::getSessionData('user_id');
$userModel = new User();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="cache-control" content="no-cache">
    <title>SportShoeHub</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<!-- Header -->
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <a class="navbar-brand" href="../index.php"><b><span class="firstWord">SportShoeHub</span></b><span class="secondWord">STEP INTO PERFORMANCE</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="btn btn-info" style="font-weight: bold;">Welcome</a>
                </li>
                <?php
                if (isset($user_id)) {
                    $role_id = $userModel->getUserRole($user_id);
                    if ($role_id == 1 || $role_id == 2) {
                ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-gear"></i> Administration</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="ManageProducts.php"><i class="bi bi-basket-fill"></i> Manage Products</a></li>
                                <li><a class="dropdown-item" href="ManageUsers.php"><i class="bi bi-person"></i> Users</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="manageCommands.php"><i class="bi bi-box"></i> Orders</a></li>
                            </ul>
                        </li>
                    <?php
                    } elseif ($role_id == 3) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="Products.php"><i class="bi bi-shop"></i> Shop</a>
                        </li>
                        <li class="nav-item">
                            <a href="myCart.php" class="btn btn-primary">
                                <i class="bi bi-cart4"></i> <span class="badge text-bg-danger">
                                </span>
                            </a>
                        </li>
                <?php
                    }
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link active" href="MyProfile.php"><i class="bi bi-person-badge"></i> My Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="Logout.php"><i class="bi bi-box-arrow-right"></i> Log Out</a>
                </li>
            </ul>
    </nav>
</header>

<body>