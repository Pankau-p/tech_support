        <?php
// Get all technicians
function get_technicians($db){
    $query = 'SELECT * FROM technicians ORDER BY techID';
    $statement = $db->prepare($query);
    $statement->execute();
    $technicians = $statement->fetchAll();
    $statement->closeCursor();
    return $technicians;
}

// Delete one technician with technician ID
function delete_technician($db, $tech_id) {
    $query = 'DELETE FROM technicians
              WHERE techID = :tech_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':tech_id', $tech_id);
    $success = $statement->execute();
    $statement->closeCursor();
    return $success;              
}

// Add a technician with tech ID, firstName, lastName, 
// email, phone and password
function add_technician($db, $tech_id, $first_name, $last_name, 
                        $email, $phone, $password) {

    $query = 'INSERT INTO technicians (techID, firstName, lastName, 
              email, phone, password)
              VALUES
              (:tech_id, :first_name, :last_name, :email, :phone, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':tech_id', $tech_id);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':password', $password);
    $success = $statement->execute();
    $statement->closeCursor();
    return $success;
}
?>
