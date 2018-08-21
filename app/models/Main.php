<?php

namespace app\models;


use src\core\base\Model;

class Main extends Model
{
    public $table = 'students';

    public $attr = [
        'secondname' => '',
        'name' => '',
        'rank' => ''
    ];


}