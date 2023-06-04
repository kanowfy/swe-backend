<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

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



$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();


$queryProducts = $connection->prepare('SELECT p.name,p.description,p.image, c.name AS category_name FROM product p JOIN category c ON p.category_id = c.id');
$queryProducts->execute();

if ($queryProducts->rowCount() > 0) {
    $columnCount = $queryProducts->columnCount();
    $fieldNames = array();

    // Retrieve field names
    for ($i = 0; $i < $columnCount; $i++) {
        $meta = $queryProducts->getColumnMeta($i);
        $fieldNames[] = $meta['name'];
    }

    echo '
    <table id="product-table" class="table tablesorter-bootstrap table-light table-striped table-bordered table-responsive-sm table-hover text-center">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No.</th>';

    // Output field names as table headers
    foreach ($fieldNames as $fieldName) {
        echo '<th scope="col">' . $fieldName . '</th>';
    }

    echo '
            </tr>
        </thead>
        <tbody>';

    $num = 1;
    foreach ($queryProducts->fetchAll(PDO::FETCH_ASSOC) as $row) {
        echo '<tr>';
        echo "<th scope='row'>" . $num . "</th>";

        foreach ($row as $key => $cell) {
            if ($key === 'name') { // Check if it's the name column
                echo "<td><a href='ViewProduct.php?name=" . urlencode($row['name']) . "'>" . $cell . "</a></td>";
            } else {
                echo "<td>" . $cell . "</td>";
            }
        }

        echo '</tr>';
        $num++;
    }

    echo '
        </tbody>
    </table>';
} else {
    echo "<br/><br/><br/><br/><br/>";
    echo "<h3 class='text-light'>You haven't added any product yet. Click on 'Add New Product' to start adding products now.</h4>";
}
