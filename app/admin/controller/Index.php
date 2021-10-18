<?php
declare (strict_types = 1);

namespace app\admin\controller;

use think\facade\Db;
use think\facade\Route;
use think\facade\View;

class Index
{
    public function index()
    {
        //模板输出替换
        //config<view.php
        //'tpl_replace_string'=>[
        //      '__大写__' => '/static'
        //]
        //使用： 在html中进行路径替换

        //模板文件包括
        //{include file='模版文件1,模版文件2,...' /} 引入文件相对于view目录下文件
        //注意：不能a引入b，b在引入a

        return view();

    }

    public function info()
    {
        $list=Db::name('program')->where('id', 1)->find();
        View::assign('list',$list);
        return view();
    }
    public function pass()
    {
        return view();
    }
    public function head()
    {
        return view();
    }
}
