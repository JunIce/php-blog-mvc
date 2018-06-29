<?php
namespace App\Traits;
trait SessionTrait {

  public function is_Login()
  {
    return !empty($_SESSION['is_logined']);
  }

  public function session_login()
  {
    $_SESSION['is_logined'] = 1;
  }

  public function session_logout()
  {
    if($this->is_Login())
    {
      session_unset();
      session_destroy();
    }
  }
}