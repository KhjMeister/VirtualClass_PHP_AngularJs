<?php


define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);


// if (file_exists(ROOT . 'vendor/autoload.php')) {
//     require ROOT . 'vendor/autoload.php';
// }
spl_autoload_register(function ($class)
{
	$root=dirname(__DIR__);
	$file=$root.'/'.str_replace('\\', '/', $class).'.php';

	if(is_readable($file)){
		require $root.'/'.str_replace('\\', '/', $class).'.php';

	}
});

require APP . 'config/config.php';

require APP . 'libs/helper.php';

require APP . 'core/application.php';
require APP . 'core/controller.php';

$app = new Application();
