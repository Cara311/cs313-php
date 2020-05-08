<?php
session_start();
?>

<?php include '../common/header.php'; ?>

<div class="container">
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
            <tr><th colspan="5"><h3>Order Total: $ <?php echo number_format($total, 2) ?></h3></th></tr>

    </table>

<?php include '../common/footer.php'; ?>