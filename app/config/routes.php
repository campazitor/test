<?php
    /**
     * list routes
     */
    return [
        'delete/([0-9]+)' => 'home/delete/$1',
        'edit/([0-9]+)'   => 'home/edit/$1',
        'add'             => 'home/add',
        'index'           => 'home/index',
    ];