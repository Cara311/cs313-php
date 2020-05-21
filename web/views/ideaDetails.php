<?php include '../common/header.php'; ?>
<?php
session_start();
//Get the database info 
require "../library/connections.php";
require "../library/functions.php";
$db = db_connect();
 
     // If the page loads as a GET request, look for this variable, and if it is set
 if(isset($_GET['id'])) {
     // Validate & sanitize the input
     $searchText = validateInput($_GET['id']);
     // Now run the query to find the text in the database, and then save the results as a variable
     $idea = displayQuery($searchText, $db);
   }
?>

<div class="container">
   <div class="card">
<?php  

foreach ($idea as $row)
{
    echo "<img class='card-img-top' src='../images/{$row[image_name]}' alt='{$row[gift_name]}' style='width:100%'>";
    echo "<div class='card-body'>";
    echo "<h4 class='card-title'>" . $row['gift_name'] . "</h4>";
    echo "<p class='card-text'>" . $row['decription'] . "</p>";
    echo "<p class='card-text price'>" . $row['price'] . "</p>";
    echo "</div>";

}
?>
    </div>

</div>

<?php include '../common/footer.php'; ?>