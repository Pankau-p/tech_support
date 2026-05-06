<?php
// File: view/incident_create/create_incident.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Form for creating a new incident. Displays customer name,
// registered products dropdown, title and description fields.
?>

<main>
    <h1>Create Incident</h1>
    <?php if (!empty($error)): ?>
    <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>
    <form method="post" action="index.php" id="add_form">
        <label>Customer: </label>
        <input type="text" value="<?= htmlspecialchars($customer['firstName'] . ' ' . $customer['lastName']) ?>" readonly>
        <br>

        <label>Product:</label>
        <select name="product_code">
            <?php foreach ($products as $product) : ?>
                <option value="<?= $product['productCode'] ?>">
                    <?= $product['name'] ?> 
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Title:</label>
        <input type='text' name="title">
        <br>


        <label>Description:</label>
        <input type='text' name="description">
        <br>
    
        <label></label>
        <input type="hidden" name="action" value="create_incident" />
        <input type="hidden" name="customer_id" value="<?= $customer['customerID']  ?>">
        <input type="submit" value="Create Incident" />
    </form>
</main>