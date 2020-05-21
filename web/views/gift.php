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
    <div class="container">
        <div class="row">
        <div class="col-sm-4" style="background-color:lavender;">
            <form method='post' action='ideas.php'>
                <input type='text' name='interest'>
                <button type='submit'>Search</button>
            </form>
        </div>
        <div class="col-sm-8" style="background-color:lavenderblush;">
            <?php  
                foreach ($db->query('SELECT gifts.gift_name FROM gifts') as $row)
                {
                  echo 'Idea: ' . $row['gift_name'];
                  echo '<br/>';
                }
            ?>
        </div>
  </div>
    </div>
    
    


</main>
  
  
<?php include '../common/footer.php'; ?>