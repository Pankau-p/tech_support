<?php
// File: view/admin/menu.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Displays the Admin Menu page with a logged in admin user name
// as well as the various options that an admin user has. /
// Also shows a logout button. 
?>

<main>
    <h1>Admin Menu</h1>
    <nav>
        <ul>
            <li><a href="/Assignment_2/controller/product_manager">Manage Products</a></li>
            <li><a href="/Assignment_2/controller/technician_manager">Manage Technicians</a></li>
            <li><a href="/Assignment_2/controller/customer_manager">Manage Customers</a></li>
            <li><a href="/Assignment_2/controller/create_incident">Create Incident</a></li>
            <li><a href="/Assignment_2/controller/assign_incident">Assign Incident</a></li>
            <li><a href="/Assignment_2/controller/display_incidents">Display Incidents</a></li>
        </ul>
    </nav>
    <h2>Login Status</h2>
    <p>You are logged in as <?php echo htmlspecialchars($_SESSION['admin_username']) ?></p>
    <form method="post" action='index.php'>
        <input type="hidden" name="action" value="admin_logout">
            <button type="submit">Logout</button>
    </form>
</main>