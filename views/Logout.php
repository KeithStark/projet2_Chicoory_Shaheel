<?php
require_once('../controllers/AuthController.php');
require_once('../controllers/sessions.php');

$authController = new AuthController();
$authController->logout();

// Redirect to the index page after logout
header("Location: ../index.php");
exit();
