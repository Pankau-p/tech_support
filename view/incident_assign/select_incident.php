<?php
// File: view/incident_assign/select_incident.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Displays a list of all incident. Each has an option to
// select the incident
?>
<main>
    <h1>Select Incident</h1>

    <table border='1'>
        <tr>
            <th>Customer</th>
            <th>Product</th>
            <th>Date Opened</th>
            <th>Title</th>
            <th>Description</th>
            <th></th>
        </tr>
        <?php foreach ($unassigned_incidents as $incident): ?>
            <tr>
                <td><?php echo htmlspecialchars($incident['firstName'] . " " . $incident['lastName']); ?></td>
                <td><?php echo htmlspecialchars($incident['productCode']); ?></td>
                <td><?php echo date('Y-m-d', strtotime($incident['dateOpened'])); ?></td>
                <td><?php echo htmlspecialchars($incident['title']); ?></td>
                <td><?php echo htmlspecialchars($incident['description']); ?></td>
            <td>
                <form method='post' action='index.php'>
                    <input type='hidden' name='action'
                           value='select_incident'>
                    <input type="hidden" name="incident_id"
                           value="<?php echo $incident['incidentID']; ?>">
                           <button type="submit">Select</button>
                </form>
            </td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>