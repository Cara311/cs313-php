<?php
session_start();

if(filter_input(INPUT_GET, 'action') == 'delete') {
    //Loop through to find a match to the GET id 
    foreach($_SESSION['shopping_cart'] as $key => $product){
        if ($product['id'] == filter_input(INPUT_GET, 'id')) {
            //if the id matches, remove that item from the cart
            unset($_SESSION['shopping_cart'][$key]);
        }
    }
    //reset session array keys so they match with $product_ids array
    $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}
?>


<?php include '../common/header.php'; ?>

<div class="container">
    <div class="table-responsive">
    <table class="table">
        <tr><th colspan="5"><h3>Order Details</h3></th></tr>
        <tr>
            <th width="40">Product Name</th>
            <th width="40">Quantity</th>
            <th width="40">Price</th>
            <th width="40">Total</th>
            <th width="40">Action</th>
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
            <td><?php echo $product['price']; ?></td>
            <td><?php echo number_format($product['quantity'] * $product['price'], 2); ?></td> 
            <td>
                <a href="cart.php?action=delete&id=<?php echo $product['id']; ?>">
                    <div class="btn-danger" id="remove">Remove</div>
                </a>
            </td>  
        </tr>

        <?php
            }
        }
        ?>
      
    </table>

    <a href="shop.php" class="btn btn-info">Keep Shopping</a>
    <a href="checkout.php" class="btn btn-info">Checkout</a>
    
    </div>

</div>

<?php include '../common/footer.php'; ?>