<?php

function createTables($dbcntrl)
{
    $productsSQL = "CREATE TABLE Products (
        ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        PName NVARCHAR(30) NOT NULL,
        Price NVARCHAR(30) NOT NULL,
        Decription NVARCHAR(2000),
        PictureURL NVARCHAR(500),
        Stock INT(6) NOT NULL
        )";

    $cartSQL = "CREATE TABLE Cart (
        SessionID NVARCHAR(100),
        ProductID INT(6) NOT NULL,
        Quantity SMALLINT NOT NULL
        )";

    $sessionSQL = "CREATE TABLE Sessions (
        ID NVARCHAR(100) PRIMARY KEY,
        Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";


    $dbcntrl->createTable($productsSQL);
    $dbcntrl->createTable($cartSQL);
    $dbcntrl->createTable($sessionSQL);
}

function deleteTables()
{
    $deleteSQl = "DROP TABLE 'Session', Cart, Products ";
    $dbcntrl->runQuery($deleteSQl);
}

function addItemToCart($session_id, $product_id, $quantity)
{
    $insertSQL = "INSERT INTO Cart 
    (SessionID, ProductID, Quantity)
    VALUES ($session_id, $product_id, $quantity)";
    
    $dbcntrl->runQuery($insertSQL);

    //need to manage the session 
    $insertSQL = "INSERT INTO ";

}

function updateitemInCart($session_id, $product_id, $quantity)
{
    $updateSQL = "UPDATE Cart SET Quantity = $quantity 
    WHERE ProductId = '$product_id' AND SessionId = '$session_id'";
}


function deleteFromCart($session_id, $product_id)
{
    $deleteSQl = "DELETE FROM Cart 
    WHERE ProductId = '$product_id' AND SessionId = '$session_id'";
}

function createProduct()
{

}

function deleteProduct()
{

}

?>