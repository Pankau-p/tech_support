<main>
    <h1>Register Product</h1>
    <form method="post" action="index.php">
        <label>Customer: </label>
        <input type="text" value="<?= htmlspecialchars($customer['firstName'] . ' ' . $customer['lastName']) ?>" readonly>
        <br>

        <label>Product:</label>
        <select name="product_code">
            <?php foreach ($products as $product) : ?>
                <option value="<?= $product['productCode'] ?>">
                    <?= $product['productCode'] ?> 
                </option>
            <?php endforeach; ?>
        </select>
        <br>
    

        <input type="hidden" name="action" value="register_product" />
        <input type="hidden" name="customer_id" value="<?= $customer['customerID']  ?>">
        <input type="submit" value="Register Product" />
    </form>
</main>