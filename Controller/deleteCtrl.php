<?php
// Метод Delete
include_once ('../Model/articleMd.php');

if (isset($_GET['id'])) {
    // если вызов произошел из этой формы по методу Delete
    $del= new Article();                        //  инициализируем объект Article
    $del->deleteFromArticle($_GET['id']);       //  вызываем метод Delate
    header ( "Location: ../index.php");  //  редирект в Index
    }
