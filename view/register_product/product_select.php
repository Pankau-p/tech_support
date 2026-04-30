<main>
    <h1>Register Product</h1>

    <label>Customer: </label>
    <input type="text" name="name" value="<?= htmlspecialchars($customer['firstName'] . ' ' . $customer['lastName'] ?? '') ?>">
    <?php if (!empty($errors['firstName'])): ?>
    <span style="color: red;"><?= $errors['firstName'] ?></span>
    <?php endif; ?>
    <br>

    <label>Product:</label>
    <select name="product_code">
        <?php foreach ($productCode as $product) : ?>
            <option value="<?= $product['productCode'] ?>"
                <?= $product['productCode'] ?> - <?= $product['productDescription'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br>
</main>