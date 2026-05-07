<?php
// File: view/shared/database_error.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Displays a generic error message when a database
// connection or query error occurs.
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/Assignment_2/view/shared/header.php'; ?>

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

<?php include $_SERVER['DOCUMENT_ROOT'] . '/Assignment_2/view/shared/footer.php'; ?>
</body>
</html>