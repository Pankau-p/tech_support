<?php
// File: view/shared/error.php
// Description: Displays error messages to the user when an action
// fails or invalid input is detected.
?>
<?php if (!empty($error)) : ?>
    <div style="color: red; margin: 10px 0;">
        <?php echo $error; ?>
    </div>
<?php endif; ?>