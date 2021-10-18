<?php
namespace app\admin\controller;

use think\facade\Db;
use think\facade\View;

class Banner
{
    public function adv()
    {
        $list=Db::name('banner')->order('sort')->select()->toArray();
        View::assign('list',$list);
        return view();
    }
}
