<?php
date_default_timezone_set('Asia/Shanghai');
define('ROOT_PATH', __DIR__.'/');

include_once 'Loader.php';
spl_autoload_register('Loader::autoload');
@session_start();

$app = new App\Web();
$app->run();



