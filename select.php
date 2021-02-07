
<?php

include_once 'DBconfig.php';
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

  public function out(){

    $connect = new connect("localhost", "root", "root", "db");
    $connect->connect_pdo();
    $query = $connect->PDO->prepare("Select * from `al_tree`");
    $query-> execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ); /** @var $result array*/

    if($result == null){
        echo '<button class="create-root">create root</button>';
    }

    $return = array();

    foreach ($result as $value) {
      $return[$value->parent_id][] = $value;
    }

    return $return;
  }

  /**
  *@method outTree($parent_id = NULL, $level = 0) is recursive. Sorts an array of all records and builds markup to output the result
  *@param $parent_id int
  *@param $level int. Needed to determine the nesting level
  */

  public function outTree($parent_id = NULL, $level = 0){
    if(isset($this->_categoryArr[$parent_id])){
      foreach ($this->_categoryArr[$parent_id] as $value) {
        echo "<div class = 'text' style='margin-left:" . ($level * 25) . "px;'><div class='sub-text' id ='" . $value->id . "'>" . $value->name . "</div><button class = 'add' id=". $value->id . ">+</button><button class = 'delete' id=" . $value->id . ">-</button></div>";
                  $level++;
                  $this->outTree($value->id, $level);
                  $level--;
      }

    }
  }


  /**
  *@method dynamicallyStyles() needed to dynamically load popup windows for using them more than one time.
  */
  public function dynamicallyStyles() 
  {
    echo '
    <div class="delete-modal">
      <div class="delete-modal-content">
        <div class="nav-top">
            <p><b>Delete confirmation</b></p>
            <button class="exit_delete" style="top: 0;">x</button>
        </div>
      <hr>
        <p>This is very dangerous, you shouldnt do it! Are you really really sure?</p><hr>
          <div class="nav">
            <div class="left" style="color: red;">
              20
            </div>
            <div class="right">
              <button class="agree_delete" name="button">Yes i am</button>
              <button class="disagree_delete" name="button">No</button>
            </div>
          </div>
      </div>
    </div>';

    echo '
    <div class="update-modal">
      <div class="update-modal-content">
        <div class="nav-top">
            <p><b>Update confirmation</b></p>
            <button class="exit_update" style="top: 0;">x</button>
        </div>
      <hr>
        <p>This is very dangerous, you shouldnt do it! Are you really really sure?</p><hr>
        <textarea class="txt2" rows="2" cols="50" placeholder="enter new name"></textarea>
          <div class="nav">
            <div class="right">
              <button class="agree_update" name="button">Yes i am</button>
              <button class="disagree_update" name="button">No</button>
            </div>
          </div>
      </div>
    </div>



    ';

    echo '
    <div class="add-modal">
      <div class="add-modal-content">
        <div class="nav-top">
            <p><b>Insert confirmation</b></p>
            <button class="exit_insert" style="top: 0;">x</button>
        </div>
      <hr>
        <p>This is very dangerous, you shouldnt do it! Are you really really sure?</p><hr>
        <textarea class="txt1" rows="2" cols="50" placeholder="enter name"></textarea>
          <div class="nav">
            <div class="right">
              <button class="agree_insert" name="button">Yes i am</button>
              <button class="disagree_insert" name="button">No</button>
            </div>
          </div>
      </div>
    </div>
    ';
  }
}



?>
