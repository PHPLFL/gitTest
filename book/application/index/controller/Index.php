<?php
namespace app\index\controller;

class Index
{
    public function index()
    {
        return 'ThinkPHP5';
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
