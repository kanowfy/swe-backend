<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}



class UsersDatabaseConnection
{
    public static function ConnectTo_UserDatabase()
    {
        $database = require ('config/config-users.php');
        try {
            return new PDO(
                $database['connection'].';dbname='.$database['db_name'],
                $database['user'],
                $database['password']               
            );
        }
        catch (PDOException $e)
        {
            echo 'Cannot connect to user database. Please try again later.';
        }
    }


}

class BooksDatabaseConnection
{
    public static function ConnectTo_BooksDatabase()
    {
        $database = require ('config/config-books.php');
        try {
            return new PDO(
                $database['connection'].';dbname='.$database['db_name'],
                $database['user'],
                $database['password']               
            );
        }
        catch (PDOException $e)
        {
            echo 'Cannot connect to books database. Please try again later.';
        }
    }


}


if (!empty($_GET["name"])) {
    $product_name = trim($_GET["name"], '"-/\\;');
    $product_name = strip_tags($product_name);
}

$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();

$viewProduct = $connection->prepare('SELECT COUNT(*) FROM product WHERE name LIKE :product_name');
$viewProduct->bindParam(":product_name", $product_name, PDO::PARAM_STR);
$viewProduct->execute();

if ($viewProduct->fetchColumn() > 0) {
    require('controllers/ProductDetail.php');
} else {
    echo "Product not found";
}