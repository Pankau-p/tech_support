<?php
// File: model/auth_db.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 3
//
// Description: Model for authenticating an administrator user 
// in the database and app. 

class AuthDB {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function get_admin($username, $password) {
        try {
            $query = 'SELECT * FROM administrators
                      WHERE administrators.username = :username
                      AND administrators.password = :password';
            $statement = $this->db->prepare($query);
            $statement->bindValue(':username', $username);
            $statement->bindValue(':password', $password);
            $statement->execute();
            $admin_user = $statement->fetch();
            $statement->closeCursor();
            return $admin_user;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include($_SERVER['DOCUMENT_ROOT'] . '/Assignment_2/view/shared/database_error.php');            
            exit();
        }
    }

    public function get_tech_login($email, $password) {
        try {
            $query = 'SELECT * FROM technicians
                      WHERE technicians.email = :email
                      AND technicians.password = :password';
            $statement = $this->db->prepare($query);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':password', $password);
            $statement->execute();
            $tech_user = $statement->fetch();
            $statement->closeCursor();
            return $tech_user;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include($_SERVER['DOCUMENT_ROOT'] . '/Assignment_2/view/shared/database_error.php');            
            exit();
        }
    }

    public function get_customer_login($email, $password) {
        try {
            $query = 'SELECT * FROM customers
                      WHERE customers.email = :email
                      AND customers.password = :password';
            $statement = $this->db->prepare($query);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':password', $password);
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
}