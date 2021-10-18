<?php
namespace app\controller;

use app\BaseController;
use think\facade\Route;

class Index extends BaseController
{
    public function index()
    {
        //[入口文件] index.php

        //[pathinfo访问模式]
        //[单应用模式]
        //http://tp30.com/index.php/Index/index
        //域名/入口文件/控制器名/方法名
        //[多应用模式]
        //http://tp30.com/index.php/index/Index/index
        //域名/入口文件/应用名/控制器名/方法名

        //[控制器类文件定义]
        //类文件 创建位置在controller目录下 驼峰法并且大写
        //命名空间定义 根据当前类文件所在目录路径定义
        //类名与类文件名保持一直 大驼峰法
        //文件夹名小写加下划线

        //[多应用模式]
        //默认框架安装的是单应用
        //多应用需要下载对应的多应用扩展
        //单应用与多应用的区别
        //多一个扩展并且访问连接不同

        //[config配置目录]
        //app.php中设置默认访问应用
        //route.php中设置默认访问的控制器和默认访问的方法

        //[开启调试模式]
        // 将.example.env 重命名只留 .env
        //APP_DEBUG = true / false ： 开启/关闭调试模式
        return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:) </h1><p> ThinkPHP V' . \think\facade\App::version() . '<br/><span style="font-size:30px;">14载初心不改 - 你值得信赖的PHP框架</span></p><span style="font-size:25px;">[ V6.0 版本由 <a href="https://www.yisu.com/" target="yisu">亿速云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=64890268" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="ee9b1aa918103c4fc"></think>';
    }
    public function helloWord(){
        return 'http://tp30.com/index.php/Index/index';
    }
    public function hello($name = 'ThinkPHP6')
    {
        return 'hello,' . $name;
    }
}
