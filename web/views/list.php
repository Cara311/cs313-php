<?php include '../common/header.php';?>

<main>

<?php if(isset($_SESSION['loggedin'])){ ?>
            
            <div class="welcome"> Welcome <?php echo $_SESSION['clientData']['clientFirstname'] ?></div>

              <a href='/acme/accounts/index.php?action=logout' title='Click to logout'>Log Out</a><img src='/acme/images/site/account.gif' alt='red folder'>
             <?php } else { ?>
              <a href='../accounts/index.php?action=login' title='Click to register or login'>My Account</a> 
           <?php }
           ?>
   



</main>
<?php include '../common/footer.php'; ?>