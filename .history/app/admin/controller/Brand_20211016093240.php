<?php
/*
 * @Author: your name
 * @Date: 2021-10-14 13:35:59
 * @LastEditTime: 2021-10-16 09:32:39
 * @LastEditors: your name
 * @Description: In User Settings Edit
 * @FilePath: \tp30\app\admin\controller\Brand.php
 */
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
        $whereOr=[];
        if (isset($keywords) && !empty($keywords))$where[] = ['brand_name','like',"%{$keywords}%"];
        if (isset($get['recommended']) && $get['recommended']!="")$where[] = ['recommended','=',$get['recommended']];
        if (isset($get['if_show']) && count($get['if_show'])==1)$where[] = ['if_show','in',$get['if_show']];
        if (isset($get['logoarr']) && count($get['logoarr'])==1){
            //$null=$get['logoarr'][0]=='1'?"not null":"null"; $where[] = ['brand_logo',$null,''];
            if ($get['logoarr'][0] == 1) {
                $where[] = ['brand_logo','<>',""];
            }else{
                $whereOr[] = ['brand_logo','=',null];
                $whereOr[] = ['brand_logo','=',''];
            }
        }


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
