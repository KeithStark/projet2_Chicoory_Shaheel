<?php
require_once('../controllers/AuthController.php');
require_once('../controllers/sessions.php');

$authController = new AuthController();
$authController->logout();

header("Location: ../index.php");
exit();
