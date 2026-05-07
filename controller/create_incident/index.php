<?php
// File: controller/create_incident/index.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Controller for creating an incident, 
// Handles logging in a customer, getting registered products, 
// and creating an incident.

require_once('../../model/database.php');
require_once('../../model/incident_db.php');
require_once('../../model/customer_db.php');
require_once('../../model/register_product_db.php');

// Instantiate the RegisterProductDB class
// Create an object from the class, passing $db in
$incident_db = new IncidentDB($db);
$register_product_db = new RegisterProductDB($db);
$customer_db = new CustomerDB($db);

$action = $_POST['action'] ?? $_GET['action'] ?? '';

// Get a customer to manage
if ($action === 'login_customer') {
    $customer = null;
    $email = $_GET['email'] ?? '';

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "Invalid Email.";
    } else {
        $customer = $register_product_db->get_customer_by_email($email);
        if (!$customer) {
            $error = "Email not found.";
        }
    }

    // If successfully accessed a customer, get their registered products
    if ($customer){
    $products = $incident_db->get_registered_products($customer['customerID']);
    include('../../view/shared/header.php');
    include('../../view/incident_create/create_incident.php');
    include('../../view/shared/footer.php');
    } else {
        include('../../view/shared/header.php');
        include('../../view/incident_create/get_customer.php');
        include('../../view/shared/footer.php');      
    }

    // Create an incident for a specific product
} elseif ($action === 'create_incident'){
    $product_code = $_POST['product_code'] ?? '';
    $customer_id = $_POST['customer_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $incident_db->create_incident($customer_id, $product_code, $title, $description);
    $success = "The incident was added to our database";

    include('../../view/shared/header.php');
    include('../../view/incident_create/success.php');
    include('../../view/shared/footer.php');

    } else {
    include('../../view/shared/header.php');
    include('../../view/incident_create/get_customer.php');
    include('../../view/shared/footer.php');  
}

?>