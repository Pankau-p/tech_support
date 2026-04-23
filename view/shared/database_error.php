<!DOCTYPE html>
<html>

<!-- the head section -->
<?php include 'shared/header.php'; ?>

<!-- the body section -->
<body>
    <header><h1>Sports Pro Technical Support</h1></header>

    <main>
        <h1>Database Error</h1>
        <p>There was an error connecting to the database.</p>
        <p>The database must be installed as described in the appendix.</p>
        <p>MySQL must be running as described in Readme.md.</p>
        <p>Error message: <?php echo $error_message; ?></p>
        <p>&nbsp;</p>
    </main>

<?php include 'shared/footer.php'; ?>
</body>
</html>