<?php
namespace Crab\Db;
/**
 * 数据库
 */
class Db
{
    public function getInstance()
    {
        require_once CORE_PATH . DS . 'Db' . DS . 'DbMysqli.php';
        $mysqli = new DbMysqli();
        return $mysqli;
    }

}