<?php
/**
 * Created by PhpStorm.
 * User: Microsoft
 * Date: 2020/1/21
 * Time: 21:01
 */

namespace app\index\controller;
/*
 * 容器与依赖注入的原理
 * ----------------------------
 * 1.任何的url访问，最终定位到控制器，由控制器里某个具体的方法执行
 * 2.一个控制器对应一个类，这个类需要统一管理，所以容器来进行类管理，还可以将类的实例作为参数，传递给类方法，自动触发依赖注入
 * 依赖注入：将对象类型的数据，以参数的方式传到方法的参数列表中
 *url 访问:通过get方式将数据传到控制器指定的方法中，但是只能传字符串，数值，如果要传一个对象，怎么办
 * 依赖注入解决了向类中的方法传对象的问题
 */

use app\common\Temp;

class Demo1
{
    //通过字符串，数值来传值到类方法中
    public function getName($name='hello')
    {
        return "hello".$name;
    }

    //Temp $temp 将会触发依赖注入（相当于实例化） new \app\common\Temp;
    public function getMethod(Temp $temp)
    {
        $temp->setName('love you');
        return $temp->getName();
    }

    //绑定一个类到容器
    public function bindClass()
    {
        //把一个类放到容器中，相当于注册到容器中
        \think\Container::set('temp','\app\common\Temp');

        //将容器中的类实例化并取出来用，实例化时可调用构造器初始化
        $temp=\think\Container::get('temp',['name'=>'peter_lin']);
        return $temp->getName();
    }

    //绑定一个闭包到容器，闭包理解为一个匿名函数
    public function bindClosure()
    {
        //把一个闭包放到容器中
        \think\Container::set('demo',function($name){
            return "我爱---".$name;
        });
        /*相当于
         * $demo=function ($name){
         * return *******
         * }
         */

        //将容器中的闭包实例化并取出来用，实例化时可调用构造器初始化
        return \think\Container::get('demo',['name'=>'阚清子']);
    }
}