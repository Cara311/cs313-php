<?php include '../common/header.php'; ?>

 <?php 
//ini_set('display_errors',1); 
//error_reporting(E_ALL);

//Get the database info 
require_once '../library/connections.php';
require_once '../library/functions.php';

?> 


<main>
    <h1 class="giftIdeas">Sign In to Your Account</h1>
    <hr>
    <div class="container">
        <?php include '../common/client.php'; ?>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <form action="../accounts/index.php" method="POST">
                        <input type="hidden" name="action" value="login_user">

                        <div class="form-group">
                            <label for="clientEmail">Email:*</label><br>
                            <input type="email" name="clientEmail" title="something@email.com" id="clientEmail" value="<?php echo (isset($clientEmail) ? $clientEmail : ' ');  ?>" required><br>
                        </div>
                        <div class="form-group">    
                            <label for="clientPassword">Password:*</label><br>
                            <span class="password">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br> 
                            <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required><br>
                        </div>
                         <input type="submit" name="submit" id="logbttn"  class="btn btn-info" value="Login">
  
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>    
   </div>

</main>
  
  
<?php include '../common/footer.php'; ?>