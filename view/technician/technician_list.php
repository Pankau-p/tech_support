<?php
// File: view/technician/technician_list.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Displays a list of all technicians with options to add
// or delete a technician.
?>
<main>
    <h1>Technician List</h1>

    <table border='1'>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Password</th>
            <th></th>
        </tr>

        <?php foreach ($technicians as $technician): ?>
            <tr>
                <td><?php echo htmlspecialchars($technician['firstName']); ?></td>
                <td><?php echo htmlspecialchars($technician['lastName']); ?></td> 
                <td><?php echo htmlspecialchars($technician['email']); ?></td> 
                <td><?php echo htmlspecialchars($technician['phone']); ?></td> 
                <td><?php echo htmlspecialchars($technician['password']); ?></td> 

                <td>
                    <form method="post" action='./../controller/technician_manager/index.php'>
                        <input type="hidden" name="action" 
                               value="delete_technician">
                        <input type="hidden" name="tech_id" 
                               value="<?php echo $technician['techID']; ?>">
                               <button type="submit">Delete</button>
                    </form>
            </tr>
            <?php endforeach; ?>
    </table>
    
    <p><a href="?action=show_add_technician_form">Add Technician</a></p>

</main>