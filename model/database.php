<?php
// File: model/database.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Model for accessing the database.
// Handles the DB connection with username and password.


    $dsn = 'mysql:host=db;dbname=tech_support';
    $username = 'student';
    $password ='student';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include($_SERVER['DOCUMENT_ROOT'] . '/Assignment_2/view/shared/database_error.php');
        exit();
    }