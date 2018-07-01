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

  public function delete($id)
  {
    $query = $this->conn->prepare("DELETE FROM Posts WHERE `id` = :id");
    try{
      $this->conn->beginTransaction();
      $query->bindParam(':id', $id, \PDO::PARAM_INT);
      $query->execute();
      $this->conn->commit();
    }
    catch(PDOExpection $e) {
      $this->conn->rollBack();
    }
  }

  // 检查单条信息是否存在
  public function info_is_exists($id)
  {
    $sql = "SELECT * FROM Posts WHERE `id` = $id LIMIT 1";
    return $this->conn->exec($sql);
  }
}
