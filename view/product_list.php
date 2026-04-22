<main>
    <h1>Product List</h1>

    <table border='1'>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Version</th>
            <th>Release Date</th>
            <th></th>
        </tr>

        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo htmlspecialchars($product['productCode']); ?></td>
                <td><?php echo htmlspecialchars($product['name']); ?></td> 
                <td><?php echo htmlspecialchars($product['version']); ?></td> 
                <td><?php echo htmlspecialchars($product['releaseDate']); ?></td> 

                <td>
                    <form method="post" action='./../product_manager/index.php'>
                        <input type="hidden" name="action" 
                               value="delete_product">
                        <input type="hidden" name="product_code" 
                               value="<?php echo $product['productCode']; ?>">
                               <button type="submit">Delete</button>
                    </form>
            </tr>
            <?php endforeach; ?>
    </table>
    <p><a href="?action=show_add_form">Add Product</a></p>

</main>