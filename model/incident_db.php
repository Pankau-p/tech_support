<?php

function get_registered_products($db, $customerID) {
    $query = 'SELECT products.name, products.productCode
              FROM products 
              JOIN registrations 
              ON products.productCode = registrations.productCode 
              WHERE registrations.customerID = :customerID';
    $statement = $db->prepare($query);
    $statement->bindValue(':customerID', $customerID);
    $statement->execute();
    $productCodes = $statement->fetchAll();   
    $statement->closeCursor();
    return $productCodes;
}

function create_incident($db, $customerID, $productCode, $title, $description) {
    $query = 'INSERT INTO incidents (customerID,
              productCode, dateOpened, dateClosed, title, description)
              VALUES
              (:customerID, :productCode, NOW(), NULL, :title, 
              :description)';
    $statement = $db->prepare($query);
    $statement->bindValue(':customerID', $customerID);
    $statement->bindValue(':productCode', $productCode);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $success = $statement->execute();
    $statement->closeCursor();

    return $success;
}
?>