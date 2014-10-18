<?php
/**********************************************************************************
 * BASE CONFIG FILE                                                               *
 * It contains only config data that does not change from server to server        *
 **********************************************************************************/

define('DOC_ROOT',								str_replace('\\', '/', realpath(dirname(__FILE__) . '/..')).'/');
define('HTACCESS_REWRITE_BASE', 				'/validateinfo');

define('SITE_URL',						'http://'.$_SERVER['HTTP_HOST']);

define('APP_ROOT', 						DOC_ROOT);
define('PAGES_ROOT', 					'pages');
define('DEFAULT_ROUTE_CONTROLLER', 		'Personalinfo');



define('APP_URL', 						SITE_URL);

define('CORE_ROOT',								DOC_ROOT.'engine/');
define('CONFIG_ROOT',							DOC_ROOT.'config/');

define('MODULES_ROOT',							DOC_ROOT.'modules/');
define('MODULES_URL',							SITE_URL.'/modules/');

define('THEMES_ROOT',							DOC_ROOT.'themes/');
define('THEMES_URL',							SITE_URL.'/themes/');

define('SYSTEM_DEFAULT_ROUTE_SECTION',			'Main');
define('SYSTEM_DEFAULT_ROUTE_ACTION',			'index');
define('SYSTEM_SESSION_SALT',					'MOROIBCK_');
