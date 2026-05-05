<?php

require_once('../../model/database.php');
require_once('../../model/customer_db.php');

$action = $_POST['action'] ?? $_GET['action'] ?? '';

if ($action === 'login_customer') {
    $customer = null;
    $email = $_GET['email'] ?? '';

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "Invalid Email.";
    } else {
        $customer = get_customer_by_email($db, $email);
        if (!$customer) {
            $error = "Email not found.";
        }
    }

    if ($customer){
    $products = get_products($db);
    include('../../view/shared/header.php');
    include('../../view/incident_create/create_incident.php');
    include('../../view/shared/footer.php');
    } else {
        include('../../view/shared/header.php');
        include('../../view/create_incident/get_customer.php');
        include('../../view/shared/footer.php');      
    }
} elseif ($action === 'create_incident'){
    $product_code = $_POST['product_code'] ?? '';
    $customer_id = $_POST['customer_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    try{
        create_incident($db, $customer_id, $product_code, $title, $description);
        $success = "The incident was added to our database";

        include('../../view/shared/header.php');
        include('../../view/create_incident/success.php');
        include('../../view/shared/footer.php');

    } catch (Exception $e) {
        $error = "There was an error in creating this incident.";
        $customer = get_customer($db, $customer_id);
        $products = get_products($db);

        include('../../view/shared/header.php');
        include('../../view/incident_create/create_incident.php');
        include('../../view/shared/footer.php');
    }
} else {
    include('../../view/shared/header.php');
    include('../../view/create_incident/get_customer.php');
    include('../../view/shared/footer.php');  
}

?>