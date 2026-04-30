<?php

require_once('../../model/database.php');
require_once('../../model/customer_db.php');

$error = null;

$action = $_POST['action'] ?? $_GET['action'] ?? '';

$customerID = $_POST['customer_id'] ?? '';
$firstName = $_POST['first_name'] ?? '';
$lastName = $_POST['last_name'] ?? '';
$address = $_POST['address'] ?? '';
$city = $_POST['city'] ?? '';
$state = $_POST['state'] ?? '';
$postalCode = $_POST['postal_code'] ?? '';
$countryCode = $_POST['country_code'] ?? '';
$phone = $_POST['phone'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';


if ($action === "search_customers") {

    $lastName = $_GET['lastName'] ?? '';
    // Search by lastName, allow partial matches (LIKE)
    $customers = search_customers($db, '%' . $lastName . '%');
    include('../../view/shared/header.php');
    include('../../view/customer/customer_list.php');
    include('../../view/shared/footer.php');

    } elseif ($action === 'select_customer') {
        $customer_id = $_POST['customer_id'] ?? null;
        if ($customer_id) {
            $customer = get_customer($db, $customer_id);
            $countries = get_countries($db);
            include('../../view/shared/header.php');
            include('../../view/customer/customer_form.php');
            include('../../view/shared/footer.php');
            exit;
        } else {
            $error  = "No customer selected.";
        }

    } elseif ($action === 'show_add_customer') {
        $customer = null;
        $countries = get_countries($db);
        include('../../view/shared/header.php');
        include('../../view/customer/customer_form.php');
        include('../../view/shared/footer.php');
        exit;

    } elseif ($action === 'add_customer') {

        add_customer($db, $firstName, $lastName, $address, 
                 $city, $state, $postalCode, $countryCode,
                 $phone, $email, $password);
        
        header("Location: index.php?action=list_customers");
        exit;

    } elseif ($action === 'update_customer') { 

        update_customer($db, $customerID, $firstName, $lastName, $address, 
                    $city, $state, $postalCode, $countryCode,
                    $phone, $email, $password);
        
        header("Location: index.php?action=list_customers");
        exit;

    } elseif ($action === 'list_customers') {
        // Refresh state to get updates
        $customers = get_customers($db);
        // render page
        include('../../view/shared/header.php');
        include('../../view/shared/error.php');
        include('../../view/customer/customer_list.php');
        include('../../view/shared/footer.php');

    }else {
        // Refresh state to get updates
        $customers = get_customers($db);
        // render page
        include('../../view/shared/header.php');
        include('../../view/shared/error.php');
        include('../../view/customer/customer_list.php');
        include('../../view/shared/footer.php');
}
?>