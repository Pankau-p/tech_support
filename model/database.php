<?php
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