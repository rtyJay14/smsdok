<?php

if(isset($_GET['debug'])) ini_set('display_errors','On'); else ini_set('display_errors','Off');
error_reporting(E_ALL ^ E_NOTICE);
set_time_limit(90);

//date_default_timezone_set('Asia/Manila');

define('APPS_DIR', '/home/p472666/public_html/rice/scripts');
define('HOME_DIR', '/home/p472666/public_html/rice');
$DBURL = "mysql://p472666_rice:T=t6Grz9W[rm@localhost/p472666_rice";

spl_autoload_register('core::autoload');
$core = new core();
require_once(APPS_DIR."/includes/class.xdb.php/class.xdb.php");
require_once(APPS_DIR."/includes/function.relativetime.php");
require_once(APPS_DIR."/includes/class.random.php");
require_once(APPS_DIR."/riceplusplus.php");

class core {
    public static function __callStatic($function, $args) {
        return self::__call($function, $args);
    }

    public function __call($function, $args) {

        if(!function_exists($function)) {
			$name = $function;
    		$name_lower = strtolower($name);
            $apps = APPS_DIR;
            $files = array(
                getcwd() ."/$name_lower.php",
                getcwd() ."/function.$name_lower.php",
                "$apps/includes/function.$name_lower.php",
                "$apps/includes/function-$name_lower-php/function.$name_lower.php",
		        str_replace('_', '/', "$apps/includes/3rd-party/$name.php"),
            );

            foreach($files as $file) {
                if(file_exists($file)) require $file;
            }
        }

        return call_user_func_array($function, $args);
    }

	public static function autoload($name) {

	    $apps = APPS_DIR;
	    $name_lower = strtolower($name);
	    $files = array(
	        getcwd() ."/class.$name_lower.php",
	        "$apps/includes/class.$name_lower.php",
	        "$apps/includes/class-$name_lower-php/class.$name_lower.php",
	        str_replace('_', '/', "$apps/includes/3rd-party/$name.php"),
	        "$apps/includes/3rd-party/$name_lower/$name.php",
	    );

	    foreach($files as $file) {
	        if(file_exists($file)) {
	            require $file;
	        }
	    }
	}
}


?>