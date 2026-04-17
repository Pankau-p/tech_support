<?php

require_once('../model/database.php');
require_once('../model/product_db.php');

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $action = $_POST['action'] ?? '';

    if ($action === 'delete_product') {
        
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

        if (!empty($product_code) && !empty($name) &&
            !empty($version) && !empty($releaseDate)) {
            
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