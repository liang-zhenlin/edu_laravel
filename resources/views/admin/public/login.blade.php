<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/admin//admin/lib/html5shiv.js"></script>
<script type="text/javascript" src="/admin//admin/lib/respond.min.js"></script>
<![endif]-->
<link href="/admin//admin//admin//admin/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/admin//admin//admin//admin/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
<link href="/admin//admin//admin//admin/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/admin//admin//admin/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="/admin//admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>后台登录 - H-ui.admin v3.0</title>
<meta name="keywords" content="H-ui.admin v3.0,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.0，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class="header"></div>
<div class="loginWraper">
  <div id="loginform" class="loginBox">
    <form class="form form-horizontal" action="/admin/public/check" method="post">
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input id="" name="username" type="text" placeholder="账户" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
          <input id="" name="password" type="password" placeholder="密码" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe63f;</i></label>
        <div class="formControls col-xs-8">
          <input name="captcha" class="input-text size-L" type="text" placeholder="验证码" onblur="if(this.value==''){this.value='验证码:'}" 
          onclick="if(this.value=='验证码:'){this.value='';}" style="width:150px;">
          <img src="{{ captcha_src() }}"> <a id="kanbuq" href="javascript:;">看不清，换一张</a> </div>
      </div>
      {{csrf_field()}}
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <label for="online">
            <input type="checkbox" name="online" id="online" value="1">
            使我保持登录状态</label>
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input name="" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
          <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
        </div>
      </div>
    </form>
  </div>
</div>
<div class="footer">Copyright 你的公司名称 by H-ui.admin v3.0</div>
<script type="text/javascript" src="/admin//admin//admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/admin//admin//admin//admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/admin//admin//admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript">
  $(function() {
    var src = $('img').attr('src');
    $('#kanbuq').click(function(){
      $('img').attr('src', src + '&_=' + Math.random())
    });

    <?php if(count($errors) > 0): ?>
      var allError = '';
      <?php foreach($errors->all() as $error): ?>
        allError += "<?= e($error) ?><br/>";
      <?php endforeach; ?>
      layer.alert(allError, {title: '错误提示', icon: 5});
    <?php endif; ?>

  });
</script>
</body>
</html>