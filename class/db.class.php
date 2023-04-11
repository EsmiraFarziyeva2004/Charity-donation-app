<?php

namespace Database;
use PDO;
use PDOException;

class Database{
    private $servername = "localhost";
    private $username   = "root";
    private $database   = "charity";
    private $password   = "";
    private $charset    = "utf8";
    public  $conn;

    public function __construct(){
        $this->connect();
    }

    protected function connect(){
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("set names ".$this->charset);
            } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            }
        return $this->conn;
    }

    protected function get($columns, $table, $where=null){
        $where      = !is_null($where) ? "WHERE $where" : null;

        $sql = "SELECT $columns FROM $table $where";
        $que = $this->conn->prepare($sql);
        $que->execute();
        $res = $que->fetchAll();
        
        return $res;
    }

    protected function set($table, $col_var, $where=null){
        $col_var    = $this->parseUpdateArray($col_var);
        $where      = !is_null($where) ? "WHERE $where" : null;

        $sql        = "UPDATE $table SET $col_var $where";
        $que        = $this->conn->prepare($sql);

        return $que->execute();
    }

    public function add($table, $col_var){
        $col_var    = $this->parseInsertArray($col_var);
        $sql        = "INSERT INTO $table $col_var";
        $que        = $this->conn->prepare($sql);
        return $que->execute();
    }

    public function del($table, $where=null){
        $where      = !is_null($where) ? "WHERE $where" : null;

        $sql        = "DELETE FROM $table $where";
        $que        = $this->conn->prepare($sql);

        return $que->execute();
    }

    private function parseUpdateArray($array){
        $parse = implode(',', array_map(
                    function ($v, $k) {
                        $v = is_int($v) ? $v : "'$v'";
                        return $k.'='.$v;
                    },
                    $array,
                    array_keys($array)
                ));
        return $parse;
    }

    private function parseInsertArray($array){
        $parse_col = implode(',', array_map(
            function ($v, $k) {
                return "$k";
            },
            $array,
            array_keys($array)
        ));

        $parse_var = implode(',', array_map(
            function ($v, $k) {
                $v = is_int($v) ? $v : "'$v'";
                return "$v";
            },
            $array,
            array_keys($array)
        ));
        $parse = "($parse_col) VALUES($parse_var)";
        return $parse;
    }

}

    
?>