<?php

    namespace Src;

    class Database
    {

        protected $pdo;

        protected static $instance;

        /**
         * Database constructor.
         */
        protected function __construct() {
            $db = require DB;
            $option = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            ];
            $this->pdo = new \PDO($db['dsn'], $db['user'], $db['password'], $option);
        }

        /**
         * connection to the database
         *
         * @return Database
         */
        public static function instance() {
            if (self::$instance === NULL) {
                self::$instance = new self;
            }
            return self::$instance;
        }

        /**
         * execution of the request
         *
         * @param $sql string
         * @param $param array
         * @param $paramType array
         *
         * @return bool
         */
        public function execute($sql, $param = [], $paramType = []) {
            $stmt = $this->pdo->prepare($sql);
            if (isset($param)) {
                foreach ($param as $key => $value) {
                    switch ($paramType[$key]){
                        case "string":
                            $stmt->bindValue(':'.$key,$value, \PDO::PARAM_STR);
                            break;
                        case "int":
                            $stmt->bindValue(':'.$key,$value, \PDO::PARAM_INT);
                            break;
                    }

                }
            }
            return $stmt->execute();
        }

        /**
         * request selects all records
         *
         * @param $sql string
         *
         * @return array
         */
        public function query($sql) {
            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute();
            if ($result !== FALSE) {
                return $stmt->fetchAll();
            }
            return [];
        }

        /**
         * request selects one record
         *
         * @param $sql string
         *
         * @return array|mixed
         */
        public function queryOne($sql) {
            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute();
            if ($result !== FALSE) {
                return $stmt->fetch();
            }
            return [];
        }

    }