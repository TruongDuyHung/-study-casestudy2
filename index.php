<?php
session_start();
use Controller\User_Controller;
include 'view/login.php';
if (isset($_SESSION['login-fail'])) {
    echo $_SESSION['login-fail'];
}
$controller = new User_Controller();
$controller->checklogin();
?>
