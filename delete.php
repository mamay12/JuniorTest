<?php
include_once "select.php";

  $data=[
    "id" => $_POST['id']
  ];

  $action = new ExecuteQueryMySql();
  $action::delete($data);

  $ds = new dynamicallyStyles();
  $ds::loadStyles();

  $select = new outTree();

  $echoTree = new echoTree();
  $echoTree->outTree(null, 0, $select->_categoryArr );

 ?>
