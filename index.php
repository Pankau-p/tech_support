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

<main>
    <nav>
        <br />
        <h2>Main Menu</h2>
        <ul>
            <li><a href="controller/admin">Administrators</a></li>
            <li><a href="./controller/technician/index.php">Technicians</a></li>
            <li><a href="controller/product_register">Customers</a></li>
        </ul>
    </nav>
</main>
<?php include 'view/shared/footer.php'; ?>