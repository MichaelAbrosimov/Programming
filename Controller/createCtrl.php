<?php
// Метод Create
date_default_timezone_set("Europe/Kiev");
    if (isset($_POST['create'])) // форма "Create" вернула "Create"
    {
        if ($_POST['Name'] && $_POST['Description'] && $_POST['Created_at'])
        {
            //Проверям чтобы все значения были заполнены
            $Connect2DB = new PDO("mysql:host=localhost; dbname=employees", "root", '6210340', array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

            $Create2DB = $Connect2DB->prepare("INSERT INTO Article (name, description, created_at) VALUES (:name, :description, :created_at )");
            $Create2DB->bindParam(':name', $_POST['Name']);
            $Create2DB->bindParam(':description', $_POST['Description']);
            $Create2DB->bindParam(':created_at', $_POST['Created_at']);
            $Result = $Create2DB->execute();
            header ( 'Location:  ../index.php');

        }
        else {echo "все значения должны быть заполнены"; }
    }
    if (isset($_POST['chancel']))
    {
        header ( 'Location: ../index.php');
    }
require '/Users/Michael-mac/Documents/Programming/PHP_School/Repozit/View/createForm.php';
?>