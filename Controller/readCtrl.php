<?php
// Метод Read
// Формируем запрос к БД и результат передаем в массив

$Connect2DB = new PDO("mysql:host=localhost; dbname=employees", "root", '6210340', array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
$readFromDB = $Connect2DB -> prepare ("SELECT * FROM Article");
$readFromDB -> execute( );
$Result = $readFromDB -> fetchAll();

require ("../Repozit/View/greedForm.php");

?>




