<?php
require_once 'connections.php';
$db = db_connect();

//Check for valid input
function validateInput($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//Search for gifts based on interests
function searchQuery($name, $db) { 
    $stmt = $db->prepare('SELECT g.id, g.gift_name, g.price, g.description, g.image_name, g.gift_link, i.interest FROM gifts AS g JOIN interests i ON i.id = g.interests_id WHERE i.interest = :name');
    //$stmt = $db->prepare('SELECT * FROM gifts AS g JOIN interests AS i ON g.interests_id = i.id WHERE i.interest = :name');
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->execute();
    $gift = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $gift;
    }

//Display info for specific idea  
function displayQuery($id, $db) {

    $stmt = $db->prepare('SELECT * FROM gifts WHERE id = :id');
    //$name= '$name';
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $idea = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $idea;
    }   

    function search_interests($db) {
        
        $statement = $db->query('SELECT interest FROM interests');
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }    

    //Function handles site registrations
function regUser($clientFirstname, $clientLastname, $clientEmail, $clientLevel, $clientPassword){
 
 // Create a connection object using the connection function
 //$db = db_connect();
 
 // The SQL statement
 $sql = 'INSERT INTO users (clientFirstname, clientLastname,clientEmail, clientLevel, clientPassword )
     VALUES (:clientFirstname, :clientLastname, :clientEmail, :clientLevel, :clientPassword)';
 
 // Create the prepared statement using the connection
 $stmt = $db->prepare($sql);
 
 $stmt->bindValue(':clientFirstname', $clientFirstname, PDO::PARAM_STR);
 $stmt->bindValue(':clientLastname', $clientLastname, PDO::PARAM_STR);
 $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
 $stmt->bindValue(':clientLevel', $clientLevel, PDO::PARAM_INT);
 $stmt->bindValue(':clientPassword', $clientPassword, PDO::PARAM_STR);
 
 
 // Insert the data
 $stmt->execute();
 
 // Ask how many rows changed as a result of our insert
 $rowsChanged = $stmt->rowCount();
 
 // Close the database interaction
 $stmt->closeCursor();
 
 // Return the rows changed
 return $rowsChanged;
}

// Check for an existing email address
function checkExistingEmail($clientEmail) {
    //$db = db_connect();
    $sql = 'SELECT clientEmail FROM users WHERE clientEmail = :email';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);
    $stmt->execute();
    $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
    $stmt->closeCursor();
    if(empty($matchEmail)){
     return 0;
    } else {
     return 1;
    }
   }

    // Function checks email to ensure the email is valid.
function checkEmail($clientEmail){
    $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
    return $valEmail;
   }
   
   // Check the password for a minimum of 8 characters,
    // at least one 1 capital letter, at least 1 number and
    // at least 1 special character
   function checkPassword($clientPassword){
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';
    return preg_match($pattern, $clientPassword);
   }


   // Get client data based on an email address
function getClient($clientEmail){
    //$db = db_connect();
    $sql = 'SELECT clientId, clientFirstname, clientLastname, clientEmail, clientLevel, clientPassword 
            FROM users
            WHERE clientEmail = :email';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);
    $stmt->execute();
    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $clientData;
   }

//function to check if email is valid

//function to build detailed product display

//function to build list of interests options

//Show a list of gift ideas
//Search for gift idea by interest
//Save a gift idea
//Show detailed gift idea

?>