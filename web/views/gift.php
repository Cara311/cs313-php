<?php include '../common/header.php'; ?>
<?php
session_start();
//Get the database info 
require "../library/connections.php";
require "../library/functions.php";
$db = db_connect();
$interests = search_interests($db);

?>


<main>
    <h1>Gift Ideas</h1>
    <div class="container">
        <div class="row">
        <div class="col-sm-6">
            <h3>Search For Gift Ideas</h3>
            <h4>Select an Interest</h4>
            <form method='post' action='ideas.php'>
            <select id="cars" name="cars">
                <?php
                foreach ($interests as $option)
                {
                    echo "<option value='{$option[name]}'>" . $option['name'] . "</option>";
                }

                ?>          
            </select> 
                <input type='text' name='interest'>
                <button type='submit'>Search</button>
            </form>
        </div>
        <div class="col-sm-6">
            <h3>Available Gift Ideas</h3>
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