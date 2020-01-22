<?php
/**
 * Created by PhpStorm.
 * User: Microsoft
 * Date: 2020/1/22
 * Time: 15:27
 */

namespace app\index\controller;
/*
 * 数据库的查询构造器（包括读写）
 *学习数据库的CURD
 *
 */

use think\Db;

class Demo5
{
    //1.单条查询
    public  function find()
    {
        /*
         * Db类是数据库操作的入口类
         * 功能：静态调用了think\db\query.php类中的查询方法实现基本操作
         *where :设置查询条件   参数  表达式（单个条件）或数据（多条件）
         * find：返回符合条件的一条记录，没有返回null,如果是主键查询，可以在find中指定
         * field: 返回的字段可以指定，可以利用数组改字段名,但是如果别名是是中文的话似乎不行，会报错
         */
        // SELECT * FROM `yunzhi_teacher` WHERE `username` = 'root' LIMIT 1
       dump(Db::table('yunzhi_teacher')
           ->field(['id'=>'aa','name'=>'aab'])
           ->where('username','=','root')
           ->find());
    }

    //2.多条查询
    public function select()
    {
        //返回的是一个二维数组，没有数据返回是一个空数组
        dump(Db::table('yunzhi_teacher')
        ->field('id','name')
        ->where([
            ['sex','=','1'],
            ['password','=','root']
        ])->select());
    }
    //3.单条插入
    public function insert()
    {
        //成功返回插入的数量，失败返回false
        $data=[
          'name'=>'马云3',
          'username'=>'jake',
          'password'=>'ma',
            'sex'=>'0',
            'email'=>'10086@qq.com'
        ];
        //3.1
//        return Db::table('yunzhi_teacher')->insert($data);
// INSERT INTO `yunzhi_teacher` (`name` , `username` , `password` , `sex` , `email`)
// VALUES ('马云' , 'jake' , 'ma' , 0 , '10086@qq.com') [ RunTime:0.027696s ]

        //3.2    true只有mysql才行，其他数据库类型不行
//        return Db::table('yunzhi_teacher')->insert($data,true);
// REPLACE INTO `yunzhi_teacher` (`name` , `username` , `password` , `sex` , `email`) 相当于insert set
// VALUES ('马云' , 'jake' , 'ma' , 0 , '10086@qq.com') [ RunTime:0.035348s ]
        //3.3 data()方法可以对数据过滤
//        return Db::table('yunzhi_teacher')->data($data)->insert();

        //3.4 插入的同时返回新增的主键
        return Db::table('yunzhi_teacher')->insertGetId($data);
    }


    //4.多条插入
    public  function insertAll()
    {
        $data=[
            ['name'=>'马云1', 'username'=>'jake','password'=>'123'],
            ['name'=>'马云2', 'username'=>'jake','password'=>'123'],
            ['name'=>'马云3', 'username'=>'jake','password'=>'123']
        ];
        return Db::table('yunzhi_teacher')->insertAll($data);
    }
    //5.更新操作
    public function update()
    {
        //update不支持data()过滤方法
        //如果更新条件是主键，直接把主键写入更新数组中
        dump(Db::table('yunzhi_teacher')
            ->where('id',32)
            ->update(['name'=>'潘金莲']));

    }

    //6.删除操作
    public function delete()
    {
        //
        //如果更新条件是主键，直接把主键写入delete(7)中
        dump(Db::table('yunzhi_teacher')
            ->where('id',32)
            ->delete());
    }

    //原生查询
    public function query()
    {
        $sql="select * from yunzhi_teacher where id in (33,34)";
        dump(Db::query($sql));
    }
    //原生写操作：更新，删除，添加
    public function execute()
    {
        return Db::execute("update yunzhi_teacher set `name`='武松' where id=33");
    }


}