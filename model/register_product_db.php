<?
//
// Comp 3541 
// Assignment 2
//
// File: model/register_product_db.php
// Description: Model for registering a product to a
// customer in the DB.
// Gets a customer by email address and then allows
// the customer to register a product to their account. 


// Gets a customer by email address
// Returns customer array or false if not found
function get_customer_by_email($db, $email) {
    $query = 'SELECT * FROM customers 
              WHERE email =:email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();
    return $customer;
}

// Register a product to a customer
function register_product($db, $customer_id, $product_code) {
    $query = 'INSERT INTO registrations(customerID, 
              productCode, registrationDate) 
              VALUES (:customer_id, :product_code, NOW())';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->bindValue(':product_code', $product_code);
    return $statement->execute();
}