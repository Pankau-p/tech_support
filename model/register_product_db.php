<?php
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

class RegisterProductDB {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Gets a customer by email address
    // Returns customer array or false if not found
    public function get_customer_by_email($email) {
        try {
            $query = 'SELECT * FROM customers 
                      WHERE email =:email';
            $statement = $this->db->prepare($query);
            $statement->bindValue(':email', $email);
            $statement->execute();
            $customer = $statement->fetch();
            $statement->closeCursor();
    return $customer;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include ('../view/shared/database_error.php');
            exit();
        }

    }

    // Register a product to a customer
    public function register_product($customer_id, $product_code) {
        try {
            $query = 'INSERT INTO registrations(customerID, 
                      productCode, registrationDate) 
                      VALUES (:customer_id, :product_code, NOW())';
            $statement = $this->db->prepare($query);
            $statement->bindValue(':customer_id', $customer_id);
            $statement->bindValue(':product_code', $product_code);
            $success = $statement->execute();
            $statement->closeCursor();
            return $success;

        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include ('../view/shared/database_error.php');
            exit();
        }
    }
}
