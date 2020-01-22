<?php
/**
 * Created by PhpStorm.
 * User: Microsoft
 * Date: 2020/1/22
 * Time: 14:02
 */

namespace app\index\controller;

//导入静态类
use app\facade\Test;

class Demo2
{
    public function index($name='thinkphp')
    {
        /*
         * 1.通过实例化对象来访问方法
         */
//        $test=new \app\common\Test();
//        return $test->hello($name);

        /*
         * 2.静态方法访问
         * 如果想静态调用一个动态方法，需要给当前的类绑定一个静态代理的类，在app\facade下
         * hello是一个动态方法，却使用了静态方法
         * app\facade\Test 代理了 app\common\Test
         */
//        return Test::hello('china');

        /*
         * 3.动态绑定
         * 如果没有在静态代理类中显示要指定要绑定的类名
         * 将原来app\facade下getFacadeclass 的内容删除后就需要用到下面的内容
         */
        \think\Facade::bind('app\facade\Test','app\common\Test');
        return \app\facade\Test::hello('England');




    }

}