<?php
// Метод Update
include_once '../Model/articleMd.php';
$item = "";

if (isset($_GET['id']))
    // если вызов из другой формы методом GET
    {
        $item = (new Article())->readById($_GET['id']);
    }

if (isset($_POST['update'])) // форма "Update" вернула "Update"
        {if ($_POST['name'] && $_POST['description'] && $_POST['created_at'])
            {//Проверяем чтобы все значения были заполнены и апдейтим
                (new Article())->updateById($_POST['name'], $_POST['description'], $_POST['created_at'], $_POST['id']);
                header ( "Location: ../index.php");
            }
            else
            {
                echo "все значения должны быть заполнены";
                $item = $_POST;
            }
        }
$title = $item ['name'];
require_once ("../View/updateForm.php");