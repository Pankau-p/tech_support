<?php
// File: controller/product_manager/index.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Controller for managing a product.
// Handles showing, adding and deleting a product.

require_once('../../model/database.php');
require_once('../../model/product_db.php');

// Instantiate the ProductDB class
// Create an object from the class, passing $db in
$product_db = new ProductDB($db);

$error = null;

$action = $_GET['action'] ?? '';

// Add and Delete a Product
if ($action ===  'show_add_product_form') {
    include('../../view/shared/header.php');
    include('../../view/product/add_product.php');
    include('../../view/shared/footer.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $action = $_POST['action'] ?? '';

    if ($action === 'delete_product') {
        
        $product_code = $_POST['product_code'] ?? '';

        if (!empty($product_code)) {
            $product_db->delete_product($product_code);
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
            $product_db->add_product($product_code, $name, $version, $releaseDate);
        } 
    }
}

// Show Products
// Refresh state to get updates
$products = $product_db->get_products($db);


// render page
include('../../view/shared/header.php');
include('../../view/shared/error.php');
include('../../view/product/product_list.php');
include('../../view/shared/footer.php');
?>