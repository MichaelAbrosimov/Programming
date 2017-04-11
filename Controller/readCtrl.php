<?php
// Метод Read
include_once ('../Repozit/Model/articleMd.php');

$Result = (new Article())->readAllArticle();    //Иницируем объект Article, вызываем метод ReadAll

require_once ("../Repozit/View/greedForm.php");



