<!DOCTYPE html>
<html>
<HEAD>
<link href="style.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</HEAD>
<body>

<?php
    session_start();  
    require_once('cart_functions.php');

    //echo session_id();

    if($_SERVER['REQUEST_METHOD'] == "POST" and $_POST["submit"] == "Add to Cart")
    {
        if(isset($_POST["prodid"]) and isset($_POST["quantity"]))
        {
            addItemToCart(session_id(), $_POST["prodid"],  $_POST["quantity"]);
        }
    }
    $cartItems = array();
    $cartItems = getItemsInCart();

    ?>


    
    <div class="header">
    <li>
         <i class="fa fa-shopping-cart"></i>
         <a href="Cart1.aspx" class="cart">
         <?php echo count($cartItems); ?>
        </a>
    </li>
    </div>
    <div class="center">
<?php

    $prods = array();
    $prods = getAllProducts();
    for($i=0; $i<count($prods); $i++)
    {
?>

    <div class="product-item">
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="image"><img class="image" src="<?php echo $prods[$i]["PictureURL"]; ?>"></div>
            <div class="product-footer">
                <div class="title"><?php echo $prods[$i]["PName"]; ?></div>
                <div class="price"><?php echo "£".$prods[$i]["Price"]; ?></div>
                <input type="hidden" id="prodid" name="prodid" value="<?php echo $prods[$i]["ID"]; ?>">
                <div class="add"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" name ="submit" value="Add to Cart" class="btnAddAction" /></div>
            </div>
		</form>
	</div>
    <?php
    }
    ?>
    </div>

</body>
</html>

