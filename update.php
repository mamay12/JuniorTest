<?php

include_once "select.php";

$data=[
  "name" => $_POST['name'],
  "id" => $_POST['id']
];

$action = new ExecuteQueryMySql();
$action::update($data);

$ds = new dynamicallyStyles();
$ds::loadStyles();

$select = new outTree();

$echoTree = new echoTree();
$echoTree->outTree(null, 0, $select->_categoryArr );

 ?>
