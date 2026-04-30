<main>
    <h1>Customer Login</h1>

    <br>
    <p>You mut login before you can register a product.</p>
    <form method="get" action='index.php'>
        <input type="hidden" name="action" value="login_customer">
        <input type="text" name="email" placeholder="Enter your email" value="<?= htmlspecialchars($email?? '') ?>">
            <button type="submit">Login</button>
    </form>
</main>