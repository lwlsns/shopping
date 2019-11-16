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
</body>
</html>