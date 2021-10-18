<?php
/*
 * @Author: your name
 * @Date: 2021-10-09 14:09:58
 * @LastEditTime: 2021-10-15 15:53:30
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \tp30\app\admin\controller\Order.php
 */
namespace app\admin\controller;
use think\facade\Db;
use think\facade\Request;
use think\facade\View;

class Order
{
    public function orderDetail()
    {
        return view();
    }
    public function orderList()
    {
        $get=Request::get();

        $where=[];
        if (isset($get['keywords']) && !empty($get['keywords']))$where[] = ['o.order_sn','like',"%{$get['keywords']}%"];
        //if (isset($get['timeq']) && $get['timeq']!="" && $get['timeh']=="")$where[] = ['o.addtime','BETWEEN TIME',[$get['timeq'],time()]];
        //if (isset($get['timeh']) && $get['timeh']!="" && $get['timeq']=="")$where[] = ['o.addtime','BETWEEN TIME',[$get['timeh'],time()]];
        //if (isset($get['timeq']) && isset($get['timeh']) && $get['timeh']!="" && $get['timeq']!="")$where[] = ['o.addtime','BETWEEN TIME',[$get['timeq'],$get['timeh']]];
        if (isset($get['timeq']) && $get['timeq']!="")$where[] = ['o.addtime','< TIME',$get['timeq']];
        if (isset($get['timeh']) && $get['timeh']!="")$where[] = ['o.addtime','> TIME',$get['timeh']];
        if (isset($get['statuss']) && !empty($get['statuss']))$where[] = ['o.status','in',$get['statuss']];
        //if (isset($get['prq']) && $get['prq']!="" && $get['prh']=="")$where[] = ['o.amount','BETWEEN',[$get['prq'],0]];
        //if (isset($get['prh']) && $get['prh']!="" && $get['prq']=="")$where[] = ['o.amount','BETWEEN',[$get['prh'],0]];
        //if (isset($get['prq']) && isset($get['prh']) && $get['prh']!="" && $get['prq']!="")$where[] = ['o.amount','BETWEEN',[$get['prq'],$get['prh']]];
        if (isset($get['prq']) && $get['prq']!="")$where[] = ['o.amount','>',$get['prq']];
        if (isset($get['prh']) && $get['prh']!="")$where[] = ['o.amount','<',$get['prh']];
        $list=Db::name('order')
            ->field('o.id,o.order_sn,o.uid,o.amount,o.addtime,o.status,o.remark,u.uname,s.order_status')
            ->alias('o')
            ->where($where)
            ->join('user u', 'o.uid=u.id')
            ->join('order_status s','o.status=s.status_id')
            ->paginate([
                'list_rows'=> 5,
                'var_page' => 'page',
                'query'=>$get,
            ]);
        $status=Db::name('order_status')
            ->select()
            ->toArray();

        View::assign($get);
        View::assign('list',$list);
        View::assign('status',$status);

        return view();
    }
}
