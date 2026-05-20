<?php
// File: view/tech/select_incident.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Allows a logged in technician to 
// select an incident.
?>
<main>
    <h1>Select Incident</h1>
    
    <p>There are no open incidents for this technician</p>
    
    <a href="/Assignment_2/controller/technician/index.php">Refresh List of Incidents</a>

    <p>You are logged in as: <?php echo htmlspecialchars($_SESSION['tech_email']); ?></p>
    
    <form method="post" action="/Assignment_2/controller/technician/index.php">
        <input type="hidden" name="action" value="tech_logout">
        <button type="submit">Logout</button>
    </form>
</main>