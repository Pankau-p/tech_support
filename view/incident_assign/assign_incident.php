<?php
// File: view/incident_assign/assign_incident.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Shows the confirmation details of assigning 
// an incident to a technician.
?>
<main>
    <h1>Assign Incident</h1>
    
<form method="post" action="/Assignment_2/controller/assign_incident/index.php" id="assign_incident">
        <table id="no_border">
            <tr>
                <td><label>Customer:</label></td>
                <td><?php echo htmlspecialchars($incident['firstName'] . " " . $incident['lastName']); ?></td>
            </tr>
            <tr>
                <td><label>Product:</label></td>
                <td><?php echo htmlspecialchars($incident['productCode']); ?></td>
            </tr>
            <tr>
                <td><label>Technician:</label></td>
                <td><?php echo htmlspecialchars($technician['firstName'] . " " . $technician['lastName']); ?></td>
            </tr>
        </table>
        <br />
        <input type="hidden" name="action" value="assign_incident" />
        <input type="submit" value="Assign Incident" />
    </form>
</main>