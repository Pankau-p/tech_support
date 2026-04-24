<main>
    <h1>Add Customer</h1>
    <form action="index.php" method="post" id="customer_form">
        <input type="hidden" name="action" value="add_customer">

        <label>Customer ID:</label>
        <input type="text" name="customer_id" />
        <br>

        <label>First Name:</label>
        <input type="text" name="first_name" />
        <br>

        <label>Last Name</label>
        <input type="text" name="last_name" />
        <br>

        <label>Address</label>
        <input type="text" name="address" />
        <br>

        <label>City</label>
        <input type="text" name="city" />
        <br>

        <label>State</label>
        <input type="text" name="state" />
        <br>

        <label>Postal Code</label>
        <input type="text" name="postal_code" />
        <br>

        <label>Country Code</label>
        <input type="input" name="country_code" />
        <br>
        
        <label>Phone</label>
        <input type="text" name="phone" />
        <br>

        <label>Email</label>
        <input type="text" name="email" />
        <br>

        <label>Password</label>
        <input type="password" name="password" />
        <br>        

        <label>&nbsp;</label>
        <input type="submit" value="Add Customer" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_customers">View Customer List</a>
    </p>

</main>