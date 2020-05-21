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
    }    

//function to check if email is valid

//function to build detailed product display



//function to build list of interests options

//Show a list of gift ideas
//Search for gift idea by interest
//Save a gift idea
//Show detailed gift idea

?>