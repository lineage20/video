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
    
	<link rel="stylesheet" href="/Public/Admin/css/dialogmovie.css">

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
    <form id="form" class="form-collect">
    	<div class="panel-head"><strong>影片列表</strong></div>
        <div class="padding border-bottom">
            <div class="tab">
                <div class="tab-head">
                    <ul class="tab-nav">
                        <li class="active"><a href="#tab-type">类型绑定</a></li>
                        <?php if(!empty($playlist)): ?><li><a href="#tab-player">播放器绑定</a></li><?php endif; ?>
                    </ul>
                 </div>
                 <div class="tab-body">
                    <div class="tab-panel active" id="tab-type">
                        <ul class="list-inline">
                            <?php if(is_array($typelist)): $i = 0; $__LIST__ = $typelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tlist): $mod = ($i % 2 );++$i;?><li class="margin">
                            <a href="<?php echo U('lists?url='.$_GET['url'].'&type='.$_GET['type'].'&t='.$tlist['id'].'&fid='.$_GET['fid']);?>"><?php echo ($tlist["title"]); ?></a>
                            <a href="javascript:;" class="tips" id="bing_<?php echo ($tlist['id']); ?>" data-place="auto" data-toggle="click" data-mask="1" data-url="<?php echo U('bind?cid='.$tlist['id'].'&fid='.$_GET['fid']);?>"><?php if(bind_id($_GET['fid'].'_'.$tlist['id']) > 0): ?><span class="text-green icon-check"></span>已绑定<?php else: ?><span class="text-red icon-times"></span>未绑定<?php endif; ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                    <div class="tab-panel" id="tab-player">
                        <ul class="list-inline">
                            <?php if(is_array($playlist)): $i = 0; $__LIST__ = $playlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$plist): $mod = ($i % 2 );++$i;?><li class="margin"><?php echo ($plist["title"]); ?>
                            <a href="javascript:;" class="tips" id="pbing_<?php echo ($plist['id']); ?>" data-place="auto" data-toggle="click" data-mask="1" data-url="<?php echo U('pbind?ptitle='.$plist['title'].'&pid='.$plist['id']);?>"><?php if(bind_play($plist['title']) > 0): ?><span class="text-green icon-check"></span>已绑定<?php else: ?><span class="text-red icon-times"></span>未绑定<?php endif; ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        	<div class="button-group button-group-small">
            <button type="button" class="button checkall" checkfor="id[]" name="checkall"><span class="icon-check-square-o"></span> 全选</button>
            <a class="button"  href="javascript:ajaxjson('<?php echo U('collect?fid='.$_GET['fid'].'&url='.$_GET['url'].'&type='.$_GET['type']);?>',1)"><span class="icon-magnet text-blue"></span> 采集</a>
            <a class="button"  href="javascript:ajaxjson('<?php echo U('collect?h=24&fid='.$_GET['fid'].'&url='.$_GET['url'].'&type='.$_GET['type']);?>',1)"><span class="icon-magnet text-blue"></span> 采集当日</a>
            <?php if(!empty($_GET['t'])): ?><a class="button"  href="javascript:ajaxjson('<?php echo U('collect?t='.$_GET['t'].'&fid='.$_GET['fid'].'&url='.$_GET['url'].'&type='.$_GET['type']);?>',1)"><span class="icon-magnet text-blue"></span> 采集本类</a><?php endif; ?>
             <a class="button"  href="javascript:ajaxjson('<?php echo U('collect?fid='.$_GET['fid'].'&url='.$_GET['url'].'&type='.$_GET['type']);?>',1)"><span class="icon-magnet text-blue"></span> 采集全部</a>
            </div>
            <div class="float-right">
            	<input type="text" name="wd" class="input input-auto input-small" size="50" placeholder="搜索关键词" /> <a class="button button-small" href="javascript:;" id="search" url="<?php echo U('lists?url='.$_GET['url'].'&pg='.$_GET['pg'].'&t='.$_GET['t'].'&type='.$_GET['type'].'&fid='.$_GET['fid']);?>"><span class="icon-search"></span> 搜索</a>
            </div>
        </div>
        <table class="table table-hover">
        	<tr>
                <th width="45">选择</th>
                <th width="60">id</th>
                <th>影片名称</th>
                <th width="120">影片分类</th>
                <th width="120">更新时间</th>
                <th width="80">操作</th>
            </tr>
           	<?php if(!empty($movielist)): if(is_array($movielist)): $i = 0; $__LIST__ = $movielist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><input type="checkbox" name="id[]" value="<?php echo ($vo["mid"]); ?>" /></td>
                <td><?php echo ($vo['mid']); ?></td>
                <td><a href="javascript:ajaxmoviejson('<?php echo U('moviejson','type='.$_GET['type'].'&url='.$_GET['url'].'&id='.$vo['mid']);?>')"><?php echo ($vo['title']); ?></a><?php if(!empty($vo["serialize"])): ?><span class="text-yellow padding-left"><?php echo ($vo['serialize']); ?></span><?php endif; ?></td>
                <td><?php echo ($vo['type']); ?></td>
                <td><?php echo (time_format($vo["last"],"Y-m-d")); ?></td>
                <td>
                    <a href="javascript:ajaxjson('<?php echo U('collect?action=id&id='.$vo['mid'].'&fid='.$_GET['fid'].'&url='.$_GET['url'].'&type='.$_GET['type']);?>',1)">采集</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            <?php else: ?>
            <td colspan="6"> aOh! 暂时还没有内容! </td><?php endif; ?>
        </table>
         <div class="panel-foot text-center">
         	<div class="page"><?php echo ($_page); ?></div>
        </div>
        </form>
    </div>
    <div id="mydialog">
        <div class="dialog">
            <div class="dialog-head">
                <span class="dialog-close close rotate-hover"></span>
                <strong>采集进度</strong>
            </div>
            <div class="dialog-body">
                <p class="text-center">已采集 <span class="badge bg-green num">0</span> 条 共采集<span class="badge bg-green count">0</span> 条</p>
                <div class="progress progress-striped active progress-big">
                	<div class="progress-bar bg-sub" style="width:0%;">进度：0%</div>
                </div>
                <div style="width:100%;height:150px;OVERFLOW-Y: auto; OVERFLOW-X:hidden; margin-top:10px">
                    <ul class="list-group">
                    </ul>
                </div>
            </div>
            <div class="dialog-foot">
            	<button class="dialog-close button">取消</button>
            </div>
        </div>
    </div>
    <div id="dialogmovie">
        <div class="dialog">
            <div class="dialog-head">
                <span class="dialog-close close rotate-hover"></span>
                影片内容
            </div>
            <div class="dialog-body">
                <DIV class="inner">
                    <DIV class="pic"><IMG id="movie_pic" class="img-border radius padding-small img-responsive" src=""></DIV>
                    <UL>
                    <LI>ID： <span id="movie_mid"></span></LI>
                    <LI>标题： <span id="movie_title"></span></LI>
                    <LI>分类： <span id="movie_type"></span></LI> 
                    <LI>主演： <span id="movie_actors"></span></LI> 
                    <LI>地区： <span id="movie_area"></span></LI>
                    <LI>语言： <span id="movie_language"></span></LI>
                    <LI>时间： <span id="movie_last"></span></LI>
                    </UL>
                    <div class="panel margin-bottom">
                      <div class="panel-body" style="height:100px; overflow:auto;" id="movie_content"></div>
                    </div>
                    <DIV class="tb">
                        <H4>
                            <LABEL>影片地址</LABEL>
                            <span class="downward"></span>
                            <div class="drop">
                              <ul class="drop-menu">
                              </ul>
                            </div>
                        </H4>
                        <TABLE cellSpacing=0 cellPadding=0 border=0>
                            <TR>
                            <TH>标题</TH>
                            <TH>资源地址</TH>
                            <TH>播放</TH>
                            </TR>
                        </TABLE>
                        <div id="Ajax_Content">
                        
                        </div>
                        <DIV id="Pages"></DIV>
                    </DIV>
                </DIV>
            </div>
            <div class="dialog-foot">
                <button class="button bg-green dialog-close">关闭</button>
            </div>
        </div>
	</div>
    <div id="dialogplayer">
        <div class="dialog">
            <div class="dialog-head">
                <span class="dialog-close close rotate-hover"></span>
                影片播放
            </div>
            <div class="dialog-body">
            <iframe id="cplayer" width="100%" height="100%" frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="yes"></iframe>
            </div>
            <div class="dialog-foot">
                <button class="button bg-green dialog-close">关闭</button>
            </div>
        </div>
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
	highlight_subnav('<?php echo U('Collect/index');?>');
})
</script>

</body>
</html>