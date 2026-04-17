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
function delete_product($db, $product_code) {
    $query = 'DELETE FROM products 
              WHERE productCode = :product_code';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_code', $product_code);
    $success = $statement->execute();
    $statement->closeCursor();
    return $success;
}


?>



