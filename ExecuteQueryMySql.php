<?php
include_once 'DBconfig.php';
include_once 'IExecute.php';

class ExecuteQueryMySql implements IExecute
{
    private $connect;

    public static function select(){
        $connect = new connect("localhost", "root", "root", "db");
        $connect->connect_pdo();

        $query = $connect->PDO->prepare("SELECT * FROM `al_tree`");
        $query -> execute();
        return $query->fetchAll(PDO::FETCH_OBJ); /** @var $result array*/
    }

    public static function insert($data){
        $connect = new connect("localhost", "root", "root", "db");
        $connect->connect_pdo();

        $query = $connect->PDO->prepare("INSERT INTO al_tree(name, parent_id) VALUES (:name, :parent_id)");
        $query -> execute($data);
    }

    public static function delete($data){
        $connect = new connect("localhost", "root", "root", "db");
        $connect->connect_pdo();

        $query = $connect->PDO->prepare("DELETE FROM `al_tree` WHERE id=:id");
        $query -> execute($data);
    }

    public static function update($data){
        $connect = new connect("localhost", "root", "root", "db");
        $connect->connect_pdo();

        $query = $connect->PDO->prepare("UPDATE `al_tree` SET name = :name WHERE id = :id");
        $query -> execute($data);
    }

}
