<?php
// File: view/incident_create/get_customer.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Form for retrieving a customer by email address before
// creating an incident.
?>

<main>
    <h1>Get Customer</h1>
    <p>You must enter the customer's email address to select the customer.</p>
    <form method="get" action='index.php'>
        <input type="hidden" name="action" value="login_customer">
        <input type="text" name="email" placeholder="Enter your email" value="<?= htmlspecialchars($email?? '') ?>">
            <button type="submit">Get Customer</button>
    </form>
</main>