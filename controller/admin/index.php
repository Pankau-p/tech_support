<?php
// File: controller/admin/index.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Controller for authenticating an admin user
//

session_start();

require_once('../../model/database.php');
require_once('../../model/auth_db.php');

$auth_db = new AuthDB($db);
$error = null;

$action = $_POST['action'] ?? $_GET['action'] ?? '';


if ($action === 'admin_login') {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username)) {
        $error = "Username is required.";
    } elseif (empty($password)) {
        $error = "Password is required.";
    } else {
        $admin = $auth_db->get_admin($username, $password);

        if ($admin) {
            $_SESSION['admin'] = true;
            $_SESSION['admin_username'] = $admin['username'];

            header('Location: /Assignment_2/controller/admin/index.php?action=menu');
            exit();
        } else {
            // no match, show login form again with error
            $error = "Invalid username or password.";
        }
    }
} elseif ($action === 'menu') {
    if (!isset($_SESSION['admin'])) {
        
        header('Location: /Assignment_2/controller/index.php');
        exit();
    }
    include('../../view/shared/header.php');
    include('../../view/admin/menu.php');
    include('../../view/shared/footer.php');
} else {
    include('../../view/shared/header.php');
    include('../../view/admin/login.php');
    include('../../view/shared/footer.php');
}

if ($error) {
    include('../../view/shared/header.php');
    include('../../view/admin/login.php');
    include('../../view/shared/footer.php');
}
