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
    	<div class="panel-head"><strong>文章管理</strong></div>
        <div class="padding border-bottom">
        	<div class="button-group button-group-small">
            <button type="button" class="button checkall" checkfor="id[]" name="checkall"><span class="icon-check-square-o"></span> 全选</button>
             <a class="button" href="<?php echo U('add');?>"><span class="icon-plus text-green"></span> 新 增</a>
             <button class="button ajax-post confirm" url="<?php echo U('del');?>" target-form="form-x"><span class="icon-trash-o text-red"></span> 删 除</button>
            </div>
            <div class="button-group button-group-small">
            <button type="button" class="button dropdown-toggle">按分类查询<span class="downward"></span></button>
            <ul class="drop-menu">
            	<li><a href="<?php echo U('index');?>">所有分类</a></li>
                <?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('index?category='.$vo['id']);?>"><?php echo ($vo["html"]); echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            </div>
            <div class="float-right">
            	<input type="text" name="keyword" class="input input-auto input-small" size="50" placeholder="搜索关键词" /> <a class="button button-small" href="javascript:;" id="search" url="<?php echo U('index?category='.$_GET['category']);?>"><span class="icon-search"></span> 搜索</a>
            </div>
        </div>
        <table class="table table-hover">
        	<tr>
                <th width="45">选择</th>
                <th width="45">id</th>
                <th>文章名称</th>
                <th width="120">文章分类</th>
                <th width="80">人气 <a href="javascript:;" url="<?php echo U('index?category='.$_GET['category'].'&keyword='.$_GET['keyword'].'&order=hits');?>" class="icon-arrow-up text-red order"></a></th>
                <th width="120">更新时间</th>
                <th width="60">可见</th>
                <th width="120">操作</th>
            </tr>
           	<?php if(!empty($newslist)): if(is_array($newslist)): $i = 0; $__LIST__ = $newslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><input type="checkbox" name="id[]" value="<?php echo ($vo["id"]); ?>" /></td>
                <td><?php echo ($vo['id']); ?></td>
                <td><?php echo ($vo['title']); if(!empty($vo["serialize"])): ?><span class="text-yellow padding-left"><?php echo ($vo['serialize']); ?></span><?php endif; ?></td>
                <td><?php echo get_category($vo['category']);?></td>
                <td><?php echo ($vo['hits']); ?></td>
                <td><?php echo (time_format($vo["update_time"],"Y-m-d")); ?></td>
                <td><?php echo ($vo['display']?'是':'否'); ?></td>
                <td>
                    <a href="<?php echo U('edit?id='.$vo['id']);?>">修改</a>
                    <a href="<?php echo U('del?id='.$vo['id']);?>" class="confirm ajax-get">删除</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            <?php else: ?>
            <td colspan="5"> aOh! 暂时还没有内容! </td><?php endif; ?>
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

	$(".order").click(function(){
		var url = $(this).attr('url');
		 if( url.indexOf('?')>0 ){
            url += '&';
        }else{
            url += '?';
        }
		if($(this).hasClass("icon-arrow-up")){
			url += 'type=asc';
			$(this).removeClass("icon-arrow-up text-red").addClass("icon-arrow-down text-green");
		}else{
			url += 'type=desc';
			$(this).removeClass("icon-arrow-down text-green").addClass("icon-arrow-up text-red");
		}
		window.location.href = url;
	});
})
</script>

</body>
</html>