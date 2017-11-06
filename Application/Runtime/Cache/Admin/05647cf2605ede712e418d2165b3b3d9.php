<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>欢迎您登录影视系统</title>
    <link rel="stylesheet" href="/Public/Admin/css/pintuer.css">
    <link rel="stylesheet" href="/Public/Admin/css/admin.css">
    <script src="/Public/Admin/js/jquery.js"></script>
    <script src="/Public/Admin/js/pintuer.js"></script>
    <script src="/Public/Admin/js/respond.js"></script>
    <script src="/Public/Admin/js/admin.js"></script>
    
</head>
<body>
<div class="lefter">
    <div class="logo"><a href="#" target="_blank"><img src="/Public/Admin/images/logo.png" alt="后台管理系统" /></a></div>
</div>
<div class="righter nav-navicon" id="admin-nav">
    <div class="mainer">
        <div class="admin-navbar">
            <span class="float-right">
            	<a class="button button-little bg-main icon-home" href="/index.php" target="_blank">前台首页</a>
                <a class="button button-little bg-red icon-trash-o" href="<?php echo U('Index/cache');?>">清除缓存</a>
                <a class="button button-little bg-yellow icon-user" href="<?php echo U('Public/logout');?>">注销登录</a>
            </span>
            <ul class="nav nav-inline admin-nav">
            	<?php if(!empty($_extra_menu)): echo extra_menu($_extra_menu,$__MENU__); endif; ?>
                <?php if(is_array($__MENU__["main"])): $i = 0; $__LIST__ = $__MENU__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>"><a href="<?php echo (u($menu["url"])); ?>" class="<?php echo ((isset($menu["icon"]) && ($menu["icon"] !== ""))?($menu["icon"]):''); ?>"> <?php echo ($menu["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
                <ul class="nav nav-inline sub-nav">
                    <?php if(is_array($__MENU__["child"])): $i = 0; $__LIST__ = $__MENU__["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i; if(!empty($sub_menu)): if(!empty($key)): ?><h4><span class="icon-minus-square-o"></span><?php echo ($key); ?></h4><?php endif; ?>
                        <?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li><a href="<?php echo (u($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>
                </ul>
		</div>
        <div class="admin-bread">
            <span>您好<?php echo session('user_auth.username');?>，欢迎您的光临。</span>
            <ul class="bread">
                <li><a href="index.html" class="icon-home"> 开始</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="admin">
    <div id="top-alert" class="alert fixed hidden alert-red"></div>
	
    <div class="panel admin-panel">
    	<div class="panel-head"><strong>绑定播放器列表</strong></div>
        <div class="padding border-bottom">
        	<div class="line-middle">
            <form id="form" class="form-addbind">
              <div class="x5"><input name="pname" type="text" class="input input-auto"  size="30" value=""/></div>
              <div class="x5">
                <select class="input input-auto" name="bpname">
                    <?php if(is_array($playerlist)): $i = 0; $__LIST__ = $playerlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$player): $mod = ($i % 2 );++$i;?><option value="<?php echo ($player["id"]); ?>"><?php echo ($player["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
              </div>
              <div class="x2"><a class="button ajax-post"  href="#" url="<?php echo U('binbplay');?>" target-form="form-addbind">添加</a></div>
              </form>
            </div>
        </div>
        <table class="table table-hover">
        	<tr>
                <th width="430">播放器名称</th>
                <th>对应播放器</th>
                <th width="180">操作</th>
            </tr>
           	<?php if(!empty($playlist)): if(is_array($playlist)): $i = 0; $__LIST__ = $playlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(!empty($vo["play"])): ?><tr>
            	<form id="form" class="form-<?php echo ($vo['play']); ?>">
                <td><input name="pname" type="text" class="input input-auto"  size="30" value="<?php echo ($vo['play']); ?>"/></td>
                <td>
                    <select class="input input-auto" name="bpname">
                        <?php if(is_array($playerlist)): $i = 0; $__LIST__ = $playerlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$player): $mod = ($i % 2 );++$i;?><option value="<?php echo ($player["id"]); ?>" <?php if(($vo["bind"]) == $player["id"]): ?>selected<?php endif; ?>><?php echo ($player["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </td>
                <td>
                	<a class="button ajax-post" href="#" url="<?php echo U('binbplay');?>" target-form="form-<?php echo ($vo['play']); ?>">修改</a>
                    <a class="button ajax-post" href="#" url="<?php echo U('delplay');?>" target-form="form-<?php echo ($vo['play']); ?>">删除</a>
                </td>
                </form>
            </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            <?php else: ?>
            <td colspan="3"> aOh! 暂时还没有内容! </td><?php endif; ?>
        </table>
    </div>

</div>
 <script type="text/javascript">
+function(){
	/* 左边菜单高亮 */
	var $window = $(window), $subnav = $(".sub-nav"), url;
	url = window.location.pathname + window.location.search;
	url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
	var bread=$subnav.find("a[href='" + url + "']").parent().prop('outerHTML');
	$('.bread').append(bread);
	$subnav.find("a[href='" + url + "']").parent().addClass("active");
	/* 左边菜单显示收起 */
	$(".sub-nav").on("click", "h4", function(){
		var $this = $(this);
		$this.find("span").toggleClass("icon-minus-square-o");
		$this.nextUntil("h4").slideToggle("fast").prev("h4").find("span").toggleClass("icon-plus-square-o");
	});
}();
</script>			

</body>
</html>