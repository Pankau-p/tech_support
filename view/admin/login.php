<?php
// File: view/admin/login.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Form for Basic Authentication
// Allows an admin user to login and forces the session to save
// the state unless the user logs out.
?>

<main>
    <h1>Admin Login</h1>

    <?php if (!empty($error)): ?>
    <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>

    <form id="add_form" method="post" action="index.php">
        <label>Username: </label>
        <input type="text" name="username">        
        <br>
        
        <label>Password: </label>
        <input type="password" name="password">        
        <br>
        
        <input type="hidden" name="action" value="admin_login">
        <button type="submit">Login</button>
    </form>
</main>