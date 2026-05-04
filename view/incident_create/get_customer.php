<main>
    <h1>Get Customer</h1>
    <p>You must enter the customer's email address to select the customer.</p>
    <form method="get" action='index.php'>
        <input type="hidden" name="action" value="login_customer">
        <input type="text" name="email" placeholder="Enter your email" value="<?= htmlspecialchars($email?? '') ?>">
            <button type="submit">Get Customer</button>
    </form>
</main>