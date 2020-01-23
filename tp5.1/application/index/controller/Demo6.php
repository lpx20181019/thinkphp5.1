<?php
/**
 * Created by PhpStorm.
 * User: Microsoft
 * Date: 2020/1/23
 * Time: 20:12
 */

namespace app\index\controller;
use app\index\model\Student;
use think\Db;

class Demo6
{
    public function getone()
    {
//        return Student::get(3);
        //用查询构造器创建更加复杂的查询,返回的是对象
        dump(Student::field('id,name,email')->where('id',1)->find());
        //下面方法返回数组
//        dump(Db::table('Student')->field('id,name,email')->where('id',1)->find());
    }
    public function getall()
    {
//        dump(Student::all([1,2,3]));
    }


}