<?php
// Метод Create
include_once '../Model/articleMd.php';
date_default_timezone_set("Europe/Kiev");

    if (isset($_POST['create'])) // форма "Create" вернула "Create"
    {
        if ($_POST['name'] && $_POST['description'] && $_POST['created_at'])
        {
            (new article)->createArticle($_POST['name'], $_POST['description'], $_POST['created_at']);
            header ( 'Location:  ../index.php');
        }
        else {echo "все значения должны быть заполнены"; }
    }

require_once '../View/createForm.php';