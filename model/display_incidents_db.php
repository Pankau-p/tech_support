<?php
// File: model/display_incidents_db.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 3
//
// Description: Model for displaying all incidents to

class DisplayIncidentsDB {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function get_unassigned_incidents() {
        try {
            $query = 'SELECT * FROM incidents
                      JOIN customers ON incidents.customerID = customers.customerID
                      LEFT JOIN products ON incidents.productCode = products.productCode
                      WHERE techID IS NULL';
            $statement = $this->db->prepare($query);
            $statement->execute();
            $unassigned_incidents = $statement->fetchAll();   
            $statement->closeCursor();
            return $unassigned_incidents;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include($_SERVER['DOCUMENT_ROOT'] . '/Assignment_2/view/shared/database_error.php');
            exit();
        }    
    }

    public function get_assigned_incidents() {
        try {
            $query = 'SELECT incidents.*,
                        customers.firstName AS customerFirstName,
                        customers.lastName AS customerLastName,
                        technicians.firstName AS techFirstName,
                        technicians.lastName AS techLastName,
                        products.name
                      FROM incidents
                      JOIN customers ON incidents.customerID = customers.customerID
                      JOIN technicians ON incidents.techID = technicians.techID
                      LEFT JOIN products ON incidents.productCode = products.productCode
                      WHERE incidents.techID IS NOT NULL';
            $statement = $this->db->prepare($query);
            $statement->execute();
            $assigned_incidents = $statement->fetchAll();   
            $statement->closeCursor();
            return $assigned_incidents;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include($_SERVER['DOCUMENT_ROOT'] . '/Assignment_2/view/shared/database_error.php');
            exit();
        }    
    }
}