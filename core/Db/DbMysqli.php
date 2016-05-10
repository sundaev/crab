<?php
class DbMysqli
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

    public function __construct($tableName = '')
    {
        $this->host = HOST;
        $this->username = USER;
        $this->password = PASS;
        $this->dbname = DBNAME;
        $this->charset = 'utf8';
        $this->tableName = $tableName;

        $this->init();
    }

    /**
     * 数据库初始化，设置字符集
     */
    public function init()
    {
        //连接数据库
        $this->link = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        if ($this->link->connect_errno) {
            echo "Failed to connect to MySQL: (" . $this->link->connect_errno . ") " . $this->link->connect_error;
            exit;
        }
        //设置字符集
        if (! $this->link->set_charset($this->charset)) {
            printf("Error loading character set utf8: %s\n", $this->link->error);
        }
    }

    /**
     * 查询sql获取结果数组
     * @param string $query 查询语句
     * @return array
     */
    public function query($query)
    {
        $this->queryID && $this->free();

        $this->queryID = $this->link->query($query);
        if($this->queryID === false){
            printf("Error: %s\n",$this->link->error);
            exit;
        }

        $this->numRows = $this->queryID->num_rows;
        $this->numCols = $this->queryID->field_count;
        return $this->getAll();
    }

    /**
     * 获得所有的查询数据
     * @return array
     */
    private function getAll()
    {
        //返回数据集
        $result = array();
        if($this->numRows > 0) {
            for($i=0; $i<$this->numRows; $i++ ){
                $result[$i] = $this->queryID->fetch_assoc();
            }
            //指针初始化
            $this->queryID->data_seek(0);
        }
        return $result;
    }

    /**
     * 释放查询结果
     */
    public function free()
    {
        $this->queryID = null;
    }

    /**
     * 关闭数据库
     * @return type
     */
    public function close()
    {
        $this->link && $this->link->close();
        $this->link = null;
    }

    public function __destruct()
    {
        $this->close();
    }
}