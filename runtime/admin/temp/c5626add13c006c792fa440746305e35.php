<?php /*a:2:{s:60:"D:\DMXX\phpstudy_pro\WWW\tp30\app\admin\view\index\info.html";i:1634027437;s:61:"D:\DMXX\phpstudy_pro\WWW\tp30\app\admin\view\public\head.html";i:1633750288;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>网站信息</title>
    <link rel="stylesheet" href="/static/admin/css/pintuer.css">
    <link rel="stylesheet" href="/static/admin/css/admin.css">
    <script src="/static/admin/js/jquery.js"></script>
    <script src="/static/admin/js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 商城信息</strong></div>
  <div class="body-content">
    <form method="get" class="form-x" action="" enctype="multipart/form-data">
    	<div class="form-group">
        <div class="label">
          <label>网站名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="name" value="<?php echo htmlentities($list['name']); ?>" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>网站标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="title" value="<?php echo htmlentities($list['title']); ?>" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>网站LOGO：</label>
        </div>
        <div class="field">
          <input type="text" data-image="/static/admin/images/logo.png" readonly id="url1" class="input tips" style="width:25%; float:left;" value="" data-toggle="hover" data-place="right" />
          <input type="button"  class="button bg-blue margin-left" id="image1" value="+ 浏览上传" >
          <input type="file" name="logo" onchange="url1.value=this.value" style="position:relative; z-index:1000px; filter:alpha(opacity=0);-moz-opacity:0; opacity:0; left:-155px;" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>网站关键字：</label>
        </div>
        <div class="field">
          <textarea class="input" name="skeyword" style="height:80px"><?php echo htmlentities($list['keyword']); ?></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>网站描述：</label>
        </div>
        <div class="field">
          <textarea class="input" name="description"><?php echo htmlentities($list['describe']); ?></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>400电话：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="tel" value="<?php echo htmlentities($list['tel']); ?>" />
          <div class="tips"></div>
        </div>
      </div>
     
      <div class="form-group">
        <div class="label">
          <label>Email：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_email" value="<?php echo htmlentities($list['email']); ?>" />
          <div class="tips"></div>
        </div>
      </div> 
              
      <div class="form-group">
        <div class="label">
          <label>版权信息：</label>
        </div>
        <div class="field">
          <textarea name="scopyright" class="input" style="height:120px;"><?php echo htmlentities($list['copyright']); ?></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>