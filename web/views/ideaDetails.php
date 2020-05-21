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

   //Add items to list
   if(filter_input(INPUT_POST, 'add_to_list')){
   
        //Call function to save item to database

    }
?>

<div class="container">
   <div class="card">

   
<?php  

foreach ($idea as $row)
{
    //echo "<form method='post' action='htmlspecialchars($_SERVER['PHP_SELF'])?action=add&id=1'>";
    echo "<img class='card-img-top' src='../images/{$row[image_name]}' alt='{$row[gift_name]}'>";
    echo "<div class='card-body'>";
    echo "<h4 class='card-title'>" . $row['gift_name'] . "</h4>";
    echo "<p class='card-text'>" . $row['description'] . "</p>";
    echo "<p class='card-text price'>" . $row['price'] . "</p>";
    echo " <input type='submit' name='add_to_list' class='btn btn-info addbtn' id='{$row[id]}' value='Save to Idea List'>";
    echo "</div>";
   // echo "</form>"
}
?>
        <a href="#" class="btn btn-primary">View List</a>
    </div>

</div>

<?php include '../common/footer.php'; ?>