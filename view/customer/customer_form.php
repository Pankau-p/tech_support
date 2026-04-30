<main>
    <h1><?= isset($customer['customerID']) ? 'View/Update Customer' : 'Add Customer' ?></h1>
    <form action="../customer_manager/index.php" method="post" id="add_form">

        <?php if (isset($customer['customerID'])): ?>
            <input type="hidden" name="action" value="update_customer">
            <input type="hidden" name="customer_id" value="<?= $customer['customerID'] ?>">
        <?php else: ?>
            <input type="hidden" name="action" value="add_customer">
        <?php endif; ?>

        <label>First Name</label>
        <input type="text" name="first_name" value="<?= htmlspecialchars($customer['firstName'] ?? '') ?>">
        <?php if (!empty($errors['firstName'])): ?>
        <span style="color: red;"><?= $errors['firstName'] ?></span>
        <?php endif; ?>
        <br>
        <label>Last Name</label>
        <input type="text" name="last_name" value="<?= htmlspecialchars($customer['lastName'] ?? '') ?>">
        <?php if (!empty($errors['lastName'])): ?>
        <span style="color: red;"><?= $errors['lastName'] ?></span>
        <?php endif; ?>
        <br>
        <label>Address</label>
        <input type="text" name="address" value="<?= htmlspecialchars($customer['address'] ?? '') ?>">
        <?php if (!empty($errors['address'])): ?>
        <span style="color: red;"><?= $errors['address'] ?></span>
        <?php endif; ?>
        <br>
        <label>City</label>
        <input type="text" name="city" value="<?= htmlspecialchars($customer['city'] ?? '') ?>">
        <?php if (!empty($errors['city'])): ?>
        <span style="color: red;"><?= $errors['city'] ?></span>
        <?php endif; ?>
        <br>
        <label>State:</label>
        <input type="text" name="state" value="<?= htmlspecialchars($customer['state'] ?? '') ?>">
        <?php if (!empty($errors['state'])): ?>
        <span style="color: red;"><?= $errors['state'] ?></span>
        <?php endif; ?>
        <br>
        <label>Postal Code:</label>
        <input type="text" name="postal_code" value="<?= htmlspecialchars($customer['postalCode'] ?? '') ?>">
        <?php if (!empty($errors['postalCode'])): ?>
        <span style="color: red;"><?= $errors['postalCode'] ?></span>
        <?php endif; ?>
        <br>
        <label>Country Code:</label>
        <select name="country_code">
            <?php foreach ($countries as $country) : ?>
                <option value="<?= $country['countryCode'] ?>"
                    <?php if (($customer['countryCode'] ?? '') === $country['countryCode']) echo 'selected'; ?>>
                    <?= $country['countryName'] ?>
                </option>
                <?php endforeach; ?>
        </select>
        <br>
        <label>Phone</label>
        <input type="text" name="phone" value="<?= htmlspecialchars($customer['phone'] ?? '') ?>">
        <?php if (!empty($errors['phone'])): ?>
        <span style="color: red;"><?= $errors['phone'] ?></span>
        <?php endif; ?>
        <br>
        <label>Email:</label>
        <input type="text" name="email" value="<?= htmlspecialchars($customer['email'] ?? '') ?>">
        <?php if (!empty($errors['email'])): ?>
        <span style="color: red;"><?= $errors['email'] ?></span>
        <?php endif; ?>
        <br>
        <label>Password:</label>
        <input type="password" name="password" value="<?= htmlspecialchars($customer['password'] ?? '') ?>">
        <?php if (!empty($errors['password'])): ?>
        <span style="color: red;"><?= $errors['password'] ?></span>
        <?php endif; ?>
        <br>
        <input type="submit" value="<?= isset($customer['customerID']) ? 'Update Customer' : 'Add Customer' ?>">
    </form>

    <p><a href="../customer_manager/index.php?action=list_customers">View Customer List</a></p>
</main>