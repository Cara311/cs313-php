<?php include '../common/header.php'; ?>
<?php
session_destroy();
session_start();
//Get the database info 
require "../library/connections.php";
require "../library/functions.php";
$db = db_connect();

?>


<main>
    <h1 class="giftIdeas">Sign Up For An Account</h1>
    <hr>
    <div class="container">
        <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <form method='post' action='gift.php'>
                <label for="clientFirstname">First name:*</label><br>
                <input type="text" name="clientFirstname" id="clientFirstname" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}  ?> required><br>
 
                <label for="clientLastname">Last name:*</label><br>
                <input type="text" name="clientLastname" id="clientLastname" value="<?php if(isset($clientLastname)){echo $clientLastname;}  ?>" required><br>
 
                <label for="clientEmail">Email:*</label><br>
                <input type="email" name="clientEmail" id="clientEmail" value="<?php echo (isset($clientEmail) ? $clientEmail : ' ');  ?>" required><br>

                <label for="clientPassword">Password:*</label><br>
                <span class="password">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br> 
                <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required><br>

                <button type='submit' class='btn btn-info' value="register">Sign Up</button>
            </form>
        </div>
        <div class="col-sm-2"></div>
        </div>
    </div>
    
    


</main>
  
  
<?php include '../common/footer.php'; ?>