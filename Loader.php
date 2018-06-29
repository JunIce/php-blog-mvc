<?php

class Loader {
  public static function autoload($class)
  {
    $file = self::findFile($class);
    if (file_exists($file) && is_file($file)) 
      include $file;
  }

  private static function findFile($class)
  {
    // 获取顶层命名空间
    $vendor = substr($class, 0, strpos($class, '\\'));
    // 获取文件目录，默认命名空间就是目录
    $filepath = substr($class, strlen($vendor)) . '.php';
    return strtr(ROOT_PATH . $filepath, '\\', DIRECTORY_SEPARATOR);
  }
}