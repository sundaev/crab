<?php
class Base
{
    private static $app;
    
    public $defaultController = 'Site';
    
    public $defaultAction = 'index';
    
    public static function app()
    {
        if(is_null(self::$app))
        {
            self::$app = new self;
        }
        self::$app->init();
        return self::$app;
    }
    
    /**
     * 初始化
     */
    public function init($config = null)
    {
        date_default_timezone_set('PRC');

        //是否以调试模式运行
        if(defined('APP_DEBUG') && APP_DEBUG == true){
            ini_set('display_errors', 'On');    //开启错误报告
            error_reporting(E_ALL);
        }

        //创建项目文件夹结构
        $this->buildAppDir();

        //自动加载

        //router

        //import目录

        //加载组件components

        


    }
    
    /*
     * 运行
     */
    public function run()
    {
        //获取访问控制器
        if(isset($_GET['c']))
        {
            $c = $_GET['c'];
        }else{
            $c = $this->defaultController;
        }
        
        //获取Action
        if(isset($_GET['a']))
        {
            $a = $_GET['a'];
        }else{
            $a = $this->defaultAction;
        }
           
        
        //加载控制器
        $className = $c . 'Controller';
        $filePath =  ROOT_PATH . DS . 'controllers' . DS . $className . '.php';
        include($filePath);
        
        $controller = new $className($c);
        $controller->run($a);
    }

    public function buildAppDir()
    {
        //TODO
    }
}