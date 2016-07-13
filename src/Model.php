<?php
namespace Crab;

use Crab\Db\Db;

class Model extends Db
{
    private $host;          //数据库主机IP
    private $username;      //数据库用户名
    private $password;      //数据库密码
    private $dbname;        //数据库名
    private $charset = 'utf8';       //字符集
    
    private $queryID = null;//查询结果ID
    
    public $link;           //数据库连接对象
    
    public $tableName;
    
    public $fields = [];
    
    public function __construct($tableName = '', $tablePrefix = '', $connection = '')
    {
        $connection = empty($connection) ? $this->Db() : '';
    }

    public function db()
    {
        $db = new Db();
        return $db->getInstance();
    }

    
    /**
     * 查询sql获取结果数组
     * @param string $query 查询语句
     * @return array
     */
    public function query($query)
    {
        return $this->db()->query($query);
    }
    
    /**
     * 获得所有的查询数据
     * @return array
     */
    private function getAll()
    {
        return $this->db()->getAll($query);
    }
    
    /**
     * 释放查询结果
     */
    public function free()
    {
        $this->db()->queryID = null;
    }
    
    /**
     * 关闭数据库
     * @return type
     */
    public function close()
    {
        $this->db()->close();
    }
    
    public function __destruct()
    {
        $this->close();
    }
}