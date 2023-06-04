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
try {
$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $category = $_POST['category'];
    $variations = $_POST['variations'];
    $prices = $_POST['prices'];

    // Get the category ID based on the selected category
    $categoryId = ($category === 'ice_cream') ? 1 : 2;

    // Insert product into Product table
    $productQuery = $connection->prepare('INSERT INTO product (name, description, image, category_id) VALUES (:name, :description, :image, :category_id)');
    $productQuery->bindParam(':name', $name, PDO::PARAM_STR);
    $productQuery->bindParam(':description', $description, PDO::PARAM_STR);
    $productQuery->bindParam(':image', $image, PDO::PARAM_STR);
    $productQuery->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
    $productQuery->execute();

    // Get the newly inserted product ID
    $productId = $connection->lastInsertId();

    

    $variationsArray = explode(',', $variations);
    $pricesArray = explode(',', $prices);
    foreach ($variationsArray as $index => $variation) {
    $price = $pricesArray[$index];

    $variationQuery = $connection->prepare('INSERT INTO variation (product_id, name, price) VALUES (:product_id, :name, :price)');
    $variationQuery->bindParam(':product_id', $productId, PDO::PARAM_INT);
    $variationQuery->bindParam(':name', $variation, PDO::PARAM_STR);
    $variationQuery->bindParam(':price', $price, PDO::PARAM_STR);
    $variationQuery->execute();
}

$_SESSION["addProductSuccess"] = $name;

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

