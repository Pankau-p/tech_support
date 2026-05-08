<?php
// File: controller/product_register/index.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Controller for registering a product.
// Handles Logging in a customer, and registering a product.

session_start();
 
require_once('../../model/database.php');
require_once('../../model/register_product_db.php');
require_once('../../model/product_db.php');
require_once('../../model/customer_db.php');

// Instantiate the RegisterProductDB class
// Create an object from the class, passing $db in
$register_product_db = new RegisterProductDB($db);
$product_db = new ProductDB($db);
$customer_db = new CustomerDB($db);

$error = null;

$action = $_POST['action'] ?? $_GET['action'] ?? '';

// Login as a customer
if ($action === 'login_customer') {
    $customer = null;
    $email = $_GET['email'] ?? '';

    // Check email valid and send to DB for login. 
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "Invalid Email.";
    } else {
        $customer = $register_product_db->get_customer_by_email($email);
        if (!$customer) {
            $error = "Email not found.";
        } else {
        $_SESSION['customer'] = $customer;
        }
    } 

    if ($customer){
        $products = $product_db->get_products();
        include('../../view/shared/header.php');
        include('../../view/register_product/product_select.php');
        include('../../view/shared/footer.php');
    } else {
        include('../../view/shared/header.php');
        include('../../view/register_product/email_login.php');
        include('../../view/shared/footer.php');
    }
    // Register a Product
} elseif ($action === 'register_product'){
    $product_code = $_POST['product_code'] ?? '';
    $customer_id = $_POST['customer_id'];
    
    if ($register_product_db->is_registered($customer_id, $product_code)) {
        $error = "That product is already registered to this customer.";
        $customer = $customer_db->get_customer($customer_id);
        $products = $product_db->get_products();

        include('../../view/shared/header.php');
        include('../../view/register_product/product_select.php');
        include('../../view/shared/footer.php');
    } else {
        $register_product_db->register_product($customer_id, $product_code);
        $success = "Product (" . $product_code . ") was registered successfully.";
        include('../../view/shared/header.php');
        include('../../view/register_product/success.php');
        include('../../view/shared/footer.php');

    } 
} elseif ($action === 'logout') {
        session_destroy();
        include('../../view/shared/header.php');
        include('../../view/register_product/email_login.php');
        include('../../view/shared/footer.php');
} else {
    if (isset($_SESSION['customer'])) {
        $customer = $_SESSION['customer'];
        $products = $product_db->get_products();
        include('../../view/shared/header.php');
        include('../../view/register_product/product_select.php');
        include('../../view/shared/footer.php');
    } else {
        include('../../view/shared/header.php');
        include('../../view/register_product/email_login.php');
        include('../../view/shared/footer.php');
    }
}
?>