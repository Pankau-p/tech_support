<?php
// File: view/product/add_product.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Form for adding a new product to the database.
?>
<main>
    <h1>Add Product</h1>
    <form action="index.php" method="post" id="add_form">
        <input type="hidden" name="action" value="add_product">

        <label>Code:</label>
        <input type="text" name="product_code" />
        <br>

        <label>Name:</label>
        <input type="text" name="name" />
        <br>

        <label>Version</label>
        <input type="text" name="version" />
        <br>

        <label>Release Date</label>
        <input type="text" name="releaseDate" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Product" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_products">View Product List</a>
    </p>

</main>