<?php

require_once('../model/database.php');
require_once('../model/technician_db.php');

$error = null;

$action = $_GET['action'] ?? '';

if ($action ===  'show_add_form') {
    include('../view/header.php');
    include('../view/add_technician.php');
    include('../view/footer.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $action = $_POST['action'] ?? '';

    if ($action === 'delete_technician') {
        
        $tech_id = $_POST['tech_id'] ?? '';

        if (!empty($tech_id)) {
            delete_product($db, $tech_id);
        } else {
            }
            $error = "Invalid technician selected";

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
            add_product($db, $product_code, $name, $version, $releaseDate);
        } 
    }
}

// Refresh state to get updates
$technicians = get_technicians($db);


// render page
include('../view/header.php');
include('../view/error.php');
include('../view/technician_list.php');
include('../view/footer.php');
?>