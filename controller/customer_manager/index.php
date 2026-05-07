<?php
// File: controller/customer_manager/index.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Controller for customer management
// Handles search, adding a customer and showing customers.

require_once('../../model/database.php');
require_once('../../model/customer_db.php');


// Instantiate the CustomerDB class
// Create an object from the class, passing $db in
$customer_db = new CustomerDB($db);

$error = null;

$action = $_POST['action'] ?? $_GET['action'] ?? '';

$customerID = $_POST['customer_id'] ?? '';
$firstName = $_POST['first_name'] ?? '';
$lastName = $_POST['last_name'] ?? '';
$address = $_POST['address'] ?? '';
$city = $_POST['city'] ?? '';
$state = $_POST['state'] ?? '';
$postalCode = $_POST['postal_code'] ?? '';
$countryCode = $_POST['country_code'] ?? '';
$phone = $_POST['phone'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Search Customers
if ($action === "search_customers") {

    $lastName = $_GET['lastName'] ?? '';
    // Search by lastName, allow partial matches (LIKE)
    $customers = $customer_db->search_customer('%' . $lastName . '%');
    include('../../view/shared/header.php');
    include('../../view/customer/customer_list.php');
    include('../../view/shared/footer.php');

    } elseif ($action === 'select_customer') {
        $customer_id = $_POST['customer_id'] ?? null;
        if ($customer_id) {
            $customer = $customer_db->get_customer($customer_id);
            $countries = $customer_db->get_countries();
            include('../../view/shared/header.php');
            include('../../view/customer/customer_form.php');
            include('../../view/shared/footer.php');
            exit;
        } else {
            $error  = "No customer selected.";
        }

        // Add Customer
    } elseif ($action === 'show_add_customer') {
        $customer = ['countryCode' => 'CA'];
        $countries = $customer_db->get_countries();
        include('../../view/shared/header.php');
        include('../../view/customer/customer_form.php');
        include('../../view/shared/footer.php');
        exit;

    } elseif ($action === 'add_customer' || $action === "update_customer") {

        $errors = [];


        $required_fields = [    
            'firstName' => $firstName,
            'lastName' => $lastName,
            'address' => $address,
            'city' => $city,
            'state' => $state,
            'email' => $email,
            ];

        foreach ($required_fields as $field=>$value) {
            if (strlen($value) < 1 || strlen($value) > 50) {
                $errors[$field] = "Required, must be less than 51 characters.";
            }
        }

        // Validation of Customer Data
        if (strlen($postalCode) < 1 || strlen($postalCode) > 20) {
            $errors['postalCode'] = "Required, must be less than 21 characters.";
        } 

        if (!preg_match('/^\(\d{3}\) \d{3}-\d{4}$/', $phone)) {
            $errors['phone'] = "Use (999) 999-9999 format.";
        } 

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid Email.";
        } 

        if(strlen($password) < 6 || strlen($password) > 20) {
            $errors['password'] = "Required, must be between 6 and 21 characters.";
        }

        if (empty($errors)) {
            if ($action === "add_customer") {
                $customer_db->add_customer($firstName, $lastName, $address, 
                    $city, $state, $postalCode, $countryCode,
                    $phone, $email, $password);
        
                header("Location: index.php?action=list_customers");
                exit;
            } elseif ($action === "update_customer"){
                $customer_db->update_customer($customerID, $firstName, $lastName, $address, 
                    $city, $state, $postalCode, $countryCode,
                    $phone, $email, $password);
        
                header("Location: index.php?action=list_customers");
                exit;
            } 
        } else {
            $customer = [
                'customerID' => $customerID,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'address' => $address,
                'city' => $city,
                'state' => $state,
                'postalCode' => $postalCode,
                'countryCode' => $countryCode,
                'phone' => $phone,
                'email' => $email,
            ];
            $countries = $customer_db->get_countries();
            include('../../view/shared/header.php');
            include('../../view/customer/customer_form.php');
            include('../../view/shared/footer.php');
        }

        // List Customers
    } elseif ($action === 'list_customers') {
        // Refresh state to get updates
        $customers = $customer_db->get_customers();
        // render page
        include('../../view/shared/header.php');
        include('../../view/shared/error.php');
        include('../../view/customer/customer_list.php');
        include('../../view/shared/footer.php');

    }else {
        // Refresh state to get updates
        $customers = $customer_db->get_customers();
        // render page
        include('../../view/shared/header.php');
        include('../../view/shared/error.php');
        include('../../view/customer/customer_list.php');
        include('../../view/shared/footer.php');
}
?>