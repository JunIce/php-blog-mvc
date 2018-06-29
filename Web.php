<?php
namespace App;
class Web {
  private $_controller;

  public function __construct()
  {
    $this->_controller = isset($_REQUEST['c']) ? ucfirst($_REQUEST['c']): 'Blog';
    $this->_func = isset($_REQUEST['f']) ? $_REQUEST['f']: 'index';
    $this->_id = isset($_REQUEST['id']) ? $_REQUEST['id']: '';    
  }

  public function run()
  {
    $this->reflectController($this->_controller, $this->_func, $this->_id);
  }

  private function reflectController($_cname, $_func, $_id)
  {
    $_namespace = 'App\Controllers\\';
    $_controller = $_cname .'Controller';
    $_file = $this->getFilepath($_namespace.$_controller);
    
    if(file_exists($_file)) {
      $dCont = $_namespace.$_controller;
      $_dContro = new $dCont;
      call_user_func_array(array($_dContro, $_func), array($_id));
    }
  }

  private function getFilepath($_controller_name)
  {
    $vendor = substr($_controller_name, 0, strpos($_controller_name, '\\'));
    $filepath = substr($_controller_name, strlen($vendor));
    return strtr(ROOT_PATH.$filepath.'.php', '\\', DIRECTORY_SEPARATOR);
  }
}

