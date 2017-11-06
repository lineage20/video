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
    <form id="export-form" method="post" action="<?php echo U('export');?>">
    	<div class="panel-head"><strong>数据备份</strong></div>
        <div class="padding border-bottom">
        	<div class="button-group button-group-small">
            <button type="button" class="button checkall" checkfor="tables[]" name="checkall"><span class="icon-check-square-o"></span> 全选</button>
             <a id="export" class="button" href="<?php echo U('optimize');?>"><span class="icon-hdd-o text-yellow"></span> 立即备份</a>
             <a id="optimize" class="button" href="<?php echo U('optimize');?>"><span class="icon-wrench text-blue"></span> 优化表</a>
             <a id="repair" class="button" href="<?php echo U('repair');?>"><span class="icon-medkit text-red"></span> 修复表</a>
             </div>
        </div>
        <table class="table table-hover">
        
        	<tr>
                <th width="45">选择</th>
                <th>表名</th>
                <th width="120">数据量</th>
                <th width="120">数据大小</th>
                <th width="160">创建时间</th>
                <th width="160">备份状态</th>
                <th width="120">操作</th>
            </tr>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$table): $mod = ($i % 2 );++$i;?><tr>
                <td><input name="tables[]" type="checkbox" value="<?php echo ($table["name"]); ?>"></td>
                 <td><?php echo ($table["name"]); ?></td>
                <td><?php echo ($table["rows"]); ?></td>
                <td><?php echo (format_bytes($table["data_length"])); ?></td>
                <td><?php echo ($table["create_time"]); ?></td>
                <td class="info">未备份</td>
                <td class="action">
                    <a class="ajax-get no-refresh" href="<?php echo U('optimize?tables='.$table['name']);?>">优化表</a>&nbsp;
                    <a class="ajax-get no-refresh" href="<?php echo U('repair?tables='.$table['name']);?>">修复表</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
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
    (function($){
        var $form = $("#export-form"), $export = $("#export"), tables
            $optimize = $("#optimize"), $repair = $("#repair");
        $optimize.add($repair).click(function(){
            $.post(this.href, $form.serialize(), function(data){
                if(data.status){
                    updateAlert(data.info,'alert-green');
                } else {
                    updateAlert(data.info,'alert-red');
                }
                setTimeout(function(){
					updateAlert();
					$(that).prop('disabled',false);
	            },1500);
            }, "json");
            return false;
        });

        $export.click(function(){
            $export.parent().children().addClass("disabled");
            $export.html("正在发送备份请求...");
            $.post(
                $form.attr("action"),
                $form.serialize(),
                function(data){
                    if(data.status){
                        tables = data.tables;
                        $export.html(data.info + "开始备份，请不要关闭本页面！");
                        backup(data.tab);
                        window.onbeforeunload = function(){ return "正在备份数据库，请不要关闭！" }
                    } else {
                        updateAlert(data.info,'alert-red');
                        $export.parent().children().removeClass("disabled");
                        $export.html("<span class='icon-hdd-o text-yellow'></span> 立即备份");
                        setTimeout(function(){
							updateAlert();
        	                $(that).prop('disabled',false);
        	            },1500);
                    }
                },
                "json"
            );
            return false;
        });

        function backup(tab, status){
            status && showmsg(tab.id, "开始备份...(0%)");
            $.get($form.attr("action"), tab, function(data){
                if(data.status){
                    showmsg(tab.id, data.info);

                    if(!$.isPlainObject(data.tab)){
                        $export.parent().children().removeClass("disabled");
                        $export.html("<span class='icon-hdd-o text-yellow'></span> 备份完成，点击重新备份");
                        window.onbeforeunload = function(){ return null }
                        return;
                    }
                    backup(data.tab, tab.id != data.tab.id);
                } else {
                    updateAlert(data.info,'alert-red');
                    $export.parent().children().removeClass("disabled");
                    $export.html("<span class='icon-hdd-o text-yellow'></span> 立即备份");
                    setTimeout(function(){
						updateAlert();
    	                 $(that).prop('disabled',false);
    	            },1500);
                }
            }, "json");

        }

        function showmsg(id, msg){
            $form.find("input[value=" + tables[id] + "]").closest("tr").find(".info").html(msg);
        }
    })(jQuery);
    </script>

</body>
</html>