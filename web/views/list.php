<?php include '../common/header.php';?>

<main>
    <div class="message">
    <?php
if (isset($_SESSION['message'])) {
      echo $_SESSION['message'];
    //unset session message
    unset($_SESSION['message']); 
   } 

     if(isset($_SESSION['loggedin'])){ ?>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class='col-sm-4'>
                <div class='card'>
                    <div class='card-body'>
                    <h4 class='card-title'>Account Info For <?php echo $_SESSION['clientData']['clientfirstname'] ?> </h4>
                        <ul>
                            <li><a href='../accounts/index.php?action=logout' title='Click to logout'>Log Out</a></li>
                            <li><a href='../ideas/index.php?action=viewlist'>View List</a></li>
                        
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
            

     <?php if(isset($_SESSION['clientData']['clientlevel']) && $_SESSION['clientData']['clientlevel'] < 2){ ?>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class='col-sm-4'>
                <div class='card'>
                    <div class='card-body'>
                    <h4 class='card-title'>Admin Info</h4>
                        <ul>
                            <li>Welcome Admin</li>
                        
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div> 
           
           <?php }
             } ?>       

    </div> 

   



</main>
<?php include '../common/footer.php'; ?>