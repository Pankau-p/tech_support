<?php

require_once('../../model/database.php');
require_once('../../model/customer_db.php');

$error = null;

$action = $_GET['action'] ?? '';

if ($action ===  'show_add_product_form') {
    include('../../view/shared/header.php');
    include('../../view/product/add_product.php');
    include('../../view/shared/footer.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $action = $_POST['action'] ?? '';

    if ($action === 'select_customer') {
        
        $product_code = $_POST['product_code'] ?? '';

        if (!empty($product_code)) {
            delete_product($db, $product_code);
        } else {
            $error = "Invalid product selected";
            }

    } elseif ($action === 'add_product') {
        
        $product_code = $_POST['product_code'] ?? '';
        $name = $_POST['name'] ?? '';
        $version = $_POST['version'] ?? '';
        $releaseDate = $_POST['releaseDate'] ?? '';

        // Check for errors
        if (empty($product_code)) {
            $error = "Product code required.";
        } elseif (empty($name)) {
            $error = "Name required.";
        } else if(empty($version)) {
            $error = "Version required.";
        } else {
            $timestamp = strtotime($releaseDate); // User can specify and valid date format for the release date
            if (!$timestamp) {
                $error = "Invalid date format.";
            } else {
                $releaseDate = date('Y-m-d', $timestamp);
            }
        }

        // If no errors, send to model
        if (!$error) {
            add_product($db, $product_code, $name, $version, $releaseDate);
        } 
    }
}

// Refresh state to get updates
$customers = get_customers($db);


// render page
include('../../view/shared/header.php');
include('../../view/shared/error.php');
include('../../view/customer/customer_list.php');
include('../../view/shared/footer.php');
?>