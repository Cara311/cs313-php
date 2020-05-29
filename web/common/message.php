<div class="row message">
            <hr>
            <div class="col-sm-1"></div>    
            <div class="col-sm-1"></div>
            <div class="col-sm-1"></div>    
            <div class="col-sm-1"></div>
            <div class="col-sm-4"> 
            <?php
                if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                //unset session message
                unset($_SESSION['message']); 
                } ?>
        
            <div class="col-sm-1"></div>
            <div class="col-sm-1"></div>
            <div class="col-sm-1"></div>
            <div class="col-sm-1"></div>

        </div>
</div>