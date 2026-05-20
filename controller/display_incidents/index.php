<?php
// File: controller/display_incidents/index.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Controller for displaying all incidents. 
// initially displays unassigned incidents with option to switch 
// to assigned incidents with technician information

session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: /Assignment_2/controller/admin/index.php');
    exit();
}

require_once('../../model/database.php');
require_once('../../model/display_incidents_db.php');

$display_incidents_db = new DisplayIncidentsDB($db);
$error = null;

$action = $_POST['action'] ?? $_GET['action'] ?? '';

if ($action === 'view_assigned_incidents') {
    $assigned_incidents = $display_incidents_db->get_assigned_incidents();
    include('../../view/shared/header.php');
    include('../../view/display_incidents/assigned_incidents.php');
    include('../../view/shared/footer.php');
    exit;
} else {
    $unassigned_incidents = $display_incidents_db->get_unassigned_incidents();
    include('../../view/shared/header.php');
    include('../../view/display_incidents/unassigned_incidents.php');
    include('../../view/shared/footer.php');
}
?>