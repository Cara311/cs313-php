<?php include '../common/header.php'; ?>
<?php
session_start();
//Get the database info 
require "../library/connections.php";
require "../library/functions.php";
$db = db_connect();

// If the page loads as a POST request, look for this variable, and if it is set
if(isset($_POST['interest'])) {
// Validate & sanitize the input
$searchText = validateInput($_POST['interest']);
// Now run the query to find the text in the database, and then save the results as a variable
$gifts = searchQuery($searchText, $db);
}
?>

<h1 class="giftIdeas">Gift Ideas</h1>
<hr>
<div class="container">
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4" id="ideaslist">
      <div class='card'>
        <div class='card-body'>
          <ul>
            <?php  
              foreach ($gifts as $row)
              {
               echo "<li class='idealist card-text'><a href='ideaDetails.php?id={$row['id']}' <strong>" . $row['gift_name'] . '</strong></a></li>';
              }
            ?>
          </ul>
        </div>
        <a href="gift.php" class="btn btn-info bottombtn">Return to Search</a> 
      </div>  
      
    </div>
    <div class="col-sm-4"></div>
  </div>
  <?php include '../common/client.php'; ?>
</div>


<?php include '../common/footer.php'; ?>