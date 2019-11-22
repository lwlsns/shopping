<?php

require_once('config.php');
require_once('dbcntrl.php');

$dbcntrl = new dbcntrl($username, $password, $servername, $dbname);

function createTables()
{
    global $dbcntrl;
    $productsSQL = "CREATE TABLE IF NOT EXISTS Products (
        ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Barcode VARCHAR(13) NOT NULL,
        PName NVARCHAR(30) NOT NULL,
        Price DECIMAL(10,2) NOT NULL,
        PDescription NVARCHAR(2000),
        PictureURL NVARCHAR(500),
        Stock INT(6) NOT NULL
        )";

    $cartSQL = "CREATE TABLE IF NOT EXISTS Cart (
        SessionID NVARCHAR(100),
        ProductID INT(6) NOT NULL,
        Quantity SMALLINT NOT NULL
        )";

    $sessionSQL = "CREATE TABLE IF NOT EXISTS Sessions (
        ID NVARCHAR(100) PRIMARY KEY,
        Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";


    $dbcntrl->createTable($productsSQL);
    $dbcntrl->createTable($cartSQL);
    $dbcntrl->createTable($sessionSQL);
}

function deleteTables()
{
    global $dbcntrl;
    $deleteSQl = "DROP TABLE IF EXISTS Sessions , Cart , Products ";
    $dbcntrl->runQuery($deleteSQl);
}

function getItemsInCart()
{
    $cartContents = array();
    $sid = session_id();

}

function addItemToCart($session_id, $product_id, $quantity)
{
    global $dbcntrl;
    $insertSQL = "INSERT INTO Cart 
    (SessionID, ProductID, Quantity)
    VALUES ($session_id, $product_id, $quantity)";
    
    $dbcntrl->runQuery($insertSQL);

    //need to manage the session 
    $insertSQL = "INSERT INTO ";

}

function updateitemInCart($session_id, $product_id, $quantity)
{
    global $dbcntrl;
    $updateSQL = "UPDATE Cart SET Quantity = $quantity 
    WHERE ProductId = '$product_id' AND SessionId = '$session_id'";

    $dbcntrl->runQuery($updateSQL);
}


function deleteFromCart($session_id, $product_id)
{
    global $dbcntrl;
    $deleteSQl = "DELETE FROM Cart 
    WHERE ProductId = '$product_id' AND SessionId = '$session_id'";

    $dbcntrl->runQuery($deleteSQl);
}

function getAllProducts()
{
    global $dbcntrl;
    $products = array();
    $sql = "SELECT * FROM Products";
    $products = $dbcntrl->getRows($sql);
    return $products;
}

function createProduct($barcode, $pName, $price, $pDescr, $pURL, $stock)
{
    global $dbcntrl;
    $insertSQL = "INSERT INTO Products (Barcode, PName, Price, PDescription, PictureURL, Stock)
    VALUES ('$barcode', '$pName', $price, '$pDescr', '$pURL', $stock)";

    $dbcntrl->runQuery($insertSQL);
}

function deleteProduct($pid)
{
    global $dbcntrl;
    $deleteSQl = "DELETE FROM Products
    WHERE ID = $pid";

    $dbcntrl->runQuery($deleteSQl);
}

?>