<?php include '../common/header.php';
/*session_start();
require "../library/connections.php";
require "../library/functions.php";
$db = db_connect(); */
 
     // If the  user id set search for gifts associated with that id
 if(isset($_SESSION['clientData']['id'])) {
     $id = $_SESSION['clientData']['id'];
     // Now run the query to find the text in the database, and then save the results as a variable
     $idealist = listideas($id);
     //print_r($idealist);
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
    <?php
     if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
      //unset session message
      unset($_SESSION['message']); 
     } ?>
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
                            <th>Remove Gift</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php  
                                foreach ($idealist as $row)
                                {
                                echo "<td>" . $row['gift_name'] . "</td>";
                                echo "<form action='../ideas/index.php' method='POST'>";
                                echo "<input type='hidden' name='action' value='delete'>";
                                echo "<input type='hidden' name='ideaid' value='{$row['ideas_id']}'>";
                                echo "<input type='hidden' name='giftname' value='{$row['gift_name']}'>";
                                echo "<td>" . "<input type='submit' name='submit' class='btn btn-info' value='X'>" . "</td>";
                                echo "</form>";
                                echo "</tr>";
                                }
                            ?>
                            
                        </tbody>
                    </table>
                    <a href='../views/gift.php' class='btn btn-info'>Go Back to Idea Search</a>
                </div>
                </div>
            </div>
        <div class="col-sm-4"></div>
        <?php include '../common/client.php'; ?>
    </div>

</div>




</main>
<?php include '../common/footer.php'; ?>