<main>
    <h1>Select Technician</h1>

    <table border='1'>
        <tr>
            <th>Name</th>
            <th>Open Incidents</th>
            <th></th>
        </tr>
        <?php foreach ($technicians_with_count as $technician): ?>
            <tr>
                <td><?php echo htmlspecialchars($technician['firstName'] . " " . $technician['lastName']); ?></td>
                <td><?php echo htmlspecialchars($technician['open_incidents']); ?></td>
            <td>
                <form method='post' action='/Assignment_2/controller/assign_incident/index.php'>
                    <input type='hidden' name='action'
                           value='select_technician'>
                    <input type="hidden" name="tech_id"
                           value="<?php echo $technician['techID']; ?>">
                           <button type="submit">Select</button>
                </form>
            </td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>