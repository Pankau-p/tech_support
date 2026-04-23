<?php
// Get all customers
function get_customers($db){
    $query = 'SELECT * FROM customers ORDER BY customerID';
    $statement = $db->prepare($query);
    $statement->execute();
    $customers = $statement->fetchAll();
    $statement->closeCursor();
    return $customers;
}

// Delete one customer with customer ID
function delete_customer($db, $customer_id) {
    $query = 'DELETE FROM customers
              WHERE customerID = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $success = $statement->execute();
    $statement->closeCursor();
    return $success;              
}

// Add a customer with customer ID, firstName, lastName, 
// address, city, state, postalCode, countryCode, phone, email
// and password
function add_customer($db, $customer_id, $first_name, $last_name, 
                      $address, $city, $state, $postalCode, $countryCode,
                      $phone, $email, $password) {

    $query = 'INSERT INTO customers (customerID, firstName, lastName, 
              address, city, state, postalCode, countryCode, phone, 
              email, password)
              VALUES
              (:customer_id, :first_name, :last_name, :address, :city, 
               :state, :postalCode, :countryCode, :phone, :email, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':postalCode', $postalCode);
    $statement->bindValue(':countryCode', $countryCode);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $success = $statement->execute();
    $statement->closeCursor();
    return $success;
}
?>
