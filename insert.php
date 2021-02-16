<?php

include_once "select.php";

$data=[
  "name" => $_POST['name'],
  "parent_id" => $_POST['parent_id']
];

$action = new ExecuteQueryMySql();
$action::insert($data);

$ds = new dynamicallyStyles();
$ds::loadStyles();

$select = new outTree();

$echoTree = new echoTree();
$echoTree->outTree(null, 0, $select->_categoryArr );

 ?>
