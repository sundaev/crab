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
        return self::$app;
    }
    
    /**
     * 初始化
     */
    public function init($config = null)
    {
        
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
}