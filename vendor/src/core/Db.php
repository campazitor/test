<?php

namespace src\core;


class Db {

    protected $pdo;
    protected static $instance;

    protected function __construct()
    {
        $db = require ROOT.'/config/config_db.php';
        $option = [
          \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
          \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        ];
        $this->pdo = new \PDO($db['dsn'],$db['user'],$db['password'],$option);
    }

    /**
     *      *
     * @return Db
     */
    public static function instance(){
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * execution of the request
     *
     * @param $sql string
     * @return bool
     */
    public function execute($sql){
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute();
    }

    /**
     * request to the database
     *
     * @param $sql string
     * @return array
     */
    public function query($sql){
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute();
        if($result !== false){
            return $stmt->fetchAll();
        }
        return [];
    }
}