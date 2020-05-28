<?php include '../common/header.php'; ?>
 <?php 
 session_start();
//Get the database info 
require "../library/connections.php";
require "../library/functions.php";

$db = db_connect(); 

?> 


<main>
    <h1 class="giftIdeas">Sign In to Your Account</h1>
   <?php
   if (isset($_SESSION['message'])) {
      echo $_SESSION['message'];
    //unset session message
    unset($_SESSION['message']); 
   } ?> 
    <hr>

    <div id="lform">
<form action="../accounts/index.php" method="POST">
  <input type="hidden" name="action" value="login_user">
 
  <label for="clientEmail">Email:*</label><br>
  <input type="email" name="clientEmail" title="something@email.com" id="clientEmail" value="email" required><br>
  
  <label for="clientPassword">Password:*</label><br>
  <span class="password">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br> 
  <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required><br>
  
  <input type="submit" name="submit" id="logbttn"  class="button" value="Login">
  
</form>


</main>
  
  
<?php include '../common/footer.php'; ?>