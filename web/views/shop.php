<?php
session_start();
$product_ids = array();

//Check to see if there is a shopping cart after the add to cart button is pushed
if(filter_input(INPUT_POST, 'add_to_cart')){
    if(isset($_SESSION['shopping_cart'])){
        //Keep track of amount of products in shopping cart
        $count = count($_SESSION['shopping_cart']);

        
        $product_ids = array_column($_SESSION['shopping_cart'], 'id');
        //Check to see if the product already exists in shopping cart array
        if(!in_array(filter_input(INPUT_GET, 'id'), $product_ids)){
            $_SESSION['shopping_cart'][$count] = array (
                'id' => filter_input(INPUT_GET, 'id'),
                'name' => filter_input(INPUT_POST, 'name'),
                'price' => filter_input(INPUT_POST, 'price'),
                'quantity' => filter_input(INPUT_POST, 'quantity')
            );
        }
        else {
            //If the product already exists in the array, increase the quantity
            //Match the array key to the product id of the item being added
            for ($i = 0; $i < count($product_ids); $i++){
                if ($product_ids[$i] == filter_input(INPUT_GET, 'id')) {
                    //add quantity to the existing quantity
                    $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                }
            }
        }
        

    }
    else {
        //Create shopping cart 
        $_SESSION['shopping_cart'][0] = array (
            'id' => filter_input(INPUT_GET, 'id'),
            'name' => filter_input(INPUT_POST, 'name'),
            'price' => filter_input(INPUT_POST, 'price'),
            'quantity' => filter_input(INPUT_POST, 'quantity')
        );
    }
}
?>

<?php include '../common/header.php'; ?>

<div class="container">
   

    <div class="col-sm-4 col-md-3">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>?action=add&id=1">
            <div class="products">
                <img src= "../images/trampoline.jpg" alt="" class="img-responsive">
                <h4 class="text-info">Trampoline Cake Topper</h4>
                <h4>$45</h4>
                <input type="text" name="quantity" class="form-control" value="1">
                <input type="hidden" name="name" value="Trampoline Cake Topper">
                <input type="hidden" name="price" value="45">
                <input type="submit" name="add_to_cart" class="btn btn-info addbtn" value="add to cart">
            </div>
        </form>
    </div>

    <div class="col-sm-4 col-md-3">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>?action=add&id=2">
            <div class="products">
                <img src= "../images/tandem.jpg" alt="" class="img-responsive">
                <h4 class="text-info">Tandem Cake Topper</h4>
                <h4>$40</h4>
                <input type="text" name="quantity" class="form-control" value="1">
                <input type="hidden" name="name" value="Tandem Cake Topper">
                <input type="hidden" name="price" value="40">
                <input type="submit" name="add_to_cart" class="btn btn-info addbtn" value="add to cart">
            </div>
        </form>
    </div>

    <div class="col-sm-4 col-md-3">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>?action=add&id=3">
            <div class="products">
                <img src= "../images/centerpiece.jpg" alt="" class="img-responsive">
                <h4 class="text-info">Bike Centerpiece</h4>
                <h4>$50</h4>
                <input type="text" name="quantity" class="form-control" value="1">
                <input type="hidden" name="name" value="Bike Centerpiece">
                <input type="hidden" name="price" value="50">
                <input type="submit" name="add_to_cart" class="btn btn-info addbtn" value="add to cart">
            </div>
        </form>
    </div>

    <div class="col-sm-4 col-md-3">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>?action=add&id=4">
            <div class="products">
                <img src= "../images/etchedrock.jpg" alt="" class="img-responsive">
                <h4 class="text-info">Etched Rock</h4>
                <h4>$60</h4>
                <input type="text" name="quantity" class="form-control" value="1">
                <input type="hidden" name="name" value="Etched Rock">
                <input type="hidden" name="price" value="60">
                <input type="submit" name="add_to_cart" class="btn btn-info addbtn" value="add to cart">
            </div>
        </form>
    </div>

    <a href="cart.php" class="btn btn-info" id="view">View Cart</a>

</div>

<?php include '../common/footer.php'; ?>