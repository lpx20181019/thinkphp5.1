<?php
/**
 * Created by PhpStorm.
 * User: Microsoft
 * Date: 2020/1/22
 * Time: 15:10
 */

namespace app\index\controller;
use \think\Db;

/*
 * 连接数据库的几种方式
 * 1.全局配置：config/database.php
 * 在config文件夹下新建一个index模块，在模块下可以新建database.php配置单独的数据库
 * 2.动态配置：think\db\query.php 方法：connect（）
 *3.DSN连接：数据库类型：//同户名：密码@数据库地址：端口号/数据库名称#字符集
 */
class Demo4
{
    //1.
    public function conn1()
    {
        return Db::table('yunzhi_teacher')
            ->where('id',18)->value('name');
    }

    //2.
    public function conn2()
    {
        return Db::connect([
            'type'=>'mysql',
            'hostname'=>'127.0.0.1',
            'database'=>'tp50',
            'username'=>'root',
            'password'=>'root'
        ])
            ->table('yunzhi_teacher')
            ->where('id',18)->value('name');
    }
    //3.
    public  function conn3()
    {
        $dsn='mysql://root:root@127.0.0.1:3306/tp50#utf8';
        return Db::connect($dsn)
            ->table('yunzhi_teacher')
            ->where('id',18)->value('name');
    }


}