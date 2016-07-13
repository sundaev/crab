<?php
namespace Crab;
class Controller extends \Smarty
{
    public $id;
    
    public $action;
    
    public function __construct($id = null)
    {
        parent::__construct();
        $this->id = $id;
    }
    
    public function run($action_name)
    {
        $this->setTemplateDir('./views/');
        //编译目录
        $this->setCompileDir('./runtime/view_c/');
        //缓存目录
        $this->setCacheDir('./runtime/cache/');

        //启动动作
        $this->action = $action_name;
        $this->$action_name();
    }
    
    public function display($template = null, $cache_id = null, $compile_id = null, $parent = null)
    {
        if(is_null($template))
        {
            $c = $this->id;
            $a = $this->action;
            $template = "{$c}/{$a}.html";
        }
        
        return parent::display($template, $cache_id, $compile_id, $parent);
    }
}