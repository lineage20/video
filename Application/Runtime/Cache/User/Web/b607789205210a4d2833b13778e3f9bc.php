<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC"-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta content="<?php echo ($keywords); ?>" name="keywords">
    <meta content="<?php echo ($description); ?>" name="description">
    <title><?php echo ($webtitle); ?>--用户中心</title>
    <link rel="stylesheet" type="text/css" href="/Public/User/web/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/Public/User/web/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/Public/User/web/css/animate.css" />
</head>
<body>
<div class="vbox">
    <!-- <div class="h1 font-bold m-t-xl">
	用户中心
    </div> -->
    <div class="navbar-login">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <a href="/"><img src="/logo.png"></a>
                    <big>欢迎登录</big>
                </div>
                <div class="col-md-4" style="margin-top: 30px;">
                    <a href="<?php echo U('reg');?>" class="pull-right">还没有帐号？立即注册</a>
                </div>
            </div>
        </div>
    </div>
    <div class="m-t-lg wrapper-md backimg">
        <img src="/Public/User/web/images/loginbg.jpg" data-adaptive-background="1">
        <div class="container">
            <div class="container aside-xxl login-block animated fadeInUp ">
                <div class="panel">
                    <div class="panel-heading font-bold">
                        用户登陆
                    </div>
                    <div class="panel-body">
                        <form class="bs-example form-horizontal" method="post" action="<?php echo U();?>">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="glyphicon glyphicon-user"></i></div>
                                        <input name="username" type="text" class="form-control" placeholder="用户名">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
                                        <input name="password" type="password" class="form-control" placeholder="密码">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked="">
                                            <i>
                                            </i>
                                            记住登录状态
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="pull-right checkbox">
                                        <a href="<?php echo U('forgetpwd');?>" class="text-info">
                                            忘记密码?
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-danger btn-lg btn-block">
                                        登 陆
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12 text-center">
                                    <a href="<?php echo U('reg');?>" class="text-info">
                                        还没有帐号？立即注册用户。
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center padder" style="margin-top: 30px;">
	<p>
		<small>Copyright &copy; <?php echo ($webtitle); ?> 版权所有</small>
	</p>
	</div>
</div>
<script type="text/javascript" src="/Public/User/web/js/jquery.js"></script>
<script type="text/javascript" src="/Public/User/web/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo ($tplpath); ?>/js/jquery.adaptive-backgrounds.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $.adaptiveBackground.run();
    });
</script>
</body>
</html>