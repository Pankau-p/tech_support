<?php
// Get all customers
function get_customers($db){
    $query = 'SELECT * FROM customers ORDER BY lastName';
    $statement = $db->prepare($query);
    $statement->execute();
    $customers = $statement->fetchAll();
    $statement->closeCursor();
    return $customers;
}

// Select one customer with customer ID
function get_customer($db, $customer_id) {
    $query = 'SELECT * FROM customers
              WHERE customerID = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();
    return $customer;              
}

// Search for a customer with lastName
function search_customers($db, $lastName) {
    $query = 'SELECT * FROM customers
              WHERE lastName LIKE :lastName';
    $statement = $db->prepare($query);
    $statement->bindValue(':lastName', $lastName);
    $statement->execute();
    $customers = $statement->fetchAll();
    $statement->closeCursor();
    return $customers;
}

function get_countries($db) {
    $query = 'SELECT * FROM countries';
    $statement = $db->prepare($query);
    $statement->execute();
    $countries = $statement->fetchAll();
    $statement->closeCursor();
    return $countries;
}

// Add a customer with firstName, lastName, 
// address, city, state, postalCode, countryCode, phone, email
// and password
function add_customer($db, $firstName, $lastName, 
                      $address, $city, $state, $postalCode, $countryCode,
                      $phone, $email, $password) {

    $query = 'INSERT INTO customers (firstName, lastName, 
              address, city, state, postalCode, countryCode, phone, 
              email, password)
              VALUES
              (:firstName, :lastName, :address, :city, 
               :state, :postalCode, :countryCode, :phone, :email, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
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

function update_customer($db, $customerID, $firstName, $lastName, 
                         $address, $city, $state, $postalCode, $countryCode,
                         $phone, $email, $password) {

    $query = 'UPDATE customers
              SET firstName = :firstName,
                  lastName = :lastName,
                  address = :address,
                  city = :city,
                  state = :state,
                  postalCode = :postalCode,
                  countryCode = :countryCode,
                  phone = :phone,
                  email = :email,
                  password = :password
              WHERE customerID = :customerID';

    $statement = $db->prepare($query);

    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':postalCode', $postalCode);
    $statement->bindValue(':countryCode', $countryCode);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':customerID', $customerID);

    return $statement->execute();

}


?>
