<?php include '../common/header.php'; ?>
<?php
session_start();
//Get the database info 
require "../library/dbConnect.php";
$db = get_db();

function validateInput($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function searchQuery($name, $db) { 
$stmt = $db->prepare('SELECT * FROM gifts AS g JOIN interests AS i ON g.id = i.gift_id WHERE i.interest = :name');
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->execute();
$gift = $stmt->fetchAll(PDO::FETCH_ASSOC);
return $gift;
}

// If the page loads as a POST request, look for this variable, and if it is set
if(isset($_POST['interest'])) {

echo "<h1>" . $_POST['interest'] . "</h1>";
// Validate & sanitize the input
$searchText = validateInput($_POST['interest']);
// Now run the query to find the text in the database, and then save the results as a variable
$gifts = searchQuery($searchText, $db);

print_r($giftss);
}
?>


<?php include '../common/footer.php'; ?>