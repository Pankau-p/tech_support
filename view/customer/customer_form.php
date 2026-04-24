<main>
    <h1><?= isset($customer['customerID']) ? 'Edit Customer' : 'Add Customer' ?></h1>
    <form action="../customer_manager/index.php" method="post" id="customer_form">

        <?php if (isset($customer['customerID'])): ?>
            <input type="hidden" name="action" value="update_customer">
            <input type="hidden" name="customer_id" value="<?= $customer['customerID'] ?>">
        <?php else: ?>
            <input type="hidden" name="action" value="add_customer">
        <?php endif; ?>

        <label>First Name</label>
        <input type="text" name="first_name" value="<?= htmlspecialchars($customer['firstName'] ?? '') ?>">
        <br>
        <label>Last Name</label>
        <input type="text" name="last_name" value="<?= htmlspecialchars($customer['lastName'] ?? '') ?>">
        <br>
        <label>Address</label>
        <input type="text" name="address" value="<?= htmlspecialchars($customer['address'] ?? '') ?>">
        <br>
        <label>City</label>
        <input type="text" name="city" value="<?= htmlspecialchars($customer['city'] ?? '') ?>">
        <br>
        <label>State:</label>
        <input type="text" name="state" value="<?= htmlspecialchars($customer['state'] ?? '') ?>">
        <br>
        <label>Postal Code:</label>
        <input type="text" name="postal_code" value="<?= htmlspecialchars($customer['postalCode'] ?? '') ?>">
        <br>
        <label>Country Code:</label>
        <select name="country_code">
        </select>
        <br>
        <label>Phone</label>
        <input type="text" name="phone" value="<?= htmlspecialchars($customer['phone'] ?? '') ?>">
        <br>
        <label>Email:</label>
        <input type="text" name="email" value="<?= htmlspecialchars($customer['email'] ?? '') ?>">
        <br>
        <label>Password:</label>
        <input type="password" name="password" value="<?= htmlspecialchars($customer['password'] ?? '') ?>">
        <br>
        <input type="submit" value="<?= isset($customer['customerID']) ? 'Update Customer' : 'Add Customer' ?>">
    </form>

    <p><a href="../customer_manager/index.php?action=list_customers">View Customer List</a></p>
</main>