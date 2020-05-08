<?php
session_start();

?>

<?php include '../common/header.php'; ?>


<div class="container">

<div class="col-sm-4 col-md-8">
        <form method="post" action="confirmation.php">
            <div class="products">
                <h4 class="text-info">Checkout</h4>
                <label for="fname">First name:</label><br>
                <input type="text" name="fname" class="form-control">

                <label for="lname">Last name:</label><br>
                <input type="text" name="lname" class="form-control">

                <label for="address">Address:</label><br>
                <input type="text" name="address" class="form-control">

                <label for="city">City:</label><br>
                <input type="text" name="city" class="form-control">

                <label for="state">State:</label><br>
                <input type="text" name="state" class="form-control">

                <label for="zip">Zip Code:</label><br>
                <input type="number" name="zip" class="form-control">

                <input type="submit" name="submit_order" class="btn btn-info addbtn" value="Submit Order">
            </div>
        </form>
        <a href="cart.php" class="btn btn-info bottombtn">Return to Cart</a>
        <a href="shop.php" class="btn btn-info bottombtn">Keep Shopping</a>
    </div>

</div>



<?php include '../common/footer.php'; ?>