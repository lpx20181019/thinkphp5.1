<?php
/**
 * Created by PhpStorm.
 * User: Microsoft
 * Date: 2020/1/22
 * Time: 14:42
 */

namespace app\index\controller;

/*
 * 正常情况下，控制器不依赖与父类Controller.php,推荐继承父类，可以方便的使用父类的方法
 *Controller.php没有静态代理，可在base.php里看静态代理的类
 *
 */


use think\Controller;
use think\facade\Request;

class Demo3 extends Controller
{
    public  function Test()
    {
        /*
         * 1.创建请求对象request的静态代理
         *将动态方法get以静态方法调用
         */
//        dump(Request::get());
        /*
         * 2.实例化方法
         *
         */
        $request=new \think\Request();
        dump($request->get());


    }
    public function test1(\think\Request $request)
    {
        /*
        * 3.依赖注入
        */
        dump($request->get());
    }
    public function test2()
    {
        /*
        * 4.继承父类controller中的属性（request）,他是Request实例 \think\Request
        * http://www.test.com/tp5.1/public/index.php/index/demo3/test2?name=jake&age=12
        */
//        dump($this->request->get());
//输出转化为json格式
        return json_encode($this->request->get());
    }


}