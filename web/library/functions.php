<?php

//Check for valid input
function validateInput($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//Search for gifts based on interests
function searchQuery($name, $db) { 
    $stmt = $db->prepare('SELECT * FROM gifts AS g JOIN interests AS i ON g.interests_id = i.id WHERE i.interest = :name');
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->execute();
    $gift = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $gift;
    }

//function to check if email is valid

//function to build detailed product display

//function to build list of interests options

?>