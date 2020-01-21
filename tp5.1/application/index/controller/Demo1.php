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

}