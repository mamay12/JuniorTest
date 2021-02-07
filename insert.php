<?php

include_once "select.php";

$data=[
  "name" => $_POST['name'],
  "parent_id" => $_POST['parent_id']
];

$connect = new connect("localhost", "root", "root", "db");
$connect->connect_pdo();
$query = $connect->PDO->prepare("INSERT INTO al_tree(name, parent_id) VALUES (:name, :parent_id)");
$query -> execute($data);

$select = new outTree;
$select->outTree();
$select->dynamicallyStyles();
 ?>
