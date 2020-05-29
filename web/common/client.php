<div class="row info">
            <div class="col-sm-2"></div>    
            <div class="col-sm-2"></div>
            <div class="col-sm-4"> 
            <?php if(!isset($_SESSION['clientData']['clientfirstname'])) { echo "<a href='account.php' class='btn btn-info'>Sign Up For Account</a>";} ?>
            <?php if(isset($_SESSION['clientData']['clientfirstname'])) { echo "<a href='../accounts/index.php?action=logout' title='Click to logout' class='btn btn-info'>Log Out</a><br>"; 
            ?>
            </div>
            <div class="col-sm-2"><?php echo "<a href='../accounts/index.php?action=account' title='Click to register or login' class='btn btn-info'>My Account</a>"; ?></div>
        <?php } ?>
            <div class="col-sm-2"></div>

        </div>
    </div>