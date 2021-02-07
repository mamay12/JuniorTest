<?php

include_once "select.php";

$data=[
  "name" => $_POST['name'],
  "id" => $_POST['id']
];

$connect = new connect("localhost", "root", "root", "db");
$connect->connect_pdo();
$query = $connect->PDO->prepare("UPDATE `al_tree` SET name = :name WHERE id = :id");
$query -> execute($data);

$select = new outTree;
$select->outTree();
$select->dynamicallyStyles();
 ?>
