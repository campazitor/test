<?php

namespace src\core\base;


use src\core\Db;

abstract class Model
{
    protected $pdo;
    protected $table;
    public $attr = [];

    public function __construct()
    {
        $this->pdo =Db::instance();
    }

    /**
     * save new block in database
     *
     * @param $table string
     * @param $attr array
     * @return bool
     */
    public function save($table, $attr){
        foreach ($attr as $name=>$value){
            $columns[] = "$name='$value'";
        }
        $sql = "INSERT INTO $table set ".implode(",",$columns);
        return $this->pdo->execute($sql);
    }

    /**
     * @param $sql string
     * @return bool
     */
    public function query($sql){
        return $this->pdo->execute($sql);
    }

    /**
     * select all records
     *
     * @return array
     */
    public function findAll(){
        $sql = "SELECT * FROM {$this->table} ORDER by rank DESC";
        return $this->pdo->query($sql);

    }

    /**
     * select one record
     *
     * @param $id integer
     * @return array
     */
    public function findOne($id){
        $sql = "SELECT * FROM {$this->table} WHERE id=$id";
        return $this->pdo->query($sql);

    }

}