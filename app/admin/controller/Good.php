<?php
namespace app\admin\controller;

use think\facade\Cache;
use think\facade\Db;
use think\facade\Request;
use think\facade\View;

//use think\facade\View;

class Good
{
    public function cateedit()
    {

        return View::fetch();
    }
    public function cate()
    {
        $where="parentid=0";
        $id=input('get.id');
        if (isset($id) && !empty($id))$where="parentid={$id}";
        $cate=Db::name('category')
            ->where($where)
            ->order("sort")
            ->select()
            ->toArray();
        foreach ($cate as $k=>$v){
            $son=Db::name("category")
                ->field("id")
                ->where("parentid={$v['id']}")
                ->order("id")
                ->select()
                ->toArray();
            if ($son){
                $cate[$k]['son']=1;
            }else{
                $cate[$k]['son']=2;
            }

        }

        View::assign('cate',$cate);
        return view();
    }
    public function goodAdd()
    {
        return view();
    }
    public function goodList()
    {
        $keywords=input('get.keywords');
        $show=input('get.is_show');
        $hot=input('get.is_hot');
        $down=input('get.is_down');
        $cid=input('get.cid');
        $get=Request::get();
        $where=[];
        //$arr=[];
        if (isset($keywords) && !empty($keywords))$where[] = ['g.name','like',"%{$keywords}%"]; //$arr['keywords']=$keywords;}
        if (isset($show) && $show!=2 && $show!="")$where[] = ['g.is_show','=',"{$show}"];//$arr['is_show']=$show;
        if (isset($hot) && $hot!="")$where[] = ['g.is_hot','=',"{$hot}"];//$arr['is_hot']=$hot;}
        if (isset($down) && $down!="" && !isset($down[1]))$where[] = ['g.is_down','=',"{$down[0]}"];//$arr['is_down']=$down[0];
        if (isset($cid) && !empty($cid))$where[] = ['g.cid','=',"{$cid}"];//$arr['cid']=$cid;
        if (isset($get['timeq']) && $get['timeq']!="")$where[] = ['g.addtime','< TIME',$get['timeq']];
        if (isset($get['timeh']) && $get['timeh']!="")$where[] = ['g.addtime','> TIME',$get['timeh']];
        if (isset($get['prq']) && $get['prq']!="")$where[] = ['g.price_shop','>',$get['prq']];
        if (isset($get['prh']) && $get['prh']!="")$where[] = ['g.price_shop','<',$get['prh']];
        if (isset($get['cid']) && $get['cid']!="")$where[] = ['g.cid','=',$get['cid']];
        $list=Db::name('goods')
            ->field('g.*,c.name cname')
            ->where($where)
            ->alias('g')
            ->join('category c', 'g.cid=c.id')
            //->select()
            //->toArray();
            ->paginate([
                'list_rows'=> 5,
                'var_page' => 'page',
                'query'=>$get,
            ])->each(function ($item,$k) use ($keywords){
                $str='<span style="color:red;">'.$keywords.'</span>';
                $item["name"]=str_replace($keywords,$str,$item['name']);
                return $item;
            });
        //if ($keywords!=""){
        //    foreach ($list as $k=>$v){
        //        $str='<span style="color:red;">'.$keywords.'</span>';
        //        $list[$k]["name"]=str_replace($keywords,$str,$v['name']);
        //    }
        //}

        //方案一
        //$cate=Db::name('category')
        //    ->field("id,name")
        //    ->where("parentid=0")
        //    ->order("id")
        //    ->select()
        //    ->toArray();
        //foreach ($cate as $k=>$v){
        //    $son=Db::name("category")
        //        ->field("id,name")
        //        ->where("parentid={$v['id']}")
        //        ->order("id")
        //        ->select();
        //    $cate[$k]['son']=$son;
        //}

        //方案二
        //使用缓存
        if(Cache::has('cate')){ //判断缓存是否存在
           $cateAll=Cache::get('cate'); // 获取缓存数据
        }else{
            $cateAll=Db::name('category')->select()->toArray();
            Cache::set('cate',$cateAll,100); // 设置缓存变量
        }
        //$cate=[];
        ////循环所有分类
        //foreach ($cateAll as $k=>$v){
        //    //判断 分类中parentid字段等于0 进入判断结果 都是一级分类
        //   if($v['parentid']==0){
        //        //将一级分类赋值到空数组中 索引为自己的ID
        //       $cate[$v['id']]=$v;
        //        //循环所有分类
        //       foreach ($cateAll as $kk=>$vv){
        //            //如果分类的parentid等于上一级分类(一级分类)ID进入判断里的是二级分类
        //           if ($vv['parentid']==$v['id']) {
        //                //将二级分类赋值到数组 根据索引 ($v.id) 将一级和二级绑定到一起
        //               $cate[$v['id']]['son'][]=$vv;
        //           }
        //       }
        //   }
        //}
        
        //2.2
        $cate=$this->getCate($cateAll,0);

        View::assign($get);
        View::assign('list',$list);
        View::assign('cate',$cate);
        //input('post.name')
        return view();
    }
    public function getCate($cateAll,$parentid)
    {
        $cate = [];
        foreach ($cateAll as $v){
            if ($v['parentid'] == $parentid) {
                $cate[$v['id']] = $v;
                $cate[$v['id']]['son'] = $this->getCate($cateAll,$v['id']);
            }
        }
        return $cate;
    }
}