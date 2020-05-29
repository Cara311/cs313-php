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
    <?php include '../common/message.php'; ?>
    <div class="row">
        <div class="col-sm-4"></div>
        <?php
foreach ($idea as $row)
{
    //echo "<form method='post' action='htmlspecialchars($_SERVER['PHP_SELF'])?action=add&id=1'>";
    echo "<div class='col-sm-4'>";
    echo "<div class='card'>";
    echo "<img class='card-img-top' src='../images/{$row[image_name]}' alt='{$row[gift_name]}'>";
    echo "<div class='card-body'>";
    echo "<h4 class='card-title'>" . $row['gift_name'] . "</h4>";
    echo "<form action='../ideas/index.php' method='POST'>";
    echo "<input type='hidden' name='action' value='addtolist'>";
    echo "<p class='card-text'>" . $row['description'] . "</p>";
    echo "<p class='card-text price'>" . $row['price'] . "</p>";
    //Only have these button show up if someone has signed up for an account.
    if(isset($_SESSION['loggedin'])){
    $clientId = $_SESSION['clientData']['id'];
    echo "<input type='hidden' name='user_id' value='$clientId'>";
    echo "<input type='hidden' name='gift_id' value='{$row[id]}'>";
    echo "<input type='submit' name='submit' class='btn btn-info' value='Add to Ideas'>";
    echo "<br>";
    echo "<br>";
    echo "<a href='../ideas/index.php?action=viewlist' class='btn btn-info'>View Idea List</a>";
    echo "</div>";
    }
    echo "<a href='gift.php' class='btn btn-info'>Go Back to Idea Search</a>";
    echo "</div>";
   echo "</form>";
}
?>
        </div>
        <div class="col-sm-4"></div>
    </div>
    <?php include '../common/client.php'; ?>
</div>

<?php include '../common/footer.php'; ?>