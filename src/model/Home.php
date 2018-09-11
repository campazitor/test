<?php

    namespace Src\model;

    use Src\base\Model;

    class Home extends Model {

        public $table = 'students';

        public function getAttr(){
            $attr = include ROOT.'/app/config/fields.php';
            return $this->attr = $attr;
        }

    }