<?php
/**
 * Created by PhpStorm.
 * User: Microsoft
 * Date: 2020/1/23
 * Time: 21:56
 */

namespace app\index\controller;


use think\Controller;

class Address extends Controller
{
    public function index()
    {
        return 'index';
    }
    public function details($id)
    {
        return 'details 目前调用的 id：'.$id;
    }
    public function search($id,$uid)
    {
        return 'search 目前调用的 id：'.$id.",uid:".$uid;
    }
    public function url()
    {

    }

}
