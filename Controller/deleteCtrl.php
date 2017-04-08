<?php
// Метод Delete

if (isset($_GET['id'])) {
    // если вызов произошел из этой формы по методу Delete
    $Connect2DB = new PDO("mysql:host=localhost; dbname=employees", "root", '6210340', array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    $DeleteFromDB = $Connect2DB -> prepare("DELETE FROM Article WHERE id=:id;");
    $DeleteFromDB -> bindParam(':id', $_GET['id'] );
    $Result =$DeleteFromDB ->execute();

    header ( "Location: ../index.php");

}
?>