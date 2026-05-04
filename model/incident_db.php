<?php

function get_registered_products($db, $customer_id) {
    $query = 'SELECT products.productName, products.productCode
              FROM products 
              JOIN registrations 
              ON products.productCode = registrations.productCode 
              WHERE registrations.customerID = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();
    $productCodes = $statement->fetchAll();   
    $statement->closeCursor();
    return $productCodes;
}
?>