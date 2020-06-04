<?php include '../common/header.php'; ?>
<?php
//session_start();
//Get the database info 
require "../library/connections.php";
require "../library/functions.php";
$db = db_connect();

?>


<main>
    <h1 class="giftIdeas">Sign Up For An Account</h1>
    <hr>
    <div class="container">
        <?php include '../common/message.php'; ?>

        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">   
                <div class="card">
                    <div class="card-body">
       
                    <form method='post' action='../accounts/index.php'>
                        <input type="hidden" name="action" value="register">
                        <div class="md-form">
                            <label for="clientFirstname" class="font-weight-light">First name:*</label><br>
                            <i class="fa fa-user prefix grey-text"></i>
                            <input type="text" name="clientFirstname" id="clientFirstname" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}  ?> required class="form-control"><br>
                        </div>

                        <div class="md-form">
                            <label for="clientLastname" class="font-weight-light">Last name:*</label><br>
                            <i class="fa fa-user prefix grey-text"></i>
                            <input type="text" name="clientLastname" id="clientLastname" value="<?php if(isset($clientLastname)){echo $clientLastname;}  ?>" required class="form-control"><br>       
                        </div>

                        <div class="md-form">
                            <label for="clientEmail" class="font-weight-light">Email:*</label><br>
                            <i class="fa fa-envelope prefix grey-text"></i>
                            <input type="email" name="clientEmail" id="clientEmail" value="<?php echo (isset($clientEmail) ? $clientEmail : ' ');  ?>" required class="form-control"><br>
                        </div>

                        <div class="md-form">
                            <label for="clientPassword" class="font-weight-light">Password:*</label><br>
                            <span class="password">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br> 
                            <i class="fa fa-lock prefix grey-text"></i>
                            <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required class="form-control"><br>
                            <span id='errorThing' class='hidden'>*</span>
                        </div>

                        <div class='md-form'>
                            <label for='passwordConfirmationInput' class='control-label col-sm-1'>Password:</label>
                            <input type='password' name='passwordConfirmation' id='passwordConfirmationInput' class='form-control' placeholder='Enter password' onkeyup='checkPassword()'>
        
                            <div>
                            <small id='passwordInputHelp' class='form-text text-muted'>Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</small>
                            </div>";
                        </div>

                        <input type="hidden" name="clientLevel" value="2">

                        <div class="text-center py-4 mt-3">
                        <br>
                        <br>
                        <button type='submit' class='btn btn-info' value="register">Sign Up</button>
                        </div>
                    </form>
                    </div>
                </div>
                <br>
                <p>Already Have an Account?</p>
                <a href="login.php" class= 'btn btn-info'>Login</a>  
            </div>   
            <div class="col-sm-4"></div>
        </div> 
    </div>
</main>
  
  
<?php include '../common/footer.php'; ?>