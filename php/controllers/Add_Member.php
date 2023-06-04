<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

if (empty($_SESSION) || empty($_POST))
{
    header("Location: /tqb-library/");
}

class BooksDatabaseConnection
{
    public static function ConnectTo_BooksDatabase()
    {
        $database = require ('config/config-books.php');
        try {
            return new PDO(
               'pgsql:host=' . $database['host'] . ';dbname=' . $database['dbname'],
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

if (!empty($_SESSION))
{
    $user_id = $_SESSION["user_id"];
    $user_name = $_SESSION["user_name"];
}

$member_name = $_POST["memberName"];
$member_address = $_POST["memberAddress"];
$member_phone = $_POST["memberPhone"];
$member_username = $_POST["memberUsername"];
$member_password = $_POST["memberPassword"];

$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$insertMember = $connection->prepare('INSERT INTO member (name, address, phone, username, password) VALUES (:name, :address, :phone, :username, :password)');
$insertMember->bindParam(":name", $member_name);
$insertMember->bindParam(":address", $member_address);
$insertMember->bindParam(":phone", $member_phone);
$insertMember->bindParam(":username", $member_username);
$insertMember->bindParam(":password", $member_password);

$insertMember->execute();

$_SESSION["memberAdded"] = "Member added successfully!";
header("Location: /tqb-library/");
?>
