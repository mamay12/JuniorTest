<?php
/**
  * This class need to construct database connection
  *
  * @package project\DBconfig
*/
class connect{

  private $host; /** @var $host string  */
  private $user; /** @var $user string  */
  private $password; /** @var $password string  */
  private $options; /** @var $options array  */
  private $data_base; /** @var $data_base string  */
  private $charset = "UTF8"; /** @var $charset string  */
  public $PDO; /** @var $PDO Object of PDOStatement class  */

  public function __construct($host_copy, $user_copy, $password_copy, $db_copy){
    $this->host = $host_copy;
    $this->user = $user_copy;
    $this->password = $password_copy;
    $this->data_base = $db_copy;
    $this->options = [
      PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES    => false,
    ];
  }

  /** @method connect_pdo opens a database connection */
  public function connect_pdo(){
    $this->PDO = new PDO("mysql:host=$this->host;dbname=$this->data_base;
    charset=$this->charset;",
    $this->user, $this->password, $this->options);

  }
}
 ?>
