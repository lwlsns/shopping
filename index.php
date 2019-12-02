<!DOCTYPE html>
<html>
<HEAD>
<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
<body>

<?php
    session_start();  
    require_once('cart_functions.php');

    echo session_id();

    if($_SERVER['REQUEST_METHOD'] == "POST" and $_POST["submit"] == "Add to Cart")
    {
        if(isset($_POST["prodid"]) and isset($_POST["quantity"]))
        {
            addItemToCart(session_id(), $_POST["prodid"],  $_POST["quantity"]);
        }
    }

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

</body>
</html>

