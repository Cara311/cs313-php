<?php 

// Access Session
session_start();

require_once '../library/connections.php';
require_once '../library/functions.php';
//$db = db_connect();

ini_set('display_errors',1); 
error_reporting(E_ALL);


  
  $action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
 $action = filter_input(INPUT_GET, 'action');
}


switch ($action) {

  case "account":
    include "../views/list.php";
    break;

case 'login':
    include "../views/login.php";
    break;
 
 case 'login_user':
  $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
  $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);

  $clientEmail = checkEmail($clientEmail);
  $checkPassword = checkPassword($clientPassword);

 // Check for missing data
 if(empty($clientEmail) || empty($checkPassword))
 {
    $_SESSION['message'] = '<p class="error">Please provide information for all empty form fields.</p>';
    include '../views/login.php';
    exit; 
}

 // Query the client data based on the email address
 $clientData = getClient($clientEmail);
 //print_r($clientData);
 // Compare the password just submitted against
 // the hashed password for the matching client
 $hashCheck = password_verify($clientPassword, $clientData['clientpassword']);
 // If the hashes don't match create an error
 // and return to the login view
 if(!$hashCheck) {
   $_SESSION['message'] = '<p class="notice">Please check your password and try again.</p>';
   include '../views/login.php';
   exit;
 } 
 // A valid user exists, log them in
 $_SESSION['loggedin'] = TRUE;
 
 // Remove the password from the array
 // the array_pop function removes the last
 // element from an array
 array_pop($clientData);
 
 // Store the array into the session
 $_SESSION['clientData'] = $clientData;
 
  //Delete Cookie
  if (isset($_COOKIE['firstname'])) {
    unset($_COOKIE['firstname']);
    unset($cookieFirstname);
    // Set the expiration date to one day ago
     setcookie("firstname", ' ' , strtotime("-1 day"), '/');
}
 
  //Save client info to variable
  $clientFirstname = $_SESSION['clientData']['clientfirstname'];
  $clientLastname = $_SESSION['clientData']['clientlastname'];
  $clientEmailadd = $_SESSION['clientData']['clientemail'];
  $clientLevel = $_SESSION['clientData']['clientlevel'];
  $clientId = $_SESSION['clientData']['id'];
 
  
 // Send them to the user view
 include '../views/list.php';
  
 exit;
          
 break;
 
 case "register":

  // Filter and store the data
  $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
  $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
  $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
  $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
  $clientLevel = filter_input(INPUT_POST, 'clientLevel', FILTER_SANITIZE_NUMBER_INT);
 
  //Reset clientEmail so that it's the validated email.
  $clientEmail = checkEmail($clientEmail);
 
  $checkPassword = checkPassword($clientPassword);

  //Check for exsisting email address
  $existingEmail = checkExistingEmail($clientEmail); 

   // Check for existing email address in the table
  if($existingEmail){
   $_SESSION['message'] = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
   include '../views/login.php';
   exit;
  }

  // Check for missing data
  if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword))
   {
    $_SESSION['message'] = '<p class="error">Please provide information for all empty form fields.</p>';
    include '../views/account.php';
    exit; 
  }

  
  // Hash the checked password
  $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
  // Send the data to the model
  $regOutcome = regUser($clientFirstname, $clientLastname, $clientEmail, $clientLevel, $hashedPassword);

  

  // Check and report the result
  if($regOutcome === 1){
    setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
    $_SESSION['message'] = "<p class='error'>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
    include '../views/login.php';
   exit;
  } else {
    $_SESSION['message'] = '<p class="error">Sorry $clientFirstname, but the registration failed. Please try again.</p>';
    include '../views/account.php';
    exit;
  }
 
    break; 

case 'logout':
    // Destroy the session.
        session_destroy();
        header('Location: ../views/gift.php');
        die();
        break;

case 'changePass':  
  $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
  $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
  
  $checkPassword = checkPassword($clientPassword);
  if(empty($checkPassword))
   {
    $_SESSION['message'] = '<p class="error">Please provide information for all empty form fields.</p>';
    include '../views/list.php';
    exit; 
  }
  // Hash the checked password
  $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
  $modPassOutcome = changePass($hashedPassword, $clientId);
  
    if($modPassOutcome) {
  $_SESSION['message'] = "<p class='error'>Congratulations, your password was successfully updated.</p>";
   include '../views/list.php';
  exit;
 } else {
  $_SESSION['message'] = "<p class='error'>Error. Your password was not updated.</p>";
  include '../views/list.php';
  exit;
 }
    break;
   
  default:  
  include '../views/login.php';
  
}




