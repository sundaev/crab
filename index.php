<?php
/**
 * 入口文件
 */
define('CRAB_AUTH', true);

//错误等级
error_reporting( E_ERROR & ~E_DEPRECATED & ~E_STRICT);

/*系统目录操作符*/
define('DS', '/');

/*当前应用程序根目录*/
define('APP_PATH', dirname(__FILE__));

/*系统根目录*/
define('ROOT_PATH', APP_PATH);

/*系统核心库目录*/
define('CORE_PATH', ROOT_PATH . DS . 'core');

/*加载系统核心包*/
require CORE_PATH . DS . 'core.php';

Base::app();

Base::app()->run();