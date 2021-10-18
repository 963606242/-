<?php /*a:2:{s:64:"D:\DMXX\phpstudy_pro\WWW\tp30\app\admin\view\good\good_list.html";i:1634356942;s:61:"D:\DMXX\phpstudy_pro\WWW\tp30\app\admin\view\public\head.html";i:1633750288;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>订单列表</title>
    <link rel="stylesheet" href="/static/admin/css/pintuer.css">
    <link rel="stylesheet" href="/static/admin/css/admin.css">
    <script src="/static/admin/js/jquery.js"></script>
    <script src="/static/admin/js/pintuer.js"></script>
</head>
<div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
        <ul class="search" style="padding-left:10px;">
            <li> <a class="button border-main icon-plus-square-o" href="<?php echo url('Good/goodAdd'); ?>"> 添加内容</a> </li>
            <form action="<?php echo url('Good/goodList'); ?>" id="F" method="get">
                <li>搜索：</li>
                <li>首页
                    <input type="radio" name="is_show" value="2" <?php if(isset($is_show) && $is_show==2): ?> checked <?php endif; ?>> 推荐
                    <input type="radio" name="is_show" value="1" <?php if(isset($is_show) && $is_show==1): ?> checked <?php endif; ?>> 不推
                    <input type="radio" name="is_show" value="0" <?php if(isset($is_show) && $is_show==0): ?> checked <?php endif; ?>> 热门
                    <select name="is_hot" style="padding:5px 15px; border:1px solid #ddd;">
                <option value="">选择</option>
                <option value="1" <?php if(isset($is_hot) && $is_hot==1): ?> selected <?php endif; ?>>是</option>
                <option value="0" <?php if(isset($is_hot) && $is_hot=='0'): ?> selected <?php endif; ?> >否</option>
            </select> 上架
                    <input type="checkbox" name="is_down[]" value="1" <?php if(isset($is_down) && in_array(1,$is_down)): ?> checked <?php endif; ?>> 下架
                    <input type="checkbox" name="is_down[]" value="0" <?php if(isset($is_down) && in_array(0,$is_down)): ?> checked <?php endif; ?>>
                </li>
                <li>
                    <select name="cid" style="padding:5px 15px; border:1px solid #ddd;">
                        <option value="">请选择分类</option>
                        <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?>
                        <optgroup label="<?php echo htmlentities($user['name']); ?>">
                            <?php if(is_array($user['son']) || $user['son'] instanceof \think\Collection || $user['son'] instanceof \think\Paginator): $i = 0; $__LIST__ = $user['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo htmlentities($u['id']); ?>"  <?php if(isset($cid) && $cid==$u['id']): ?> selected <?php endif; ?>><?php echo htmlentities($u['name']); ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </optgroup>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </li>
                <li>
                    时间查询
                </li>
                <li>
                    前:<input type="date" name="timeq" value="<?php echo htmlentities((isset($timeq) && ($timeq !== '')?$timeq:'')); ?>"> 后:
                    <input type="date" name="timeh" value="{timeh|default=''}">
                </li>
                <li>价格</li>
                <li>
                    前: <input type="number" name="prq" value="<?php echo htmlentities((isset($prq) && ($prq !== '')?$prq:'')); ?>"> 后: <input type="number" name="prh" value="<?php echo htmlentities((isset($prh) && ($prh !== '')?$prh:'')); ?>">
                </li>
                <li>
                    <input type="text" placeholder="请输入搜索关键字" name="keywords" class="input" style="width:200px; line-height:17px;display:inline-block" value="<?php echo htmlentities((isset($keywords) && ($keywords !== '')?$keywords:'')); ?>" />
                    <a href="javascript:F.submit();" class="button border-main icon-search"> 搜索</a></li>
        </ul>
        </form>
    </div>
    <table class="table table-hover text-center">
        <tr>
            <th width="100" style="text-align:left; padding-left:20px;">ID</th>
            <th width="15%">商品名称</th>
            <th>图片</th>
            <th>价格</th>
            <th>分类名称</th>
            <th>上架时间</th>
            <th>推荐</th>
            <th>热门</th>
            <th>下架</th>
            <th width="310">操作</th>
        </tr>
        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?>
        <tr>
            <td style="text-align:left; padding-left:20px;"><input type="checkbox" name="id[]" value="<?php echo htmlentities($user['id']); ?>" /><?php echo htmlentities($user['id']); ?></td>
            <td><?php echo $user['name']; ?></td>
            <td width="10%"><img src="/static/admin/<?php echo htmlentities($user['photo_x']); ?>" alt="" width="70" height="50" /></td>
            <td><?php echo htmlentities($user['price_shop']); ?></td>
            <td><?php echo htmlentities($user['cname']); ?></td>
            <td><?php echo htmlentities(date('Y-m-d',!is_numeric($user['addtime'])? strtotime($user['addtime']) : $user['addtime'])); ?></td>
            <td><img src="/static/admin/<?php echo $user['is_show']==1 ? 'images/√.png'  :  'images/X.png'; ?>" alt="" width="50" height="50"></td>
            <td><img src="/static/admin/<?php echo $user['is_hot']==1 ? 'images/√.png'  :  'images/X.png'; ?>" alt="" width="50" height="50"></td>
            <td><img src="/static/admin/<?php echo $user['is_down']==1 ? 'images/√.png'  :  'images/X.png'; ?>" alt="" width="50" height="50"></td>
            <td>
                <div class="button-group"> <a class="button border-main" href="<?php echo url('Good/goodAdd'); ?>"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="javascript:void(0)" onclick="return del(1,1,1)"><span class="icon-trash-o"></span> 删除</a> </div>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <td style="text-align:left; padding:19px 0;padding-left:20px;"><input type="checkbox" id="checkall" /> 全选 </td>
        <td colspan="9" style="text-align:left;padding-left:20px;"><a href="javascript:void(0)" class="button border-red icon-trash-o" style="padding:5px 15px;" onclick="DelSelect()"> 删除</a> <a href="javascript:void(0)" style="padding:5px 15px; margin:0 10px;" class="button border-blue icon-edit" onclick="sorts()"> 排序</a>            操作：
            <select name="ishome" style="padding:5px 15px; border:1px solid #ddd;" onchange="changeishome(this)">
            <option value="">首页</option>
            <option value="1">是</option>
            <option value="0">否</option>
          </select>
            <select name="isvouch" style="padding:5px 15px; border:1px solid #ddd;" onchange="changeisvouch(this)">
            <option value="">推荐</option>
            <option value="1">是</option>
            <option value="0">否</option>
          </select>
            <select name="istop" style="padding:5px 15px; border:1px solid #ddd;" onchange="changeistop(this)">
            <option value="">下架</option>
            <option value="1">是</option>
            <option value="0">否</option>
          </select>
        </td>
        </tr>
        <tr>
            <td colspan="10">
                <div class="pagelist">
                    <!--                <a href="">上一页</a> <span class="current">1</span><a href="">2</a><a href="">3</a><a href="">下一页</a><a href="">尾页</a> -->
                    <?php echo $list; ?>
                </div>
            </td>
        </tr>
    </table>
</div>
<script type="text/javascript">
    //搜索
    function changesearch() {

    }

    //单个删除
    function del(id, mid, iscid) {
        if (confirm("您确定要删除吗?")) {

        }
    }

    //全选
    $("#checkall").click(function() {
        $("input[name='id[]']").each(function() {
            if (this.checked) {
                this.checked = false;
            } else {
                this.checked = true;
            }
        });
    })

    //批量删除
    function DelSelect() {
        var Checkbox = false;
        $("input[name='id[]']").each(function() {
            if (this.checked == true) {
                Checkbox = true;
            }
        });
        if (Checkbox) {
            var t = confirm("您确认要删除选中的内容吗？");
            if (t == false) return false;
            $("#listform").submit();
        } else {
            alert("请选择您要删除的内容!");
            return false;
        }
    }

    //批量排序
    function sorts() {
        var Checkbox = false;
        $("input[name='id[]']").each(function() {
            if (this.checked == true) {
                Checkbox = true;
            }
        });
        if (Checkbox) {

            $("#listform").submit();
        } else {
            alert("请选择要操作的内容!");
            return false;
        }
    }


    //批量首页显示
    function changeishome(o) {
        var Checkbox = false;
        $("input[name='id[]']").each(function() {
            if (this.checked == true) {
                Checkbox = true;
            }
        });
        if (Checkbox) {

            $("#listform").submit();
        } else {
            alert("请选择要操作的内容!");

            return false;
        }
    }

    //批量推荐
    function changeisvouch(o) {
        var Checkbox = false;
        $("input[name='id[]']").each(function() {
            if (this.checked == true) {
                Checkbox = true;
            }
        });
        if (Checkbox) {


            $("#listform").submit();
        } else {
            alert("请选择要操作的内容!");

            return false;
        }
    }

    //批量置顶
    function changeistop(o) {
        var Checkbox = false;
        $("input[name='id[]']").each(function() {
            if (this.checked == true) {
                Checkbox = true;
            }
        });
        if (Checkbox) {

            $("#listform").submit();
        } else {
            alert("请选择要操作的内容!");

            return false;
        }
    }


    //批量移动
    function changecate(o) {
        var Checkbox = false;
        $("input[name='id[]']").each(function() {
            if (this.checked == true) {
                Checkbox = true;
            }
        });
        if (Checkbox) {

            $("#listform").submit();
        } else {
            alert("请选择要操作的内容!");

            return false;
        }
    }

    //批量复制
    function changecopy(o) {
        var Checkbox = false;
        $("input[name='id[]']").each(function() {
            if (this.checked == true) {
                Checkbox = true;
            }
        });
        if (Checkbox) {
            var i = 0;
            $("input[name='id[]']").each(function() {
                if (this.checked == true) {
                    i++;
                }
            });
            if (i > 1) {
                alert("只能选择一条信息!");
                $(o).find("option:first").prop("selected", "selected");
            } else {

                $("#listform").submit();
            }
        } else {
            alert("请选择要复制的内容!");
            $(o).find("option:first").prop("selected", "selected");
            return false;
        }
    }
</script>
</body>

</html>