<?php

require_once('../../model/database.php');
require_once('../../model/register_product_db.php');
require_once('../../model/product_db.php');
require_once('../../model/customer_db.php');

$error = null;

$action = $_POST['action'] ?? $_GET['action'] ?? '';

if ($action === 'login_customer') {
    $customer = null;
    $email = $_GET['email'] ?? '';

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "Invalid Email.";
    } else {
        $customer = get_customer_by_email($db, $email);
        if (!$customer) {
            $error = "Email not found.";
        }
    }

    if ($customer){
        $products = get_products($db);
        include('../../view/shared/header.php');
        include('../../view/register_product/product_select.php');
        include('../../view/shared/footer.php');
    } else {
        include('../../view/shared/header.php');
        include('../../view/register_product/email_login.php');
        include('../../view/shared/footer.php');
    }
} elseif ($action === 'register_product'){
    $product_code = $_POST['product_code'] ?? '';
    $customer_id = $_POST['customer_id'];
    
    try{
        register_product($db, $customer_id, $product_code);
        $success = "Product (" . $product_code . ") was registered successfully.";

        include('../../view/shared/header.php');
        include('../../view/register_product/success.php');
        include('../../view/shared/footer.php');

    } catch (Exception $e) {
        $error = "That product is already registered to this customer.";
        $customer = get_customer($db, $customer_id);
        $products = get_products($db);

        include('../../view/shared/header.php');
        include('../../view/register_product/product_select.php');
        include('../../view/shared/footer.php');
    }
} else {
    include('../../view/shared/header.php');
    include('../../view/register_product/email_login.php');
    include('../../view/shared/footer.php');
}
?>