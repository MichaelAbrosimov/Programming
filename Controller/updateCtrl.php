<?php
// Метод Update


if (isset($_GET['id']))
    // если вызов из другой формы методом GET
    {//  принимаем id - предопределяем метод Update//  читаем из базы и наполняем массив для заполнения формы
        $Connect2DB = new PDO("mysql:host=localhost; dbname=employees", "root", '6210340', array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $readFromDB = $Connect2DB->prepare("SELECT * FROM Article WHERE id=:id ");
        $readFromDB->bindParam(":id", $_GET['id']);
        $readFromDB->execute();

        $Result = $readFromDB->fetchAll();

        foreach ($Result as $item);

    }


if (isset($_POST['update'])) // форма "Update" вернула "Update"
        {if ($_POST['Name'] && $_POST['Description'] && $_POST['Created_at'])
            {
                //Проверяем чтобы все значения были заполнены
                //апдейтим
                $Connect2DB = new PDO("mysql:host=localhost; dbname=employees", "root", '6210340', array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
                $Update2DB = $Connect2DB ->prepare("UPDATE Article SET name = :name, description = :description, created_at = :created_at WHERE id = :id");
                $Update2DB -> bindParam(':name', $_POST['Name']);
                $Update2DB -> bindParam(':description', $_POST['Description']);
                $Update2DB -> bindParam(':created_at', $_POST['Created_at'] );
                $Update2DB -> bindParam(':id', $_POST['id'] );

                $Result = $Update2DB -> execute( );
                header ( "Location: ../index.php");
            }
            else
            {
                echo "все значения должны быть заполнены";


               $item= $_POST;
echo "Post";
                var_dump($_POST);
echo "item";
                var_dump($item);


            }
        }
if (isset($_POST['chancel']))// форма "Update" вернула "Chancel"
    {
        header ( "Location: ../index.php");
    }



$title = $item['name'];
require ("/Users/Michael-mac/Documents/Programming/PHP_School/Repozit/View/updateForm.php");

?>



