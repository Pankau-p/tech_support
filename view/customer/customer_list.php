<main>
    <h1>Customer Search</h1>

    <table border='1'>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>City</th>
            <th></th>
        </tr>

        <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?php echo htmlspecialchars($customer['firstName'] . ' ' . $customer['lastName']); ?></td>                
                <td><?php echo htmlspecialchars($customer['email']); ?></td> 
                <td><?php echo htmlspecialchars($customer['city']); ?></td> 
                <td>
                    <form method="post" action='./../../controller/customer_manager/index.php'>
                        <input type="hidden" name="action" 
                               value="select_customer">
                        <input type="hidden" name="customer_id" 
                               value="<?php echo $customer['customerID']; ?>">
                               <button type="submit">Select</button>
                    </form>
            </tr>
            <?php endforeach; ?>
    </table>
    
    <p><a href="?action=show_add_customer">Add Customer</a></p>

</main>