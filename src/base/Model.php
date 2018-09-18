<?php

    namespace Src\base;

    use Src\Database;

    class Model
    {

        /**
         * @var Database
         */
        protected $pdo;

        /**
         * current table
         *
         * @var string
         */
        protected $table;

        /**
         * values for writing to the database
         *
         * @var array
         */
        protected $attr = [];

        /**
         * Model constructor.
         */
        public function __construct()
        {
            $this->pdo = Database::instance();
        }

        /**
         * save new block in database
         *
         * @param $table string
         * @param $param array
         *
         * @return bool
         */
        public function save($table, $param)
        {
            $sql = "INSERT INTO $table SET " . $this->getParam();
            return $this->pdo->execute($sql, $param, $this->getAttrType());
        }

        /**
         * update block in database
         *
         * @param $table
         * @param $data
         *
         * @return bool
         */
        public function update($table, $data)
        {
            if (isset($data['id'])) {
                $sql = "UPDATE " . $table . " SET " . $this->getParam() . " WHERE id = " . $data['id'] . "";
                unset($data['id']);
                return $this->pdo->execute($sql, $data, $this->getAttrType());
            }
        }

        /**
         * delete block in database
         *
         * @param $table
         * @param $id
         *
         * @return bool
         */
        public function delete($table, $id)
        {
            $sql = "DELETE FROM " . $table . " WHERE id = " . $id . "";
            return $this->pdo->execute($sql);
        }

        /**
         * select all records
         *
         * @return array
         */
        public function findAll()
        {
            $sql = "SELECT * FROM {$this->table} ORDER by rank DESC";
            return $this->pdo->query($sql);
        }

        /**
         * select one record
         *
         * @param $id integer
         *
         * @return array
         */
        public function findOne($id)
        {
            $sql = "SELECT * FROM {$this->table} WHERE id=$id";
            return $this->pdo->queryOne($sql);
        }

        /**
         * get the parameter string for the query
         *
         * @return string
         */
        public function getParam()
        {
            $param = $this->getAttrType();
            $row = '';
            foreach ($param as $name => $value) {
                $row .= "$name = :$name, ";
            }
            $row = rtrim(rtrim($row), ',');
            return $row;
        }

        /**
         * return table fields with field name in the table header
         *
         * @return array
         */
        public function getAttr()
        {
            if (file_exists(FIELD)) {
                $array = include FIELD;
                $attr = [];
                foreach ($array as $key => $value) {
                    $key_new = explode("/", $key);
                    $attr[$key_new[0]] = $value;
                }
                return $this->attr = $attr;
            }
        }

        /**
         * return table fields with types
         *
         * @return array
         */
        public function getAttrType()
        {
            if (file_exists(FIELD)) {
                $array = include FIELD;
                $attr = [];
                foreach ($array as $key => $value) {
                    $key_new = explode("/", $key);
                    $attr[$key_new[0]] = $key_new[1];
                }
                return $this->attr = $attr;
            }
        }

    }