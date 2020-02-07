<?php
/**
 * Created by PhpStorm.
 * User: Microsoft
 * Date: 2020/2/7
 * Time: 14:46
 */

namespace app\index\controller;


class HelloWorld
{
    public function index()
    {
        return  "helloword";
    }
    public function det($id)
    {
        $arr=[
            'a'=>'12',
            'b'=>15
        ];
        return json($arr);
    }

}