
<?php

include_once 'DBconfig.php';
include_once 'dynamicallyStyles.php';
include_once 'echoTree.php';


/**
* @package project\outTree
*/

class outTree{

  public $_categoryArr = array();

  public function __construct(){
      $_categoryArr = null;
      $this->_categoryArr = $this->out();
  }


  /**
  *@method out() needed to get all records from the database into an array
  *@return array
  */

  public function out() {

    $action = new ExecuteQueryMySql();
    $result = $action::select();


    if ($result == null) {
        echo '<button class="create-root">create root</button>';
    }

    $return = array();

    foreach ($result as $value) {
      $return[$value->parent_id][] = $value;
    }

    return $return;

  }

}
?>
