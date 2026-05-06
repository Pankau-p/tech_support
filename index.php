<?php
// File: index.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Main entry point for the application. Redirects users
// to the appropriate controller based on navigation.
?>

<?php include 'view/shared/header.php'; ?>
<link rel='stylesheet' href='/main.css'>
<main>
    <nav>
        
    <h2>Administrators</h2>
    <ul>
        <li><a href="controller/product_manager">Manage Products</a></li>
        <li><a href="controller/technician_manager">Manage Technicians</a></li>
        <li><a href="controller/customer_manager">Manage Customers</a></li>
        <li><a href="controller/create_incident">Create Incident</a></li>
        <li><a href="./view/shared/under_construction.php">Assign Incident</a></li>
        <li><a href="./view/shared/under_construction.php">Display Incidents</a></li>
    </ul>

    <h2>Technicians</h2>    
    <ul>
        <li><a href="./view/shared/under_construction.php">Update Incident</a></li>
    </ul>

    <h2>Customers</h2>
    <ul>
        <li><a href="controller/product_register">Register Product</a></li>
    </ul>
    
    </nav>
</section>
<?php include 'view/shared/footer.php'; ?>