<?php

require_once('../../model/database.php');
require_once('../../model/customer_db.php');

$error = null;

$action = $_POST['action'] ?? $_GET['action'] ?? '';

if ($action === 'select_customer') {
    $customer_id = $_POST['customer_id'] ?? null;
    if ($customer_id) {
        $customer = get_customer($db, $customer_id);
        include('../../view/customer/customer_form.php');        
        exit;
    } else {
        $error  = "No customer selected.";
    }
}


// Refresh state to get updates
$customers = get_customers($db);


// render page
include('../../view/shared/header.php');
include('../../view/shared/error.php');
include('../../view/customer/customer_list.php');
include('../../view/shared/footer.php');
?>