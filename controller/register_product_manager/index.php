<?php

require_once('../../model/database.php');
require_once('../../model/register_product.php');

$action = $_POST['action'] ?? $_GET['action'] ?? '';

$customerID = $_POST['customer_id'] ?? '';
$firstName = $_POST['first_name'] ?? '';
$lastName = $_POST['last_name'] ?? '';
$email = $_POST['email'] ?? '';

if ($action === login_customer) {

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Invalid Email. Please Try Again.";
    }

    $customer = $get_customer_by_email($db, $email);
    include('../../view/shared/header.php');
    include('../../view/customer/product_select.php');
    include('../../view/shared/footer.php');
}