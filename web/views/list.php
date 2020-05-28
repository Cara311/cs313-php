<?php include '../common/header.php';?>

<main>
    <div class="message">
    <?php
if (isset($_SESSION['message'])) {
      echo $_SESSION['message'];
    //unset session message
    unset($_SESSION['message']); 
   } 

     if(isset($_SESSION['loggedin'])){
         
         ?>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class='col-sm-4'>
                <div class='card'>
                    <div class='card-body'>
                    <h4 class='card-title'>Account Info For <?php echo $_SESSION['clientData']['clientfirstname'] ?> </h4>
                        <ul>
                            <li><a href='../accounts/index.php?action=logout' title='Click to logout'>Log Out</a></li>
                            <li><a href='../ideas/index.php?action=viewlist'>View List</a></li>
                        
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <br>
            

     <?php if(isset($_SESSION['clientData']['clientlevel']) && $_SESSION['clientData']['clientlevel'] < 2){ ?>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class='col-sm-4'>
                <div class='card'>
                    <div class='card-body'>
                    <h4 class='card-title'>Admin Info</h4>
                    <form method='post' action='../ideas/index.php'>
                        <input type="hidden" name="action" value="addgift">
                        <div class="md-form">
                            <label for="giftname" class="font-weight-light">Gift Name:*</label><br>
                            <input type="text" name="giftname" id="giftname"required class="form-control"><br>
                        </div>

                        <div class="md-form">
                            <label for="price" class="font-weight-light">Gift Price:*</label><br>
                            <input type="text" name="price" id="price" required class="form-control"><br>       
                        </div>

                        <div class="md-form">
                            <label for="description" class="font-weight-light">Description:*</label><br>
                            <input type="textarea" name="description" id="description"  required class="form-control"><br>
                        </div>

                        <div class="md-form">
                            <label for="imagename" class="font-weight-light">Image Name:*</label><br>
                            <input type="text" name="imagename" id="imagename"  required class="form-control"><br>
                        </div>

                        <div class="md-form">
                            <label for="interestid" class="font-weight-light">Interest Related to Gift:*</label><br>
                            <select id="ioptions" name="interestid">
                                <option selected="selected">Choose an Interest</option>
                                <option value='1'>Fashion</option>   
                                <option value='2'>Outdoors</option>  
                                <option value='3'>Animals</option>  
                                <option value='4'>Gaming</option>  
                                <option value='5'>Reading</option>
                                <option value='6'>Movies</option>           
                            </select> 
                            <input type="number" name="description" id="description"  required class="form-control"><br>
                        </div>

                       

                        <div class="text-center py-4 mt-3">
                        <button type='submit' class='btn btn-info' value="add">Add Gift</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div> 
           
           <?php }
             } ?>       

    </div> 

   



</main>
<?php include '../common/footer.php'; ?>