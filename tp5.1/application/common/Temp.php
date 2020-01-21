<?php
/**
 * Created by PhpStorm.
 * User: Microsoft
 * Date: 2020/1/21
 * Time: 21:14
 */

namespace app\common;


class Temp
{
    private $name;
    public function __construct($name='tom')
    {
        $this->name=$name;

    }
    public function setName($name)
    {
        $this->name=$name;
    }

    public function getName()
    {
        return '方法是:'.__METHOD__."属性是:".$this->name;
    }

}