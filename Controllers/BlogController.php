<?php
namespace App\Controllers;
use App\Models\BlogModel;
use App\Traits\ViewTrait;

class BlogController {
  use ViewTrait; // 获取模版
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
}