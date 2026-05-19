<?php
// File: model/assign_incident_db.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 3
//
// Description: Model for assigning an incident to
// a technician in the DB.


class AssignIncidentDB {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function get_unassigned_incidents() {
        try {
            $query = 'SELECT * FROM incidents
                      JOIN customers 
                      ON incidents.customerID = customers.customerID
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

    public function get_technicians_with_count() {
        try {
            $query = 'SELECT *, (
                        SELECT COUNT(*) FROM incidents 
                        WHERE incidents.techID = technicians.techID
                        AND incidents.dateClosed IS NULL
                        ) AS open_incidents
                        FROM technicians';
            $statement = $this->db->prepare($query);
            $statement->execute();
            $technicians_with_count = $statement->fetchAll();   
            $statement->closeCursor();
            return $technicians_with_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include($_SERVER['DOCUMENT_ROOT'] . '/Assignment_2/view/shared/database_error.php');
            exit();
        }
    }

    public function assign_incident($incidentID, $techID) {
        try {
            $query = 'UPDATE incidents SET techID =:techID
                      WHERE incidentID = :incidentID';
            $statement = $this->db->prepare($query);
            $statement->bindValue(':incidentID', $incidentID);
            $statement->bindValue(':techID', $techID);
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