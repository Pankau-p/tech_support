<?
// File: model/register_product_db.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
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