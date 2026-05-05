<?php
//
// Comp 3541 
// Assignment 2
//
// File: model/database.php
// Description: Model for accessing the database.
// Handles the DB connection with username and password.


    $dsn = 'mysql:host=db;dbname=tech_support';
    $username = 'student';
    $password ='student';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../view/shared/database_error.php');
        exit();
    }