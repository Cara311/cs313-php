<?php include '../common/header.php';
session_start();
require "../library/connections.php";
require "../library/functions.php";
$db = db_connect();
 
     // If the  user id set search for gifts associated with that id
 if(isset($_SESSION['clientData']['id'])) {
     $id = $_SESSION['clientData']['id'];
     // Now run the query to find the text in the database, and then save the results as a variable
     $idealist = listideas($id, $db);
   }
?>
<nav>
    <?php if(isset($_SESSION['loggedin'])){ ?>
            
            <div class="welcome"> Welcome <?php echo $_SESSION['clientData']['clientfirstname'] ?></div>

              <a href='../accounts/index.php?action=logout' title='Click to logout'>Log Out</a>
             <?php } else { ?>
              <a href='../accounts/index.php?action=login' title='Click to register or login'>My Account</a> 
           <?php }
    ?>
</nav>
<main>
    <h1 class="giftIdeas">Saved Gift Ideas</h1>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class='col-sm-4'>
                <div class='card'>
                <div class='card-body'>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th>Gift Ideas</th>
                            <th>Remove Gift From List</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php  
                                foreach ($idealist as $row)
                                {
                                echo "<td>" . $row['gift_name'] . "</td>";
                                echo "<td>" . "<a href='../ideas/index.php?action=delete' class= 'btn btn-info'>Remove</a>" . "</td>";
                                }
                            ?>
                            </tr>
                        </tbody>
                    </table>
                    <a href='gift.php' class='btn btn-info'>Go Back to Idea Search</a>
                </div>
                </div>
            </div>
        <div class="col-sm-4"></div>
    </div>

</div>




</main>
<?php include '../common/footer.php'; ?>