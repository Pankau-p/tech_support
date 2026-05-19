<?php
// File: view/display_incidents/unassigned_incidents.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Displays a list of all assigned incidents. 
?>
<main>
    <h1>Assigned Incidents</h1>
    <a href="/Assignment_2/controller/display_incidents/index.php?action=view_unassigned_incidents">View Unassigned Incidents</a>
    <table border='1'>
        <tr>
            <th>Customer</th>
            <th>Product</th>
            <th>Technician</th>
            <th>Incident</th>
        </tr>
        <?php foreach ($assigned_incidents as $incident): ?>
            <tr>
                <td><?php echo htmlspecialchars($incident['customerFirstName'] . " " . $incident['customerLastName']); ?></td>
                <td><?php echo htmlspecialchars($incident['name']); ?></td>
                <td><?php echo htmlspecialchars($incident['techFirstName'] . " " . $incident['techLastName']); ?></td>
                <td>
                    <table id="no_border">
                        <tr>
                            <td><label>ID:</label></td>
                            <td><?php echo htmlspecialchars($incident['incidentID']); ?></td>
                        </tr>
                        <tr>
                            <td><label>Opened:</label></td>
                            <td><?php echo date('Y-m-d', strtotime($incident['dateOpened'])); ?></td>
                        </tr>
                        <tr>
                            <td><label>Title:</label></td>
                            <td><?php echo htmlspecialchars($incident['title']); ?></td>
                        </tr>
                        <tr>
                            <td><label>Description:</label></td>
                            <td><?php echo htmlspecialchars($incident['description']); ?></td>

                        </tr>
                    </table>
                </td>
            </tr>
         <?php endforeach; ?>
    </table>
</main>