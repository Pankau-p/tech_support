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

// Add a product with productCode, name, version, and releaseDate
function add_product($db, $product_code, $name, $version, $releaseDate) {
    $query = 'INSERT INTO products
                (productCode, name, version, releaseDate) 
                VALUES
                (:product_code, :name, :version, :releaseDate)';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_code', $product_code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':version', $version);
    $statement->bindValue(':releaseDate', $releaseDate);
    $success = $statement->execute();
    $statement->closeCursor();
    return $success;
}


?>



