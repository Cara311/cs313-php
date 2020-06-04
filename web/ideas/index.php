<?php
require_once '../library/connections.php';
require_once '../library/functions.php';
session_start();

/*ini_set('display_errors',1); 
error_reporting(E_ALL); */


  
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
    include "../views/listview.php";
    break;

    case 'search':
        include "../views/gift.php";
        break;

    case 'delete':
        $giftname = filter_input(INPUT_POST, 'giftname', FILTER_SANITIZE_STRING);
        $ideaid = filter_input(INPUT_POST, 'ideaid', FILTER_SANITIZE_NUMBER_INT);
      
        $deleteResult = deleteProduct($ideaid);
        if ($deleteResult) {
         $_SESSION['message'] = "<p class='error'>Congratulations, $giftname was successfully deleted.</p>";
         include "../views/listview.php";
         exit;
        } else {
         $_SESSION['message'] = "<p class='error'>Error: $giftname was not deleted.</p>";
         include "../views/listview.php";
         exit;
        }
        break;

    case 'addgift':    
        $giftname = filter_input(INPUT_POST, 'giftname', FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $imagename = filter_input(INPUT_POST, 'imagename', FILTER_SANITIZE_STRING);
        $interestid = filter_input(INPUT_POST, 'interestid', FILTER_SANITIZE_NUMBER_INT);

         // Check for missing data
  if (empty($giftname) || empty($price) || empty($description) || empty($imagename) || empty($interestid)) {
    $_SESSION['message'] = '<p class="error">Please provide information for all empty form fields.</p>';
    include '../views/list.php';
    exit;
   }
     // Send the data to the function
  $prodOutcome = newGift($giftname, $price, $description, $imagename, $interestid);

  if ($prodOutcome === 1) {
   $_SESSION['message'] = '<p class="error">A new product has been added.</p>';
   include '../views/list.php';
   exit;
  } else {
   $_SESSION['message'] = '<p class="error">Sorry, we were unable to add a new product. Please try again.</p>';
   include '../views/list.php';
   exit;
  }
  break;
                         
}

    

