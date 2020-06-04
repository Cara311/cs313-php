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

<main>
    <h1 class="giftIdeas">Saved Gift Ideas</h1>
    <hr>
    <div class="container">
        <?php include '../common/message.php'; ?>
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
                                    echo "<input type='hidden' name='ideaid' value='{$row['gift_id']}'>";
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
        </div>    

        <br>

        <div class="row" id="slist">
            <div class="col-sm-4"></div>
            <div class='col-sm-4'>
                <div class='card'>
                    <div class='card-body'>
                        <form>
                            <select name="users" onchange="showUser(this.value)">
                                <option selected="selected">View Gift Details</option>
                                <?php
                                foreach ($idealist as $option)
                                {
                                    echo "<option value='{$option['gift_id']}'>" . $option['gift_name'] . "</option>";
                                }?>          
                            </select> 
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>  

        <br>

         <div class="row" id="ginfo">
            <div class="col-sm-3"></div>
            <div class='col-sm-6'>
                <div class='card'>
                    <div class='card-body'>
                        <div id="txtHint"><b>Gift info will be listed here...</b></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>   
    </div>
    <?php include '../common/client.php'; ?>
</div>




</main>
<?php include '../common/footer.php'; ?>