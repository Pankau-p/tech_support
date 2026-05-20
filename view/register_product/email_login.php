<?php
// File: view/register_product/email_login.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Form for authenticating a customer by email address
// before registering a product.
?>

<main>
    <h1>Customer Login</h1>
    <p>You must login before you can register a product.</p>
    <form id="add_form" method="post" action='index.php'>
        <label>Email: </label>
        <input type="email" name="email">        
        <br>
        
        <label>Password: </label>
        <input type="password" name="password">        
        <br>

        <input type="hidden" name="action" value="login_customer">
        <button type="submit">Login</button>
    </form>
</main>