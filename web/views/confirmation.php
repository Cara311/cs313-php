<?php
session_start();

// define variables and set to empty values
$fname = $lname = $address = $city = $state = $zip = "";

//if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname = test_input($_POST["fname"]);
  $lname = test_input($_POST["lname"]);
  $address= test_input($_POST["address"]);
  $city = test_input($_POST["city"]);
  $state = test_input($_POST["state"]);
  $zip = test_input($_POST["zip"]);
//}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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
</div>


<?php include '../common/footer.php'; ?>