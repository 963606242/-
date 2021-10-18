<?php
namespace app\admin\controller;
use think\facade\Db;
use think\facade\View;

class Vip
{
    public function vipAdd()
    {
        return view();
    }
    public function vipList()
    {
        $list=Db::name('user')->paginate(5);
        View::assign('list',$list);

        return view();
    }
}
