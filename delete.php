<?php
include_once "select.php";

  $data=[
    "id" => $_POST['id']
  ];

  $connect = new connect("localhost", "root", "root", "db");
  $connect->connect_pdo();
  $query = $connect->PDO->prepare("DELETE FROM `al_tree` WHERE id=:id");
  $query->execute($data);

  $select=new outTree;
  $select->outTree();
  $select->dynamicallyStyles();
 ?>
