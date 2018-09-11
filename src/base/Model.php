<?php

    namespace Src\base;

    use Src\Database;

    class Model {

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
        public function __construct() {
            $this->pdo = Database::instance();
        }

        /**
         * save new block in database
         *
         * @param $table string
         * @param $attr array
         *
         * @return bool
         */
        public function save($table, $attr) {
            foreach ($attr as $name => $value) {
                $columns[] = "$name='$value'";
            }
            $sql = "INSERT INTO $table SET " . implode(",", $columns);
            return $this->pdo->execute($sql);
        }

        /**
         * update block in database
         *
         * @param $table
         * @param $data
         *
         * @return bool
         */
        public function update($table, $data) {
            if (isset($data['id'])) {
                foreach ($data as $name => $value) {
                    if ($name == 'id') {
                        continue;
                    }
                    $columns[] = "$name='$value'";
                }
                $sql = "UPDATE " . $table . " SET " . implode(",", $columns) . " WHERE id = " . $data['id'] . "";
                return $this->pdo->execute($sql);
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
        public function delete($table, $id) {
            $sql = "DELETE FROM " . $table . " WHERE id = " . $id . "";
            return $this->pdo->execute($sql);
        }

        /**
         * select all records
         *
         * @return array
         */
        public function findAll() {
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
        public function findOne($id) {
            $sql = "SELECT * FROM {$this->table} WHERE id=$id";
            return $this->pdo->queryOne($sql);
        }

    }