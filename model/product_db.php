<?php
// File: model/product_db.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Model for getting and creating a product in the DB.
// Handles getting, deleting, and adding a product. 


class ProductDB {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Get all products
    public function get_products(){
        try {
            $query = 'SELECT * FROM products ORDER BY productCode';
            $statement = $this->db->prepare($query);
            $statement->execute();
            $products = $statement->fetchAll();
            $statement->closeCursor();
            return $products;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include($_SERVER['DOCUMENT_ROOT'] . '/Assignment_2/view/shared/database_error.php');
            exit();
        }
    }
    
    // Delete one product with product code
    public function delete_product($product_code){
        try {
            $query = 'DELETE FROM products
                      WHERE productCode = :product_code';    
            $statement = $this->db->prepare($query);
            $statement->bindValue(':product_code', $product_code);
            $success = $statement->execute();
            $statement->closeCursor();
            return $success;
        } catch (PDOException $e) {
            $error_message= $e->getMessage();
            include($_SERVER['DOCUMENT_ROOT'] . '/Assignment_2/view/shared/database_error.php');
            exit();
        }
    }

    // Add a product with productCode, name, version, and releaseDate
    public function add_product($product_code, $name, $version, $releaseDate) {
        try {
            $query = 'INSERT INTO products
                      (productCode, name, version, releaseDate) 
                      VALUES
                      (:product_code, :name, :version, :releaseDate)';
            $statement = $this->db->prepare($query);
            $statement->bindValue(':product_code', $product_code);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':version', $version);
            $statement->bindValue(':releaseDate', $releaseDate);
            $success = $statement->execute();
            $statement->closeCursor();
    return $success;
        } catch (PDOException $e) {
            $error_message= $e->getMessage();
            include($_SERVER['DOCUMENT_ROOT'] . '/Assignment_2/view/shared/database_error.php');
            exit();
        }
    }
}
?>



