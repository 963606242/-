<?php /*a:2:{s:61:"D:\DMXX\phpstudy_pro\WWW\tp30\app\admin\view\index\index.html";i:1634190172;s:61:"D:\DMXX\phpstudy_pro\WWW\tp30\app\admin\view\public\head.html";i:1633750288;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理中心</title>
    <link rel="stylesheet" href="/static/admin/css/pintuer.css">
    <link rel="stylesheet" href="/static/admin/css/admin.css">
    <script src="/static/admin/js/jquery.js"></script>
    <script src="/static/admin/js/pintuer.js"></script>
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1><img src="/static/admin/images/y.jpg" class="radius-circle rotate-hover" height="50" alt="" />皓风后台管理中心</h1>
  </div>
  <div class="head-l">
  	<a class="button button-little bg-green" href="" target="_blank"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;
  	<a class="button button-little bg-red" href="<?php echo url('Login/login'); ?>"><span class="icon-power-off"></span> 退出登录</a>
  </div>
</div>
<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  <h2><span class="icon-columns"></span>基本设置</h2>
  <ul style="display:block">
    <li><a href="<?php echo url('Index/info'); ?>" target="right"><span class="icon-caret-right"></span>网站设置</a></li>
    <li><a href="<?php echo url('Index/pass'); ?>" target="right"><span class="icon-caret-right"></span>修改密码</a></li>
    <li><a href="<?php echo url('Banner/adv'); ?>" target="right"><span class="icon-caret-right"></span>首页轮播</a></li>
  </ul>   
  <h2><span class="icon-picture-o"></span>商品管理</h2>
  <ul>
    <li><a href="<?php echo url('Good/goodList'); ?>" target="right"><span class="icon-caret-right"></span>商品列表</a></li>
    <li><a href="<?php echo url('Good/goodAdd'); ?>" target="right"><span class="icon-caret-right"></span>添加商品</a></li>
    <li><a href="<?php echo url('Good/cate'); ?>" target="right"><span class="icon-caret-right"></span>分类管理</a></li>
  </ul>
  <h2><span class="icon-picture-o"></span>品牌管理</h2>
  <ul>
    <li><a href="<?php echo url('Brand/brandList'); ?>" target="right"><span class="icon-caret-right"></span>品牌列表</a></li>
  </ul>
  <h2><span class="icon-pencil-square-o"></span>订单管理</h2>
  <ul>
    <li><a href="<?php echo url('Order/orderList'); ?>" target="right"><span class="icon-caret-right"></span>订单列表</a></li>
  </ul>  
  <h2><span class="icon-user"></span>会员管理</h2>
  <ul>
    <li><a href="<?php echo url('Vip/vipList'); ?>" target="right"><span class="icon-caret-right"></span>会员列表</a></li>
    <li><a href="<?php echo url('Vip/vipAdd'); ?>" target="right"><span class="icon-caret-right"></span>添加会员</a></li>
  </ul> 
  <h2><span class="icon-group"></span>管理员管理</h2>
  <ul>
    <li><a href="<?php echo url('User/user'); ?>" target="right"><span class="icon-caret-right"></span>管理员列表</a></li>
    <li><a href="<?php echo url('User/userAdd'); ?>" target="right"><span class="icon-caret-right"></span>添加管理员</a></li>
    <li><a href="<?php echo url('Auth/auth'); ?>" target="right"><span class="icon-caret-right"></span>权限组列表</a></li>
    <li><a href="<?php echo url('Auth/authAdd'); ?>" target="right"><span class="icon-caret-right"></span>添加权限组</a></li>
  </ul> 
</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(200);	
	  $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
});
</script>
<ul class="bread">
  <li><a href="<?php echo url('Index/info'); ?>" target="right" class="icon-home"> 首页</a></li>
  <li><a href="##" id="a_leader_txt">网站信息</a></li>
  <li><b>当前语言：</b><span style="color:red;">中文</php></span>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;切换语言：<a href="##">中文</a> &nbsp;&nbsp;<a href="##">英文</a> </li>
</ul>
<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="<?php echo url('Index/info'); ?>" name="right" width="100%" height="100%"></iframe>
</div>
<div style="text-align:center;">
<p>来源:<a href="http://www.mycodes.net/" target="_blank">源码之家</a></p>
</div>
</body>
</html>