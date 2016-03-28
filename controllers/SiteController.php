<?php
class SiteController extends Controller
{
    public function index()
    {
        $hello = 'hello world';
        
        $this->assign('hello', $hello);
        $this->display();
    }
    
    public function hello()
    {
        echo 'hello world!';
    }
}