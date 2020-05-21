<?php include '../common/header.php'; ?>
<?php
session_start();
//Get the database info 
require "dbConnect.php";
$db = get_db();
}

?>


<main>
    <h2>Gift Ideas</h2>
    <form method='post' action='ideas.php'>
    <input type='text' name='interest'>
    <button type='submit'>Search</button>
    </form>
    


</main>
  
  
<?php include '../common/footer.php'; ?>