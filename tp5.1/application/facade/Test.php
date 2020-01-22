<?php
/**
 * Created by PhpStorm.
 * User: Microsoft
 * Date: 2020/1/22
 * Time: 14:22
 */

namespace app\facade;
/*
 * facade下的Test类代理common下的Test类
 */

use think\Facade;

class Test extends Facade
{
    protected static function getFacadeClass()
    {
        //代理的是这个类
//        return "app\common\Test";
    }

}