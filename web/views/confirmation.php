<?php
session_start();
session_destroy();

// Set variables to empty
$fname = $lname = $address = $city = $state = $zip = "";

//Send variables through validation
  $fname = validate($_POST["fname"]);
  $lname = validate($_POST["lname"]);
  $address= validate($_POST["address"]);
  $city = validate($_POST["city"]);
  $state = validate($_POST["state"]);
  $zip = validate($_POST["zip"]);


function validate($input) {
  $input = trim($input);
  $input = stripslashes($input);
  $input = htmlspecialchars($input);
  return $input;
}

$_SESSION["fullname"] = $fname . " " . $lname;
$_SESSION["address"] = $address;
$_SESSION["city"] = $city;
$_SESSION["state"] = $state;
$_SESSION["zip"] = $zip;

?>

<?php include '../common/header.php'; ?>

<div class="container">
    <h3>Thank you for your order!</h3>
    <div class="table-responsive">
        <table class="table">
            <tr><th colspan="5"><h3>Shipping Information</h3></th></tr>
            <tr>
                <th width="40">Name</th>
                <th width="40">Address</th>
                <th width="40">City</th>
                <th width="40">State</th>
                <th width="40">Zip</th>
            </tr>

            <tr>
                <td><?php echo $_SESSION['fullname']; ?></td>
                <td><?php echo $_SESSION['address']; ?></td>
                <td><?php echo $_SESSION['city']; ?></td>
                <td><?php echo $_SESSION['state']; ?></td>
                <td><?php echo $_SESSION['zip']; ?></td>
            </tr>

        
        </table>
    </div>

    <div class="table-responsive">
        <table class="table">
            <tr><th colspan="5"><h3>Completed Order Details</h3></th></tr>
            <tr>
                <th width="40">Product Name</th>
                <th width="40">Quantity</th>
                <th width="40">Price</th>
                <th width="40">Total</th>
            </tr>

            <?php
                if(!empty($_SESSION['shopping_cart'])){

                $total = 0; //Calculate total for all products

                //loop through shopping cart array
                foreach($_SESSION['shopping_cart'] as $key => $product){
            ?>

            <tr>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['quantity']; ?></td>
                <td>$<?php echo $product['price']; ?></td>
                <td>$<?php echo number_format($product['quantity'] * $product['price'], 2); ?></td> 
            </tr>
        
            <?php $total += $product['quantity'] * $product['price'];
        
                }
            }?>
            <tr><th colspan="5"><h3 id="ordertotal">Order Total: $ <?php echo number_format($total, 2) ?></h3></th></tr>

        </table>
    </div>

</div>


<?php include '../common/footer.php'; ?>