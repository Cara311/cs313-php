<?php
session_start();
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
                    <div class="btn-danger">Remove</div>
                </a>
            </td>  
        </tr>

        <?php
                $final_total = $total + ($product['quantity'] * $product['price']);
            }
        }
        ?>
        <tr>
            <td colspan="3" align="right" class="total">Total</td>
            <td align="right" class="total">$ <?php echo number_format($final_total, 2); ?></td>
        </tr>
    </table>

    <a href="shop.php" class="btn btn-info">Keep Shopping</a>
    <a href="checout.php" class="btn btn-info">Checkout</a>
    
    </div>

</div>

<?php include '../common/footer.php'; ?>