<?php
namespace App\Controllers;
use App\Models\UserModel;
use App\Traits\ViewTrait;
use App\Traits\SessionTrait;

class UserController {
  use ViewTrait;
  use SessionTrait;
  public function login()
  {
    $model = new UserModel();
    // is login
    if($this->is_Login()) 
    {
      $user = $model->getPass($_COOKIE['email']);
      $this->getView('userdetail', $user);
      exit;
    }

    if(isset($_POST['email'], $_POST['password'])) 
    {
      
      $user = $model->getPass($_POST['email']);
      if(password_verify($_POST['password'], $user['password']))
      {
        $this->session_login();
        setcookie('email', $_POST['email'], time()+360000);
        $this->getView('userdetail', $user);
        exit;
      }else{
        echo 'password incorrect!!';
      }
    }
    $this->getView('login',1);
  }

  public function logout()
  {
    $this->session_logout();
    setcookie('email', 1, time()-1 );
    header("Location:/");
  }
}