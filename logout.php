<?php 
session_start();
if (!isset($_SESSION["email"])) {
  header("Location:login.php");
  exit;  
}

require("controller/UserController.php");
require("controller/AbsenController.php");
$userController = new UserController;
$absenController = new AbsenController;
$userAuth = $userController->auth();

$pulang = $absenController->setGoHome($userAuth["id"]);

    $_SESSION = [];
    session_unset();
    session_destroy();
    header("Location:login.php");
    exit;
?>