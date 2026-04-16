<?php

require_once('../model/database.php');
require_once('../model/product_db.php');


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $products = get_products($db);

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'delete_product') {
        $product_code = $_POST['product_code'] ?? '';

        if (!empty($product_code)) {
            delete_product($db, $product_code);

        }
        trim($_DELETE['product_code'] ?? '');

    }
    if (empty($product_code)) {
        $errors = "Invalid Product Selected";
    } else {
    }
}
?>