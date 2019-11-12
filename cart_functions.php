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

}


?>