<?php
namespace App\Models;
use App\Lib\Db;

class UserModel {
  public function __construct()
  {
    $conf = require_once ROOT_PATH.'/lib/config.php';
    $this->conn = new Db($conf['db']);
  }

  public function getPass($email)
  {
    $stmt = $this->conn->prepare("SELECT * FROM Admins WHERE email = :email LIMIT 1");
    $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(\PDO::FETCH_ASSOC);
  }

}