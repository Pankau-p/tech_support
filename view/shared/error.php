<?php
// File: view/shared/error.php
//
// Author: 
// Course: COMP 3541 - Web Programming
// Date: 2026-05-05
//
// Assignment 2
//
// Description: Displays error messages to the user when an action
// fails or invalid input is detected.
?>
<?php if (!empty($error)) : ?>
    <div style="color: red; margin: 10px 0;">
        <?php echo $error; ?>
    </div>
<?php endif; ?>