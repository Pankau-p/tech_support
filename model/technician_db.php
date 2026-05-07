<?php
// File: model/technician_db.php
//
// Author:
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Model for accessing a technician in the DB.
// Handles getting all technicians, adding a technician, and deleting a technician. 

class TechnicianDB {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    
    // Get all technicians
    public function get_technicians() {
        try { 
            $query = 'SELECT * FROM technicians ORDER BY techID';
            $statement = $this->db->prepare($query);
            $statement->execute();
            $technicians = $statement->fetchAll();
            $statement->closeCursor();
            return $technicians;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include ('../view/shared/database_error.php');
            exit();
        }
    }

    // Delete one technician with technician ID
    public function delete_technician($tech_id) {
        try {
            $query = 'DELETE FROM technicians
                      WHERE techID = :tech_id';
            $statement = $this->db->prepare($query);
            $statement->bindValue(':tech_id', $tech_id);
            $success = $statement->execute();
            $statement->closeCursor();
    return $success;   
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include ('../view/shared/database_error.php');
            exit();
        }
    }

    // Add a technician with tech ID, firstName, lastName, 
    // email, phone and password
    public function add_technician($tech_id, $first_name, $last_name, 
                        $email, $phone, $password) {
        try {
            $query = 'INSERT INTO technicians (techID, firstName, lastName, 
                      email, phone, password)
                      VALUES
                      (:tech_id, :first_name, :last_name, :email, :phone, :password)';
            $statement = $this->db->prepare($query);
            $statement->bindValue(':tech_id', $tech_id);
            $statement->bindValue(':first_name', $first_name);
            $statement->bindValue(':last_name', $last_name);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':phone', $phone);
            $statement->bindValue(':password', $password);
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
?>
