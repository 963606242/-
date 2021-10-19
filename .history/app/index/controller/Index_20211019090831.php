<?php

namespace app\index\controller;
use app\BaseController;
use think\facade\Db;
use think\facade\Request;
use think\facade\Route;
use think\facade\View;

class Index extends BaseController
{
    public function index()
    {
        //视图渲染：
        //控制器对应View目录下目录名 大写转小写加下划线
        //方法名对应html文件名      大写转小写加下划线  以.html为后缀结尾
        //当fetch方法没有参数的时候  默认关联对应的html文件  控制器对应view下相同名的目录  方法名对应html文件名
        // 如 helloWord 对应 hello_word.html文件
        //当fetch方法有参数时        对应渲染指定的html页面
        //fetch('应用名/控制器名/方法名')
        //return View::fetch('user');
        //return View::fetch('demo/demo');
        //return View::fetch('admin@index/index');
        //相对路径
        //return View::fetch('../view/index/user');
        //view()  渲染试图的助手函数
        //return View();

        //url生成
        //参数为空时 默认生成当前方法自己的链接
        //参数（'应用/控制器/方法'） 从前到后 可以依次省略
        //echo Route::buildUrl();                     ///index.php/admin/Index/index.html
        //echo Route::buildUrl('user');               ///index.php/index/Index/user.html
        //echo Route::buildUrl('user/user');         ///index.php/index/user/user.html
        //echo Route::buildUrl('admin/user/user');  ///index.php/admin/user/user.html

        //参数('','链接地址栏参数') 从前到后 可以依次省略
        //echo Route::buildUrl('',['id'=>1,'name'=>'tian']); ///index.php/index/Index/index.html?id=1&name=tian

        //suffix 指定生成静态后缀
        //echo Route::buildUrl()->suffix(".php"); ///index.php/index/Index/index.php

        //指定生成二级域名
        //echo Route::buildUrl()->domain('www'); //http://www.tp30.com/index.php/index/Index/index.html

        //     * @param string      $url    路由地址
        //     * @param array       $vars   变量
        //     * @param bool|string $suffix 生成的URL后缀
        //     * @param bool|string $domain 域名
        //echo url(); ///index.php/index/Index/index.html
        //echo url('admin/index/index',['id'=>2],'.php','demo');
        //http://demo.tp30.com/index.php/admin/index/index.php?id=2

        //在html模板中写法
        //{:url('admin/Index/info')}

        //模板赋值
        //赋值标量数据  (标量：字符串、整型、浮点、布尔值)
        //$name='乔泓';
        //View::assign('name',$name);
        //[一维数组]
        //$arr=[
        //    '刘备',
        //    '男',
        //];
        //View::assign('arr',$arr);
        //[多维数组]
        //$arr2=[
        //    [
        //      'name'=>'刘备',
        //      'sex'=>'男'
        //    ],
        //    [
        //        'name'=>'关羽',
        //        'sex'=>'男'
        //    ]
        //];
        //View::assign('arr2',$arr2);
        //[对象]
        //$obj=new \stdClass();
        //$obj->name='张飞';
        //View::assign('obj',$obj);
        //[批量赋值]
        //$arr3=[
        //    'name'=>'孙尚香',
        //    'sex'=>'女'
        //];
        //View::assign($arr3);

        //内置循环
        //循环标签
        // foreach标签 name='循环数据来源' key='数组索引' item='循环变量'
        // volist标签 name='循环数据来源' id='循环变量' $key='数组索引'
        //      key='数组循环计数器' offset='起始位置' length='数据长度'
        //      mod='范围循环' empty='默认值'
        //$arr=[
        //    [
        //        'id'=>1,
        //        'name'=>'刘备'
        //    ],
        //    [
        //        'id'=>2,
        //        'name'=>'关羽'
        //    ],
        //    [
        //        'id'=>3,
        //        'name'=>'张飞'
        //    ],
        //    [
        //        'id'=>4,
        //        'name'=>'赵云'
        //    ],
        //];
        //View::assign('list',$arr);

        //比较标签
        //$name=1;
        //View::assign('name',$name);

        //$a=time();
        //View::assign('a',$a);

        //请求类 param 接get post pathinfo 参数
        // ?id=1 /id/1(pathinfo)
        //$param = Request::param();
        //get 没有参数默认接数组
        //     指定接参变量名 接单独变量的值
        //$get = Request::get('id');
        //post 接参
        //$post = Request::post();
        //文件接参
        //$file = Request::file();

        //【请求信息】
        //$controlle =Request::controller();
        //$action = Request::action();
        //$app = app('http')->getName();
        //echo $app.'/'.$controlle.'/'.$action;

        //请求接参参数
        //Request::get('变量名/变量修饰符','默认值','过滤方法');
        //修饰符	作用
        //s	强制转换为字符串类型
        //d	强制转换为整型类型
        //b	强制转换为布尔类型
        //a	强制转换为数组类型
        //f	强制转换为浮点类型
        //【php常用过滤函数】
        //  stripslashes()主要功能是删除反斜杠
        //  htmlentities() 把字符转换为 HTML 实体
        //  htmlspecialchars() 函数把预定义的字符 "<" （小于）和 ">" （大于）转换为 HTML 实体:
        //  strip_tags()函数剥去字符串中的 HTML 标签：
        //$id=Request::get('id/s','123','stripslashes,htmlentities,htmlspecialchars,strip_tags');
        //var_dump($id);

        //has判断变量是否设置
        //Request::has('id','post');

        //助手函数 input
        //input('?get.id');//判断get 请求的id变量是否设置
        //input(); //相当于Request::param();
        //input('请求方式.变量名/变量修饰符','默认值','过滤函数');

        //$res = Db::name('user')->where('id','in','1,2,4')->select();
        //$res = Db::name('user')->where('id','between','1,4')->select();
        //$res = Db::name('user')->where('openid','notnull')->select();
        //$res = Db::name('user')->where('addtime','BETWEEN TIME','1998-9-9,2021-1-1')->select();
        //Db::name('user')
        //    ->alias([
        //        'user'=>'u',
        //        'order'=>'o'
        //    ])
        //    ->select();

        //$res=Db::name('user')->group('addtime')->select();
        //    //->withoutField('id')
        //    //->select();
//
//
        //echo "<pre>";
        //print_r($res);
        //echo "</pre>";

        //这是一个测试修改

        //find in set where()用法
        //$list=Db::name('user')->where('head_img','find in set','j')->select()->toArray();

        //时间查询
        $list=Db::name('user')->whereTime('addtime','<=','2021-09-19')->select()->toArray();
        echo '<pre>';
        echo print_r($list);
        echo '<pre/>';

        echo "<h1>欢迎访问我的代码学习网址</h1>";




        return view();
    }

    public function user()
    {
        return View::fetch();
    }
}
