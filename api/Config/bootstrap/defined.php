<?php

date_default_timezone_set('PRC');
date_default_timezone_set('Asia/Shanghai');
/**
 * 路径定义
 */
defined('ROOT_DIR') or define('ROOT_DIR', dirname($_SERVER['SCRIPT_FILENAME']) . '/');

defined('WebSiteName') or define('WebSiteName', 'resume_api');

defined('ModelName') or define('ModelName', 'Model');

defined('ControllerName') or define('ControllerName', 'Controllers');

defined('Logs') or define('Logs', 'Logs');

defined('Config') or define('Config', 'Config');

defined('apiLog') or define('apiLog', ROOT_DIR . Logs . '/Info/');

defined('SQLLog') or define('SQLLog', ROOT_DIR . Logs . '/SQL/');

defined('PLUGDIR') or define('PLUGDIR', ROOT_DIR . 'Plug/');

defined('LOG_FILE_SIZE') or define('LOG_FILE_SIZE', 2097152); // 日志文件大小限制

defined('LOG_STATE') or define('LOG_STATE', 0);  // 是否开启日志  0为开启 1 为关闭

defined('URL_PATHINFO_DEPR') or define('URL_PATHINFO_DEPR', '/');

defined('URL_MODEL') or define('URL_MODEL', '1'); //url模式 0为默认模式  1 为 pathinfo模式


defined('URL_ROUTE') or define('URL_ROUTE', '0'); //url模式 0为默认模式  1 为 pathinfo模式
//defined('TEMPLATEPUBLIC') or define('TEMPLATEPUBLIC', ROOT_DIR.'Controllers');
//
//defined('TEMPLATEURL') or define('TEMPLATEURL','http://localhost/resume_api/Public');
//
//defined('TEMPLATEPATH') or define('TEMPLATEPATH','http://localhost/resume_api/template/');

defined('LIB') or define('LIB', ROOT_DIR . 'Controllers');

defined('URL_PATHINFO_FETCH') or define('URL_PATHINFO_FETCH', 'ORIG_PATH_INFO,REDIRECT_PATH_INFO,REDIRECT_URL');
/**
 * 关闭报错信息 把报错信息存储到错误文件中
 */
error_reporting(E_ERROR | E_WARNING);

ini_set("display_errors", 1);

ini_set("log_errors", "On");

ini_set("error_log", ROOT_DIR . Logs . '/Error/error.log');

defined('Develop') or define('Develop', 1);


$_ENV['DBUSER'] = 'root';

$_ENV['DBPASS'] = '123456';

$_ENV['DBHOST'] = 'localhost';

$_ENV['DBNAME'] = 'translation';
?>
