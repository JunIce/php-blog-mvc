<?php
// 链接数据库
namespace App\Lib;

class Db extends \PDO {
  
  // 初始化链接
  public function __construct($db) 
  {
    
    try {
      $OPTIONS[\PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES'utf8';";
      parent::__construct($db['dsn'], $db['username'], $db['password'], $OPTIONS);
      $this->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOExpection $e) {
      echo "db connection fail";
    }
  }
}

