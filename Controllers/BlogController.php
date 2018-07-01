<?php
namespace App\Controllers;
use App\Models\BlogModel;
use App\Traits\ViewTrait;
use App\Traits\SessionTrait;


class BlogController {
  use ViewTrait; // 获取模版
  use SessionTrait;
  public function index ()
  {
    $model = new BlogModel();
    $this->getView('index', $model->all());
  }

  public function detail ($id)
  {
    $model = new BlogModel();
    $this->getView('detail', $model->one($id));
  }

  public function add ()
  {
    if(!$this->is_Login()) {
      header("Location: /?c=user&f=login");
    }
    if(empty($_POST)) {
      $this->getView('post', null);
    }else{
      $model = new BlogModel();
      $model->post($_POST);
      echo "发布成功";
      header("Location: /");
    }
  }
}