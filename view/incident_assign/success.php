<?php
// File: view/incident_assign/success.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Displays a success message after an incident has been
// successfully assigned to a technican.
?>

<main>
    <h1>Assign Incident</h1>
    <p><?= htmlspecialchars($success) ?></p>
    <br />
    <a href="/Assignment_2/controller/assign_incident/index.php">Select Another Incident</a>
</main>