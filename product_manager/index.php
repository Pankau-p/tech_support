<?php

require_once('../model/database.php');
require_once('../model/product_db.php');


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $products = get_products($db);

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // var_dump($_POST);
    // exit;
    $action = $_POST['action'] ?? '';

    if ($action === 'delete_product') {
        $product_code = $_POST['product_code'] ?? '';

        if (!empty($product_code)) {
            delete_product($db, $product_code);
        }
    }
    $products = get_products($db);
}

// render page
include('../view/header.php');
include('../view/product_list.php');
include('../view/footer.php');
?>