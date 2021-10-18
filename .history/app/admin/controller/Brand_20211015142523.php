<?php
namespace app\admin\controller;


use think\facade\Db;
use think\facade\Request;
use think\facade\View;

class Brand
{
    public function brandList()
    {
        $keywords=input('get.keywords');
        $get=Request::get();
        $where=[];
        if (isset($keywords) && !empty($keywords))$where[] = ['brand_name','like',"%{$keywords}%"];
        if (isset($get['recommended']) && $get['recommended']!="")$where[] = ['recommended','=',$get['recommended']];
        if (isset($get['if_show']) && count($get['if_show'])==1)$where[] = ['if_show','in',$get['if_show']];
        if (isset($get['logoarr']) && count($get['logoarr'])==1){$null=$get['logoarr'][0]=='1'?"not null":"null"; $where[] = ['brand_logo',$null,''];}


        $list=Db::name('brand')
            ->where($where)
            ->order("sort_order")
            ->paginate([
                'list_rows'=> 10,
                'var_page' => 'page',
                'query'=>$get,
            ]);
        View::assign('list',$list);
        View::assign($get);


        return view();
    }
}
