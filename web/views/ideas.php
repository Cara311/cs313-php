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


<div class="container">
<h1 class="giftIdeas">Gift Ideas</h1>
<div class="container">
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
    <ul>
      <?php  
      foreach ($gifts as $row)
      {
      echo "<li  class='idealist'><a href='ideaDetails.php?id={$row['id']}' <strong>" . $row['gift_name'] . '</strong></a></li>';
      }
      ?>
      <li><a href="gift.php" class="btn btn-info bottombtn">Return to Search</a> </li>
    </ul>
      
    </div>
    <div class="col-sm-4"></div>

</div>


<?php include '../common/footer.php'; ?>