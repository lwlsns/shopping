<!DOCTYPE html>
<html>
<body>
<table styles="align:center;" width="50%" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Barcode</th>
<th style="text-align:left;">Description</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Delete</th>
</tr>

<?php
    require_once('cart_functions.php');

    //declare variebles from new product form 
    $barcode = $pName = $pDescr = $pURL =  "";
    $price = $stock = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $passing = true;
        if (empty($_POST["name"])) 
        {
            echo "name is required";
            $passing = false;
        } 
        else 
        {
            $pName = $_POST["name"];
        }

        if (empty($_POST["barcode"])) 
        {
            echo "barcode is required";
            $passing = false;
        } 
        else 
        {
            $barcode = $_POST["barcode"];
        }

        if (empty($_POST["description"])) 
        {
        } 
        else 
        {
            $pDescr = $_POST["description"];
        }

        if (empty($_POST["quantity"])) 
        {
            echo "stock is required";
            $passing = false;
        } 
        else 
        {
            $stock = $_POST["quantity"];
        }

        if (empty($_POST["price"])) 
        {
            echo "price is required";
            $passing = false;
        } 
        else 
        {
            $price = $_POST["price"];
        }

        if($passing)
        {
            createProduct($barcode, $pName, $price, $pDescr, "", $stock);            
        }

    }

    //createProduct("0079383017", "Camera", 109.90, "Nikon 8mp Camera",
     //"https://www.bhphotovideo.com/images/images2000x2000/nikon_d610_dslr_camera_with_1008287.jpg", 13);

    $prods = array();
    $prods = getAllProducts();
    for($i=0; $i<count($prods); $i++)
    { ?>
        <tr>
            <td style="text-align:left;"><?php echo $prods[$i]["PName"]; ?></td>
            <td style="text-align:left;"><?php echo $prods[$i]["Barcode"]; ?></td>
            <td style="text-align:left;"><?php echo $prods[$i]["PDescription"]; ?></td>
            <td style="text-align:right;"><?php echo $prods[$i]["Stock"]; ?></td>
            <td style="text-align:right;"><?php echo $prods[$i]["Price"]; ?></td>
            <td style="text-align:center;"><?php echo $prods[$i]["ID"] . "x"; ?></td>
        </tr>
    <?php    
    }
?>
</tbody>
</table>
<br><br>
Add New Product
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<table styles="align:center;" width="50%" cellpadding="10" cellspacing="1">
    <tbody>
    <tr>
        <th style="text-align:left;">Name</th>
        <th style="text-align:left;">Barcode</th>
        <th style="text-align:left;">Description</th>
        <th style="text-align:right;" width="5%">Stock</th>
        <th style="text-align:right;" width="10%">Price</th>
        <th style="text-align:center;" width="5%">Submit</th>
    </tr>
    <tr>
        <td><input type="text" name="name"></td>
        <td><input type="text" name="barcode"></td>
        <td><input type="text" name="description"></td>
        <td><input type="text" name="quantity" size="4"></td>
        <td><input type="text" name="price" size="4"></td>
        <td><input type="submit" name="submit" value="Submit"></td>
  </tr>  
  </tbody>
</table>
</form>
</body>
</html>