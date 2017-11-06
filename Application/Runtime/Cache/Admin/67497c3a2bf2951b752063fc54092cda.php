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
    <form method="post" class="form-x">
    	<div class="panel-head"><strong>用户管理</strong></div>
        <div class="padding border-bottom">
        	<div class="button-group button-group-small">
            <button type="button" class="button checkall" checkfor="id[]" name="checkall"><span class="icon-check-square-o"></span> 全选</button>
             <a class="button" href="<?php echo U('add');?>"><span class="icon-plus text-green"></span> 新 增</a>
             <button class="button ajax-post confirm" url="<?php echo U('del');?>" target-form="form-x"><span class="icon-trash-o text-red"></span> 删 除</button>
            </div>
            <div class="button-group button-group-small">
                <button type="button" class="button dropdown-toggle">按类型查询<span class="downward"></span></button>
                <ul class="drop-menu">
                    <li><a href="<?php echo U('index');?>">所有用户</a></li>
                    <li><a href="<?php echo U('index?type=1');?>">普通用户</a></li>
                    <li><a href="<?php echo U('index?type=2');?>">VIP用户</a></li>
                </ul>
            </div>
            <div class="button-group button-group-small padding-small">
                用户：<span class="badge bg-green"><?php echo ($count['pt']+$count['vip']); ?></span>
                普通用户：<span class="badge bg-blue"><?php echo ($count['pt']); ?></span>
                VIP用户：<span class="badge bg-yellow"><?php echo ($count['vip']); ?></span>
            </div>
            <div class="float-right">
            	<input type="text" name="keyword" class="input input-auto input-small search-form" size="50" placeholder="搜索关键词" /> <a class="button button-small" href="javascript:;" id="search" url="<?php echo U('index');?>"><span class="icon-search"></span> 搜索</a>
            </div>
        </div>
        <table class="table table-hover">
        	<tr>
                <th width="45">选择</th>
                <th>ID</th>
                <th>用户名</th>
                <th>登录次数</th>
                <th>最后登录时间</th>
                <th>最后登录IP</th>
                <th>操作</th>
            </tr>
           	<?php if(!empty($_list)): if(is_array($_list)): $i = 0; $__LIST__ = $_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><input class="ids" type="checkbox" name="id[]" value="<?php echo ($vo["id"]); ?>" /></td>
                <td><?php echo ($vo["id"]); ?></td>
                <td><a href="<?php echo U('info?id='.$vo['id']);?>" class="userinfo"><?php echo ($vo["username"]); ?></a>
                <?php if(($vo['vip_time']) >= NOW_TIME): ?><span class="tag bg-yellow">VIP</span>
                    <span class="text-small">到期：<?php echo (time_format($vo["vip_time"],"Y-m-d")); ?></span><?php endif; ?>
                </td>
                <td><?php echo ($vo["login"]); ?></td>
                <td><?php echo (time_format($vo["last_login_time"])); ?></td>
                <td><?php echo long2ip($vo['last_login_ip']);?></td>
                <td>
                <a href="<?php echo U('message/add?id='.$vo['id']);?>" class="message">发消息</a>
                <a href="<?php echo U('timeadd?id='.$vo['id']);?>" class="addvip">到期时间</a>
                <a href="<?php echo U('edit?id='.$vo['id']);?>">修改密码</a>
                <?php if(($vo["status"]) == "1"): ?><a href="<?php echo U('disable?id='.$vo['id']);?>" class="ajax-get confirm">禁用</a>
                <?php else: ?>
                    <a href="<?php echo U('enable?id='.$vo['id']);?>" class="ajax-get confirm">启用</a><?php endif; ?>
                <a href="<?php echo U('del?id='.$vo['id']);?>" class="confirm ajax-get">删除</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            <?php else: ?>
            <td colspan="7"> aOh! 暂时还没有内容! </td><?php endif; ?>
        </table>
         <div class="panel-foot text-center">
         	<div class="page"><?php echo ($_page); ?></div>
        </div>
        </form>
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

<script type="text/javascript" src="/Public/static/layer/layer.js"></script>
<script type="text/javascript">
$(function(){
	//搜索功能
	$("#search").click(function(){
		var url = $(this).attr('url');
		var query = $(this).prev('input').serialize();
        query = query.replace(/(&|^)(\w*?\d*?\-*?_*?)*?=?((?=&)|(?=$))/g,'');
        query = query.replace(/^&/g,'');
        if( url.indexOf('?')>0 ){
            url += '&' + query;
        }else{
            url += '?' + query;
        }
		window.location.href = url;
	});

    $(".userinfo").click(function(){
        layer.open({
            type: 2,
            area: ['800px', '350px'],
            fix: false, //不固定
            maxmin: true,
            content: $(this).attr('href')
        });
        return false;
    });

    $(".addvip").click(function(){
        layer.open({
            type: 2,
            area: ['400px', '350px'],
            fix: false, //不固定
            maxmin: true,
            content: $(this).attr('href')
        });
        return false;
    });

	$(".message").click(function(){
		layer.open({
			type: 2,
			area: ['580px', '570px'],
			fix: false, //不固定
			maxmin: true,
			content: $(this).attr('href')
		});
		return false;
	});
})
</script>

</body>
</html>