<?php include '../common/header.php'; ?>
<?php
session_start();
//Get the database info 
require "../library/connections.php";
require "../library/functions.php";
$db = db_connect();
$interests = search_interests($db);

// If the page loads as a POST request, look for this variable, and if it is set
if(isset($_POST['clientFirstname'])) {
    // Validate & sanitize the input
    $name = validateInput($_POST['clientFirstname']);
    // Now run the query to find the text in the database, and then save the results as a variable
    $_SESSION["clientFirstname"] = $name;
    }

?>


<main>
    <h1 class="giftIdeas">Gift Ideas</h1>
    <hr>
    
    <div class="container">
        <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-4">
            <h3>Search For Gift Ideas By Interest</h3>
            <form method='post' action='ideas.php'>
            <select id="ioptions" name="interest">
                <option selected="selected">Choose an Interest</option>
                <?php
                foreach ($interests as $option)
                {
                    echo "<option value='{$option[interest]}'>" . $option['interest'] . "</option>";
                }
                ?>          
            </select> 
                <button type='submit' class='btn btn-info'>Search</button>
            </form>
        </div>
        <div class="col-sm-4">
            <h3>Possible Gift Ideas</h3>
            <?php  
                foreach ($db->query('SELECT gifts.gift_name FROM gifts') as $row)
                {
                  echo $row['gift_name'];
                  echo '<br/>';
                }
            ?>
        </div>
        <div class="col-sm-2"></div>
        </div>
        <?php include '../common/client.php'; ?>
    </div>
    
</main>
  
  
<?php include '../common/footer.php'; ?>