<?php include '../common/header.php';
session_start();
print_r($_SESSION);
?>

<main>

<?php if(isset($_SESSION['loggedin'])){ ?>
            
            <div class="welcome"> Welcome <?php echo $_SESSION['clientData']['clientfirstname'] ?></div>

              <a href='../accounts/index.php?action=logout' title='Click to logout'>Log Out</a>
             <?php } else { ?>
              <a href='../accounts/index.php?action=login' title='Click to register or login'>My Account</a> 
           <?php }
           ?>
   



</main>
<?php include '../common/footer.php'; ?>