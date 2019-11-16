<!DOCTYPE html>
<html>
<body>

<?php
    session_start();  
    require_once('cart_functions.php');

    

    $name = "Lewis";
    echo "hello " . $name;

    createTables();
    //deleteTables();

?>

</body>
</html>

