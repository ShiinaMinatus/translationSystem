<?php

//error_reporting(E_ERROR | E_WARNING | E_PARSE);

/**
 * 路径定义
 */
defined('WebSiteName') or define('WebSiteName', 'website');


defined('WebSiteName1') or define('WebSiteName1', '/translationSystem');
defined('PHOTO_URL') or define('PHOTO_URL', 'http://localhost/translationSystem/uploads/'); //定义图片路径

defined('ROOT_DIR') or define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT'] . WebSiteName1 . '/' . WebSiteName);

//defined('WebSiteName') or define('WebSiteName', '/wchatplatform');

defined('Config') or define('Config', ROOT_DIR . '/Config');



defined('PLUG') or define('PLUG', ROOT_DIR . '/Plug');

defined('EXTEND') or define('EXTEND', ROOT_DIR . '/Extend');

defined('SmartyDir') or define('SmartyDir', ROOT_DIR . '/Config/Smarty');

defined('LOG_FILE_SIZE') or define('LOG_FILE_SIZE', 2097152); // 日志文件大小限制

defined('LOG_STATE') or define('LOG_STATE', 0);  // 是否开启日志  0为开启 1 为关闭

defined('URL_PATHINFO_DEPR') or define('URL_PATHINFO_DEPR', '/');

defined('URL_MODEL') or define('URL_MODEL', '1'); //url模式 0为默认模式  1 为 pathinfo模式

defined('LIB') or define('LIB', ROOT_DIR . '/Lib/');

defined('WebSiteUrl') or define('WebSiteUrl', 'http://' . $_SERVER['HTTP_HOST'] . WebSiteName1 . '/' . WebSiteName);


defined('SQLLog') or define('SQLLog', ROOT_DIR . '/Log/SQL/');



defined('WebSiteUrlEN') or define('WebSiteUrlEN', 'http://' . $_SERVER['HTTP_HOST'] . WebSiteName1 . '/en');

defined('WebSiteUrlPublic') or define('WebSiteUrlPublic', 'http://' . $_SERVER['HTTP_HOST'] . WebSiteName1 . '/' . WebSiteName . '/Public');


defined('URL_PATHINFO_FETCH') or define('URL_PATHINFO_FETCH', 'ORIG_PATH_INFO,REDIRECT_PATH_INFO,REDIRECT_URL');
/**
 * 关闭报错信息 把报错信息存储到错误文件中
 */
ini_set("display_errors", 0);


defined('VAR_MODULE') or define('VAR_MODULE', 'a');

defined('VAR_ACTION') or define('VAR_ACTION', 'v');

defined('VAR_GROUP') or define('VAR_GROUP', 'g');

defined('VAR_CUSTOMIZE') or define('VAR_CUSTOMIZE', 'c');
?>
