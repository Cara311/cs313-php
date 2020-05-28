<?php
require_once '../library/connections.php';
require_once '../library/functions.php';
session_start();

ini_set('display_errors',1); 
error_reporting(E_ALL);


  
  $action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
 $action = filter_input(INPUT_GET, 'action');
}


switch ($action) { 
    case 'addtolist':
        // Filter and store the data  
        $giftId = filter_input(INPUT_POST, 'gift_id', FILTER_SANITIZE_NUMBER_INT);
        $userId = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT);

         // Send the data to the function
    $prodOutcome = newIdea($giftId, $userId);

     // Check and report the result
  if ($prodOutcome === 1) {
    $_SESSION['message'] = '<p class="error">A new idea has been added to your list.</p>';
    include '../views/listview.php';
    exit;
   } else {
    $_SESSION['message'] = '<p class="error">Sorry, we were unable to add a new idea. Please try again.</p>';
    include '../views/listview.php';
    exit;
   }
   break;

   case 'viewlist':
    include "../view/listview.php";
    break;
}

    


?>