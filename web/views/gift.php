<?php include '../common/header.php'; ?>
<?php
session_start();
//Get the database info 
require "../library/connections.php";
require "../library/functions.php";
$db = db_connect();
?>


<main>
    <h2>Gift Ideas</h2>
    <form method='post' action='ideas.php'>
    <input type='text' name='interest'>
    <button type='submit'>Search</button>
    </form>
    


</main>
  
  
<?php include '../common/footer.php'; ?>