<?php
// File: model/incident_db.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Model for creating an incident in the DB.
// Gets all registered products for a customer and then 
// we can create an incident.


// Gets all registered products that belong to 
// one customer.
// Returns an array of product codes associated with that customer.
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

// Creates a new incident in the database
// using a customer ID and a product Code.
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