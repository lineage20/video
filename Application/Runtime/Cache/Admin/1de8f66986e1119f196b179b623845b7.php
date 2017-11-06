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
	
    <div id="top-alert" class="alert fixed hidden alert-red"></div>
    <div class="tab">
        <div class="tab-head">
            <ul class="tab-nav">
                <li class="active"><a href="#tab-player">播放器</a></li>
                <li><a href="#tab-playerad">播前广告</a></li>
            </ul>
         </div>
         <div class="tab-body">
            <br />
            <form action="<?php echo U();?>" class="form-x"  method="post">
            <div class="tab-panel active" id="tab-player">
                <div class="form-group">
                    <div class="label"><label>播放器名称</label></div>
                    <div class="field">
                        <input type="text" name="title" class="input input-auto" size="50" value="<?php echo ((isset($info["title"]) && ($info["title"] !== ""))?($info["title"]):''); ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>播放器排序</label></div>
                    <div class="field">
                        <input type="text" name="sort" class="input input-auto" size="10" value="<?php echo ((isset($info["sort"]) && ($info["sort"] !== ""))?($info["sort"]):0); ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>模式</label></div>
                    <div class="field">
                        <select class="input input-auto" name="vip">
                            <option value="0">游客</option>
                            <option value="1">VIP</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>类型</label></div>
                    <div class="field">
                        <select class="input input-auto" name="type">
                            <option value="0">播放</option>
                            <option value="1">下载</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>播放器代码</label></div>
                    <div class="field">
                    	<p class="text-gray"><$url>影片地址 <$lasturl>上一集 <$nexturl>下一集 <$lastplay>上一集播放页 <$nextplay>下一集播放页</p>
                    	<p>
                        	<textarea name="player_code" class="input" rows="14" placeholder="播放器代码"><?php echo ((isset($info["player_code"]) && ($info["player_code"] !== ""))?($info["player_code"]):''); ?></textarea>
                        </p>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="label"><label>可见性</label></div>
                    <div class="field">
                    	<select class="input input-auto" name="display">
                        	<option value="1">可见</option>
                            <option value="0">不可见</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="tab-panel" id="tab-playerad">
                <div class="form-group">
                    <div class="label"><label>播前广告时间</label></div>
                    <div class="field">
                    	<select class="input input-auto" name="adon">
                        	<option value="0">关闭</option>
                            <option value="1">开启</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>播前广告开关</label></div>
                    <div class="field">
                    	<input type="text" name="timer" class="input input-auto" size="10" value="<?php echo ((isset($info["timer"]) && ($info["timer"] !== ""))?($info["timer"]):0); ?>"/> 单位秒
                    </div>
                </div>
                 <div class="form-group">
                    <div class="label"><label>广告代码</label></div>
                    <div class="field">
                        <textarea name="player_ad" class="input" rows="15" placeholder="广告代码"><?php echo ((isset($info["player_ad"]) && ($info["player_ad"] !== ""))?($info["player_ad"]):''); ?></textarea>                   
                    </div>
                </div>
            </div>
            <br />
            <input type="hidden" name="id" value="<?php echo ((isset($info["id"]) && ($info["id"] !== ""))?($info["id"]):''); ?>">
            <div class="form-button"><button class="button bg-main ajax-post" type="submit" target-form="form-x">提 交</button></div>
            </form>
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
		<?php if(isset($info["id"])): ?>setValue("vip", <?php echo ((isset($info["vip"]) && ($info["vip"] !== ""))?($info["vip"]):0); ?>);
        setValue("type", <?php echo ((isset($info["type"]) && ($info["type"] !== ""))?($info["type"]):0); ?>);
		setValue("display", <?php echo ((isset($info["display"]) && ($info["display"] !== ""))?($info["display"]):1); ?>);
		setValue("adon", <?php echo ((isset($info["adon"]) && ($info["adon"] !== ""))?($info["adon"]):1); ?>);
		highlight_subnav('<?php echo U('Player/index');?>');<?php endif; ?>
	</script>

</body>
</html>