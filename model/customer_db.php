<?php
// File: model/customer_db.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Model for accessing a customer in the database.
// Handles getting all customers, getting one customer, searching for a customer
// getting countries, add a customer, and updating a customer. 

class CustomerDB {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Gets all customers
    // Returns customers array
    public function get_customers() {
        try {
            $query = 'SELECT * FROM customers ORDER BY lastName';
            $statement = $this->db->prepare($query);
            $statement->execute();
            $customers = $statement->fetchAll();
            $statement->closeCursor();
            return $customers;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include($_SERVER['DOCUMENT_ROOT'] . '/Assignment_2/view/shared/database_error.php');
            exit();
        }
    }   

    // Select one customer with customer ID
    public function get_customer($customer_id) {
        try {
            $query = 'SELECT * FROM customers
                      WHERE customerID = :customer_id';
            $statement = $this->db->prepare($query);
            $statement->bindValue(':customer_id', $customer_id);
            $statement->execute();
            $customer = $statement->fetch();
            $statement->closeCursor();
            return $customer;   
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include($_SERVER['DOCUMENT_ROOT'] . '/Assignment_2/view/shared/database_error.php');            
            exit();
        }
    }
    
    // Search for a customer with lastName
    public function search_customer($lastName) {
        try {
            $query = 'SELECT * FROM customers
                      WHERE lastName LIKE :lastName';
            $statement = $this->db->prepare($query);
            $statement->bindValue(':lastName', $lastName);
            $statement->execute();
            $customers = $statement->fetchAll();
            $statement->closeCursor();
            return $customers;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include($_SERVER['DOCUMENT_ROOT'] . '/Assignment_2/view/shared/database_error.php');
            exit();
        }
    }

    // Get the list of countries from the DB
    public function get_countries() {
        try {
            $query = 'SELECT * FROM countries';
            $statement = $this->db->prepare($query);
            $statement->execute();
            $countries = $statement->fetchAll();
            $statement->closeCursor();
            return $countries;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include($_SERVER['DOCUMENT_ROOT'] . '/Assignment_2/view/shared/database_error.php');
            exit();
        }
    }

    // Add a customer with firstName, lastName, 
    // address, city, state, postalCode, countryCode, phone, email
    // and password
    public function add_customer($firstName, $lastName, 
                      $address, $city, $state, $postalCode, $countryCode,
                      $phone, $email, $password) {

        try {
            $query = 'INSERT INTO customers (firstName, lastName, 
                      address, city, state, postalCode, countryCode, phone, 
                      email, password)
                      VALUES
                      (:firstName, :lastName, :address, :city, 
                      :state, :postalCode, :countryCode, :phone, :email, :password)';
            $statement = $this->db->prepare($query);
            $statement->bindValue(':firstName', $firstName);
            $statement->bindValue(':lastName', $lastName);
            $statement->bindValue(':address', $address);
            $statement->bindValue(':city', $city);
            $statement->bindValue(':state', $state);
            $statement->bindValue(':postalCode', $postalCode);
            $statement->bindValue(':countryCode', $countryCode);
            $statement->bindValue(':phone', $phone);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':password', $password);
            $success = $statement->execute();
            $statement->closeCursor();
            return $success;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include($_SERVER['DOCUMENT_ROOT'] . '/Assignment_2/view/shared/database_error.php');
            exit();
        }
                      
                      
    }

    // Update the customer details
    public function update_customer($customerID, $firstName, $lastName, 
                         $address, $city, $state, $postalCode, $countryCode,
                         $phone, $email, $password) {
        try {
            $query = 'UPDATE customers
                      SET firstName = :firstName,
                      lastName = :lastName,
                      address = :address,
                      city = :city,
                      state = :state,
                      postalCode = :postalCode,
                      countryCode = :countryCode,
                      phone = :phone,
                      email = :email,
                      password = :password
                      WHERE customerID = :customerID';

            $statement = $this->db->prepare($query);

            $statement->bindValue(':firstName', $firstName);
            $statement->bindValue(':lastName', $lastName);
            $statement->bindValue(':address', $address);
            $statement->bindValue(':city', $city);
            $statement->bindValue(':state', $state);
            $statement->bindValue(':postalCode', $postalCode);
            $statement->bindValue(':countryCode', $countryCode);
            $statement->bindValue(':phone', $phone);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':password', $password);
            $statement->bindValue(':customerID', $customerID);
            
            $success = $statement->execute();
            $statement->closeCursor();
            return $success;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include($_SERVER['DOCUMENT_ROOT'] . '/Assignment_2/view/shared/database_error.php');
            exit();
        }                 
    }
}

?>
