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
	
    <div class="tab">
      <div class="tab-head">
        <ul class="tab-nav">
        <?php if(is_array(C("CONFIG_GROUP_LIST"))): $i = 0; $__LIST__ = C("CONFIG_GROUP_LIST");if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$group): $mod = ($i % 2 );++$i;?><li <?php if(($id) == $key): ?>class="active"<?php endif; ?>><a href="<?php echo U('?id='.$key);?>"><?php echo ($group); ?>配置</a></li>&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
      <div class="tab-body">
        <br />
        <form method="post" class="form-x" action="<?php echo U('save');?>">
        <div class="tab-panel active" id="tab-set">
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$config): $mod = ($i % 2 );++$i;?><div class="form-group">
                    <div class="label"><label><?php echo ($config["title"]); ?></label></div>
                    <div class="field">
                        <?php switch($config["type"]): case "0": ?><input type="text" class="input input-auto"  size="30" name="config[<?php echo ($config["name"]); ?>]" value="<?php echo ($config["value"]); ?>" placeholder="<?php echo ($config["remark"]); ?>" data-validate="required:请填写<?php echo ($config["title"]); ?>" /><?php break;?>
                            <?php case "1": ?><input type="text" class="input input-auto" size="50" name="config[<?php echo ($config["name"]); ?>]" value="<?php echo ($config["value"]); ?>" placeholder="<?php echo ($config["remark"]); ?>" data-validate="required:请填写<?php echo ($config["title"]); ?>" /><?php break;?>
                            <?php case "2": ?><textarea name="config[<?php echo ($config["name"]); ?>]" class="input input-auto" rows="5" cols="50" placeholder="<?php echo ($config["remark"]); ?>" data-validate="required:请填写<?php echo ($config["title"]); ?>"><?php echo ($config["value"]); ?></textarea><?php break;?>
                            <?php case "3": ?><textarea name="config[<?php echo ($config["name"]); ?>]" class="input  input-auto" rows="5" cols="50" placeholder="<?php echo ($config["remark"]); ?>" data-validate="required:请填写<?php echo ($config["title"]); ?>"><?php echo ($config["value"]); ?></textarea><?php break;?>
                            <?php case "4": ?><select name="config[<?php echo ($config["name"]); ?>]" class="input input-auto" data-validate="required:请选择<?php echo ($config["title"]); ?>">
                                    <?php $_result=parse_config_attr($config['extra']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" <?php if(($config["value"]) == $key): ?>selected<?php endif; ?>><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select><?php break;?>
                            <?php case "5": ?><textarea name="config[<?php echo ($config["name"]); ?>]" class="input  input-auto" rows="5" cols="50" placeholder="<?php echo ($config["remark"]); ?>" data-validate="required:请填写<?php echo ($config["title"]); ?>"><?php echo ($config["value"]); ?></textarea><?php break; endswitch;?>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <br>
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

</body>
</html>