<?php
// Get all products
function get_products($db) {
    $query = 'SELECT * FROM products ORDER BY productCode';
    $statement = $db->prepare($query);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

// Delete one product with product code
function delete_product($db, $product_code) {}
?>

