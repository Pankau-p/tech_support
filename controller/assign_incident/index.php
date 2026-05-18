<?php
// File: controller/assign_incident/index.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Controller for creating an incident, 
// Handles logging in a customer, getting registered products, 
// and creating an incident.
session_start();

require_once('../../model/database.php');
require_once('../../model/assign_incident_db.php');

$assign_incident_db = new AssignIncidentDB($db);

$error = null;


$action = $_POST['action'] ?? $_GET['action'] ?? '';

if ($action === 'select_incident') {
    $incident_id = $_POST['incident_id'] ?? '';
    $_SESSION['incident_id'] = $incident_id;

    $technicians_with_count = $assign_incident_db->get_technicians_with_count();
    include('../../view/shared/header.php');
    include('../../view/incident_assign/select_technician.php');
    include('../../view/shared/footer.php');
    exit;
} elseif ($action === 'select_technician') {
    $tech_id = $_POST['tech_id'];
    $_SESSION['tech_id'] = $tech_id;

    include('../../view/shared/header.php');
    include('../../view/incident_assign/assign_incident.php');
    include('../../view/shared/footer.php');
    exit;
} elseif ($action === 'assign_incident') {
    if (isset($_SESSION['incident_id']) && isset($_SESSION['tech_id'])) {
        $incident_id = $_SESSION['incident_id'];
        $tech_id = $_SESSION['tech_id'];

        $assign_incident_db->assign_incident($incident_id, $tech_id);
        $success = 'This incident was assigned to a technician';
        
        include('../../view/shared/header.php');
        include('../../view/incident_assign/success.php');
        include('../../view/shared/footer.php');
    } else {
        $error = "No incident or technician selected.";
    }
} else {
    $unassigned_incidents = $assign_incident_db->get_unassigned_incidents();
    include('../../view/shared/header.php');
    include('../../view/incident_assign/select_incident.php');
    include('../../view/shared/footer.php');
}
?>