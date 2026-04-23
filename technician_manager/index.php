<?php

require_once('../model/database.php');
require_once('../model/product_db.php');

$error = null;

$action = $_GET['action'] ?? '';

if ($action ===  'show_add_form') {
    include('../view/header.php');
    include('../view/add_product.php');
    include('../view/footer.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $action = $_POST['action'] ?? '';

    if ($action === 'delete_product') {
        
        $product_code = $_POST['product_code'] ?? '';

        if (!empty($product_code)) {
            delete_product($db, $product_code);
        } else {
            }
            $error = "Invalid product selected";

    } elseif ($action === 'add_product') {
        
        $product_code = $_POST['product_code'] ?? '';
        $name = $_POST['name'] ?? '';
        $version = $_POST['version'] ?? '';
        $releaseDate = $_POST['releaseDate'] ?? '';
        var_dump($releaseDate);

        // Check for errors
        if (empty($product_code)) {
            $error = "Product code required.";
        } elseif (empty($name)) {
            $error = "Name required.";
        } else if(empty($version)) {
            $error = "Version required.";
        }

        // User can specify and valid date format for the release date
        $timestamp = strtotime($releaseDate);
        if ($timestamp) {
            $releaseDate = date('Y-m-d', $timestamp);
        } else {
            $error = "Invalid date format.";
        }

        // If no errors, send to model
        if (!$error) {
            add_product($db, $product_code, $name, $version, $releaseDate);
        } else {
            $error = "Invalid product data. Check all fields and try again.";
        }
    }
}

// Refresh state to get updates
$products = get_products($db);


// render page
include('../view/header.php');
include('../view/error.php');
include('../view/product_list.php');
include('../view/footer.php');
?>