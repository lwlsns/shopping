<!DOCTYPE html>
<html>
<HEAD>
<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
<body>

<?php
    session_start();  
    require_once('cart_functions.php');

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
                <div class="add"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
            </div>
		</form>
	</div>
    <?php
    }
    ?>

</body>
</html>

