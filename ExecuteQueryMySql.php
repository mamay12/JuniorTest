<?php
include_once 'DBconfig.php';
include_once 'IExecute.php';

/**
 * @package project\ExecuteQueryMySql
 */


class ExecuteQueryMySql implements IExecute
{
    private $connect;

    /**
     * @method select() gets a fetch of all records from database
     */

    public static function select(){
        $connect = new connect("localhost", "root", "root", "db");
        $connect->connect_pdo();

        $query = $connect->PDO->prepare("SELECT * FROM `al_tree`");
        $query -> execute();
        return $query->fetchAll(PDO::FETCH_OBJ); /** @var $result array*/
    }

    /**
     * @method insert($data) adds an entry to the database
     */

    public static function insert($data){
        $connect = new connect("localhost", "root", "root", "db");
        $connect->connect_pdo();

        $query = $connect->PDO->prepare("INSERT INTO al_tree(name, parent_id) VALUES (:name, :parent_id)");
        $query -> execute($data);
    }

    /**
     * @method delete($data) delete record from database
     */

    public static function delete($data){
        $connect = new connect("localhost", "root", "root", "db");
        $connect->connect_pdo();

        $query = $connect->PDO->prepare("DELETE FROM `al_tree` WHERE id=:id");
        $query -> execute($data);
    }

    /**
     * @method update($data) changes data in a record database
     */

    public static function update($data){
        $connect = new connect("localhost", "root", "root", "db");
        $connect->connect_pdo();

        $query = $connect->PDO->prepare("UPDATE `al_tree` SET name = :name WHERE id = :id");
        $query -> execute($data);
    }

}
