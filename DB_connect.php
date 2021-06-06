<?php
session_start();
define('_SHOP_NAME', '會員處理樣板');
define('_DB_HOST', 'localhost');
define('_DB_ID', 'root');
define('_DB_PW', '');
define('_DB_NAME', 'act');


//require_once "function.php";
$dsn = "mysql:dbname=" . _DB_NAME . ";host=" . _DB_HOST .  ";port=3306";
$username = _DB_ID;
$password = _DB_PW;
try {
    // 建立MySQL伺服器連接和開啟資料庫 
    $db = new PDO($dsn, $username, $password);
    $db->exec("set names utf8");
    // 指定PDO錯誤模式和錯誤處理
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "成功建立MySQL伺服器連接和開啟資料庫" . $dsn; 
} catch (PDOException $e) {
    echo "連接失敗: " . $dsn;
}

class setTable
{

    function __construct($tablename)
    {
        global $db;
        $this->tablename = $tablename;
        $sql = "SHOW INDEX FROM {$this->tablename} ";
        $result = $db->query($sql);
        $data = $result->fetch(PDO::FETCH_ASSOC);
        $this->primaryKey="seq";
        
    }

    function findByCondiction($condiction)
    {
        global $db;
        $sql = "SELECT * FROM {$this->tablename} WHERE {$condiction} ";
        //echo $sql;
        $result = $db->query($sql);
        
        $data=[];
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $data[]=$row;
        }
        return $data;
    }

    function findByKeyValue($key,$value)
    {
        global $db;
        $sql = "SELECT * FROM {$this->tablename} WHERE {$key}='{$value}'";
        $result = $db->query($sql);
        //echo $sql;
        $data=[];
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $data[]=$row;
        }
        return $data;
    }


    function findAll()
    {
        global $db;
        $sql = "SELECT * FROM {$this->tablename}";
        $result = $db->query($sql);
        $data=[];
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $data[]=$row;
        }
        return $data;
    }


    function insert($data)
    {
        global $db;
        $keys=implode(",",array_keys($data));
        $values="'".implode("','",array_values($data))."'";
        $sql="INSERT INTO {$this->tablename} ({$keys}) values({$values});";
  
        $db->query($sql);
        return $db->lastInsertId();


    }

    function update($data)
    {
        global $db;
        $settingValue=array();
        $id=$data[$this->primaryKey];
        unset($data[$this->primaryKey]);
        foreach($data as $key => $value){
            $settingValue[]=$key.'='."'{$value}'";
        }
        $valueStr=join(",",$settingValue);
        if ($id){
            $sql="UPDATE {$this->tablename} SET {$valueStr} WHERE {$this->primaryKey}='{$id}' ;";
        }
        
        //echo $sql.'<br>';
        $db->query($sql);
        return $sql;

    }

    //條件值
    function delete($id)
    {
        global $db;
        $sql="DELETE FROM {$this->tablename} WHERE {$this->primaryKey}='{$id}';";
        //return $sql;
        $db->query($sql);
    }
}