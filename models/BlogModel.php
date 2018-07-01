<?php
namespace App\Models;
use App\Lib\Db;

class BlogModel {
  public function __construct()
  {
    $conf = require_once ROOT_PATH.'/lib/config.php';
    $this->conn = new Db($conf['db']);
  }

  public function all()
  {
    $stmt = $this->conn->query("SELECT * FROM Posts ORDER BY id DESC");
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function one($id) 
  {
    $stmt = $this->conn->prepare("SELECT * FROM Posts WHERE id = ?");
    $stmt->execute(array($id));
    return $stmt->fetch(\PDO::FETCH_ASSOC);
  }
  // post 增加信息
  public function post($add)
  {
    $query = $this->conn->prepare("INSERT INTO Posts (`title`, `body`, `createdDate`) VALUES(:title, :body, :create_at)");
    try{
      $this->conn->beginTransaction();
      $time = date("Y-m-d H:i:s");
      $query->bindParam(':title', $add['title'], \PDO::PARAM_STR);
      $query->bindParam(':body', $add['body'], \PDO::PARAM_STR);
      $query->bindParam(':create_at', $time, \PDO::PARAM_STR);
      $query->execute();
      $this->conn->commit();
    }
    catch(PDOExpection $e) {
      $this->conn->rollBack();
    }
  }
}
