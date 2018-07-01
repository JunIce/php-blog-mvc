<?php
namespace App\Controllers;
use App\Models\BlogModel;
use App\Traits\ViewTrait;
use App\Traits\SessionTrait;


class BlogController {
  use ViewTrait; // 获取模版
  use SessionTrait;
  // 首页列表
  public function index ()
  {
    $model = new BlogModel();
    $this->getView('index', $model->all());
  }

  // 内容详情
  public function detail ($id)
  {
    $model = new BlogModel();
    $this->getView('detail', $model->one($id));
  }

  // 增加一条信息
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

  // 删除信息
  public function delInfo($id)
  {
    $model = new BlogModel();
    $model->delete((int)$id);
    $this->getView('message', ['message' => 'del success!!']);
  }
}