<?php
// File: view/register_product/email_login.php
// Description: Form for authenticating a customer by email address
// before registering a product.
?>

<main>
    <h1>Customer Login</h1>
    <p>You must login before you can register a product.</p>
    <form method="get" action='index.php'>
        <input type="hidden" name="action" value="login_customer">
        <input type="text" name="email" placeholder="Enter your email" value="<?= htmlspecialchars($email?? '') ?>">
            <button type="submit">Login</button>
    </form>
</main>