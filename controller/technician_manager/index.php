<?php
// File: controller/technician_manager/index.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Controller for managing technicians.
// Handles showing, adding, and deleting a technician. 

session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: /Assignment_2/controller/admin/index.php');
    exit();
}

require_once('../../model/database.php');
require_once('../../model/technician_db.php');

// Instantiate the TechnicianDB class
// Create an object from the class, passing $db in
$technician_db = new TechnicianDB($db);

$error = null;

$action = $_GET['action'] ?? '';

// Show the form to add a new technician
if ($action ===  'show_add_technician_form') {
    include('../../view/shared/header.php');
    include('../../view/technician/add_technician.php');
    include('../../view/shared/footer.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $action = $_POST['action'] ?? '';

    // Delete a technician
    if ($action === 'delete_technician') {
        
        $tech_id = $_POST['tech_id'] ?? '';

        if (!empty($tech_id)) {
            $technician_db->delete_technician($tech_id);
        } else {
            $error = "Invalid technician selected";
        }

    // Add a technician
    } elseif ($action === 'add_technician') {
        
        $tech_id = $_POST['tech_id'] ?? '';
        $first_name = $_POST['first_name'] ?? '';
        $last_name = $_POST['last_name'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $password = $_POST['password'] ?? '';

        // Check for errors
        if (empty($tech_id)) {
            $error = "Technician ID required.";
        } elseif (empty($first_name) || empty($last_name)) {
            $error = "Name required.";
        } else if(empty($email)) {
            $error = "Email required.";
        } else if(empty($phone)) {
            $error = "Phone required.";
        } else if(empty($password)) {
            $error = "Password required.";
        }

        // If no errors, send to model
        if (!$error) {
            $technician_db->add_technician($tech_id, $first_name, $last_name,
                           $email, $phone, $password);
        } 
    }
}

// Show all technicians
// Refresh state to get updates
$technicians = $technician_db->get_technicians();


// render page
include('../../view/shared/header.php');
include('../../view/shared/error.php');
include('../../view/technician/technician_list.php');
include('../../view/shared/footer.php');
?>