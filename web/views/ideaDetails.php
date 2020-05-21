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
   print_r($idea);
 
   }
?>

<?php  

foreach ($idea as $row)

{

  echo '<strong>' . $row['gift_name'] .' ' . $row['description'] .':' . $row['image_name'] . '</strong>';

  echo ' - "' . $row['price'] .'"';

  echo '<br/><br/>';

}


?>



<?php include '../common/footer.php'; ?>