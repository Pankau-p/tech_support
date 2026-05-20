<?php
// File: controller/technician/index.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Controller for authenticating an technician user
//

session_start();

require_once('../../model/database.php');
require_once('../../model/auth_db.php');

$auth_db = new AuthDB($db);
$error = null;

$action = $_POST['action'] ?? $_GET['action'] ?? '';


if ($action === 'tech_login') {

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email)) {
        $error = "email is required.";
    } elseif (empty($password)) {
        $error = "Password is required.";
    } else {
        $tech = $auth_db->get_tech_login($email, $password);

        if ($tech) {
            $_SESSION['tech'] = true;
            $_SESSION['tech_email'] = $tech['email'];
            $_SESSION['tech_id'] = $tech['techID'];

            header('Location: /Assignment_2/controller/technician/index.php?action=menu');
            exit();
        } else {
            // no match, show login form again with error
            $error = "Invalid email or password.";
        }
    }
} elseif ($action === 'menu') {
    if (!isset($_SESSION['tech'])) {
        
        header('Location: /Assignment_2/controller/index.php');
        exit();
    }
    include('../../view/shared/header.php');
    include('../../view/tech/select_incident.php');
    include('../../view/shared/footer.php');
} elseif ($action === 'tech_logout') {
    session_destroy();
    header('Location: /Assignment_2/index.php');
    exit();
} else {
    include('../../view/shared/header.php');
    include('../../view/tech/login.php');
    include('../../view/shared/footer.php');
}

if ($error) {
    include('../../view/shared/header.php');
    include('../../view/tech/login.php');
    include('../../view/shared/footer.php');
}
