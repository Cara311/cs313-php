<?php
require_once 'connections.php';
//$db = db_connect();

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
    
    //Display gifts user has saved
    function listideas($id) {
        $db = db_connect();
        $stmt = $db->prepare('SELECT g.id, g.gift_name, i.ideas_id FROM gifts AS g JOIN ideas i ON i.gift_id = g.id WHERE i.user_id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }



    //Function handles site registrations
function regUser($clientFirstname, $clientLastname, $clientEmail, $clientLevel, $clientPassword){
 
 // Create a connection object using the connection function
 $db = db_connect();
 
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
    $db = db_connect();
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
    $db = db_connect();
    $sql = 'SELECT id, clientFirstname, clientLastname, clientEmail, clientLevel, clientPassword 
            FROM users
            WHERE clientEmail = :email';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);
    $stmt->execute();
    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $clientData;
   }


   //Add gifts to idea list
   function newIdea($giftId, $userId) {
    $db = db_connect();
    $sql = 'INSERT INTO ideas (gift_id, user_id)
     VALUES (:giftId, :userId)';

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':giftId', $giftId, PDO::PARAM_STR); 
    $stmt->bindValue(':userId', $userId, PDO::PARAM_STR); 

    // Insert the data
    $stmt->execute();
 
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
 
    // Close the database interaction
    $stmt->closeCursor();
 
    return $rowsChanged;
   }


   //Delete Idea From List
   function deleteProduct($ideaid) {
    $db = db_connect();
    $sql = 'DELETE FROM ideas WHERE ideas_id = :ideaid';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':ideaid', $ideaid, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
   }


 //Admin can add gift to gift ideas
 //Function adds new product
function newGift($giftname, $price, $description, $imagename, $interestid){
 
    $db = db_connect();

    $sql = 'INSERT INTO gifts (gift_name, price, description, image_name, interests_id)
        VALUES (:giftname, :price, :description, :imagename, :interestid)';

    $stmt = $db->prepare($sql);

    $stmt->bindValue(':giftname', $giftname, PDO::PARAM_STR); 
    $stmt->bindValue(':price', $price, PDO::PARAM_STR);
    $stmt->bindValue(':description', $description, PDO::PARAM_STR);
    $stmt->bindValue(':imagename', $imagename, PDO::PARAM_STR);
    $stmt->bindValue(':interestid', $interestid, PDO::PARAM_INT);
    
    $stmt->execute();
    
    $rowsChanged = $stmt->rowCount();
 
    $stmt->closeCursor();
 
    return $rowsChanged;
   }  


   //Function to change client password
   function changePass($clientPassword, $clientId) {
    $db = db_connect();

    $sql = 'UPDATE users SET clientPassword = :clientPassword WHERE id = :clientId'; 
 
    $stmt = $db->prepare($sql);
 
    $stmt->bindValue(':clientPassword', $clientPassword, PDO::PARAM_STR);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);

     $stmt->execute(); 

    $rowsChanged = $stmt->rowCount();

     $stmt->closeCursor();
 
    return $rowsChanged;
   }

   //Function to get gift info based on gift id
   function getDetails($id, $db) {
    $stmt = $db->prepare('SELECT g.id, g.gift_name, g.price, g.description, g.image_name FROM gifts AS g WHERE g.id = :id');
    //$name= '$name';
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $idea = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $idea;
   }
