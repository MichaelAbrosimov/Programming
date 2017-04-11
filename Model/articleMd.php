<?php

/**
 Основные методы взаимодействия с БД таблицы Article
 */
class Article
{
    private function connect2DB ()
    {
        $connect2DB = new PDO("mysql:host=localhost; dbname=employees", "root", '6210340', array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        return $connect2DB;
    }

    public function deleteFromArticle ($id)
    {
        $deleteFromDB = ($this->connect2DB())->prepare("DELETE FROM Article WHERE id=:id;");
        $deleteFromDB->bindParam(':id', $id );
        return $deleteFromDB->execute();
    }

    public function readAllArticle ()
    {
        $readAll = ($this-> connect2DB())->prepare ("SELECT * FROM Article");
        $readAll->execute( );
        return  $readAll->fetchAll();
    }

    public function createArticle ($name, $description, $created_at)
    {
        $create = ($this->connect2DB())->prepare ("INSERT INTO Article (name, description, created_at) VALUES (:name, :description, :created_at )");
        $create->bindParam(':name', $name);
        $create->bindParam(':description', $description);
        $create->bindParam(':created_at', $created_at);
        return  $create->execute();
    }

    public function readById ($id)
    {
         $read = ($this-> connect2DB())->prepare("SELECT * FROM Article WHERE id=:id ");
         $read->bindParam(':id', $id);
         $read->execute();
         return $read->fetch();
    }

    public function updateById ($name, $description, $created_at, $id)
    {
        $update = ($this->connect2DB())->prepare("UPDATE Article SET name = :name, description = :description, created_at = :created_at WHERE id = :id");
        $update->bindParam(':name', $name);
        $update->bindParam(':description', $description);
        $update->bindParam(':created_at', $created_at);
        $update->bindParam(':id', $id);
        return $update->execute();
    }
}