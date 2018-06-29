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
}
