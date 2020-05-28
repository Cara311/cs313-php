<?php include '../common/header.php';?>

<main>
<?php
if (isset($_SESSION['message'])) {
      echo $_SESSION['message'];
    //unset session message
    unset($_SESSION['message']); 
   } 

     if(isset($_SESSION['loggedin'])){ ?>
            
            <div class="welcome"> Welcome <?php echo $_SESSION['clientData']['clientfirstname'] ?></div>

              <a href='../accounts/index.php?action=logout' title='Click to logout'>Log Out</a>
              <a href='../ideas/index.php?action=viewlist'>View List</a>
             <?php } else { ?>
              <a href='../accounts/index.php?action=login' title='Click to register or login'>My Account</a> 
           <?php }
           ?>
   



</main>
<?php include '../common/footer.php'; ?>