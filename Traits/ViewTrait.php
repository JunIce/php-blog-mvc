<?php
namespace App\Traits;
trait ViewTrait {
  protected $posts;
  public function getView($_name, $data)
  {
    $this->posts = $data; // 此处必须先赋值，否则模版里获取不到变量
    require ROOT_PATH.'Views/'.$_name.'.php';
  }
}