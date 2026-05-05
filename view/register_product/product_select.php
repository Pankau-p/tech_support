<?php
// File: view/register_product/product_select.php
// Description: Form for selecting a product to register. Displays
// the customer name and a dropdown of all available products.
?>
<main>
    <h1>Register Product</h1>
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
    
        <label></label>
        <input type="hidden" name="action" value="register_product" />
        <input type="hidden" name="customer_id" value="<?= $customer['customerID']  ?>">
        <input type="submit" value="Register Product" />
    </form>
</main>