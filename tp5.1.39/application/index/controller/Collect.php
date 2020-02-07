<?php
/**
分组路由
 */

namespace app\index\controller;
use think\Controller;

class Collect extends Controller
{
    public function index()
    {
        return "index";
    }

    public function read($id)
    {
        return 'read is  '.$id;
    }
    public function who($name)
    {
        return "your name is  ".$name;
    }

}