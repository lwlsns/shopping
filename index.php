<!DOCTYPE html>
<html>
<body>

<?php
    require_once('config.php');
    require_once('dbcntrl.php');
    require_once('cart_functions.php');

    $dbcntrl = new dbcntrl($username, $password, $servername, $dbname);

    $name = "Lewis";
    echo "hello " . $name;

    createTables($dbcntrl);

?>

</body>
</html>

