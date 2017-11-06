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
  <div class="panel-head"><strong><?php echo ($meta_title); ?></strong></div>
  <div class="panel-body">
  	<form method="post" class="form-x" action="<?php echo U();?>">
        <div class="form-group">
            <div class="label"><label>标题</label></div>
            <div class="field"> <input type="text" class="input input-auto"  size="30" name="title" value="<?php echo ((isset($info["title"]) && ($info["title"] !== ""))?($info["title"]):''); ?>"/> </div>
        </div>
        <div class="form-group">
            <div class="label"><label>类型</label></div>
            <div class="field">
            	<select class="input input-auto" name="type">
                	<option value="0">web</option>
                	<option value="2">wap</option>
                    <option value="1">app</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label>图片</label></div>
            <div class="field">
            	<input type="file" id="upload_picture">
            	<input type="hidden" name="cover_id" id="cover_id" value="<?php echo ((isset($info["cover_id"]) && ($info["cover_id"] !== ""))?($info["cover_id"]):0); ?>"/>
                <div id="showpic" class="margin-top">
                    <?php if(!empty($info["picurl"])): ?><img class="img-thumbnail" style="height:100px;" src="<?php echo ($info["picurl"]); ?>"/><?php endif; ?>
       			</div>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label>链接</label></div>
            <div class="field">
	            <div class="input-group x4">
					<input type="text" class="input input-auto" size="50" name="link" value="<?php echo ((isset($info["link"]) && ($info["link"] !== ""))?($info["link"]):""); ?>"/>
					<span class="addbtn">
	            		<button type="button" class="button open_movie" url="<?php echo U('movie/index',array('open'=>1));?>">选择影片</button>
	                </span>
				</div>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label>排序</label></div>
            <div class="field"> <input type="text" class="input input-auto"  size="10" name="sort" value="<?php echo ((isset($info["sort"]) && ($info["sort"] !== ""))?($info["sort"]):0); ?>"/> </div>
        </div>
        <input type="hidden" name="id" id="id" value="<?php echo ($info["id"]); ?>" />
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

	<script type="text/javascript" src="/Public/static/uploadify/jquery.uploadify.min.js"></script>
	<script type="text/javascript" src="/Public/static/layer/layer.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){

			$(".open_movie").click(function(){
                layer.open({
                    type: 2,
                    area: ['800px', '600px'],
                    fix: false, //不固定
                    maxmin: true,
                    content: $(this).attr('url')
                });
                return false;
            });
		
			<?php if(isset($info["id"])): ?>highlight_subnav('<?php echo U('Slider/index');?>');
				setValue("type", <?php echo ($info["type"]); ?>);
			<?php else: ?>
				highlight_subnav('<?php echo U('Slider/add');?>');<?php endif; ?>	
			
			$("#upload_picture").uploadify({
				"height"          : 35,
				"swf"             : "/Public/static/uploadify/uploadify.swf",
				"fileObjName"     : "download",
				"buttonClass"     :  "button bg-green",
				"buttonText"      : " 上传图片",
				"uploader"        : "<?php echo U('Slider/uploadPicture',array('session_id'=>session_id()));?>",
				"width"           : 100,
				'removeTimeout'	  : 1,
				'fileTypeExts'	  : '*.jpg; *.png; *.gif;',
				"onUploadSuccess" : uploadPicture,
				'onFallback' : function() {
					alert('未检测到兼容版本的Flash.');
				}
			});
			function uploadPicture(file, data){
				var data = $.parseJSON(data);
				var src = '';
				if(data.status){
					$("#cover_id").val(data.id);
					src = data.url || '' + data.path
					$("#cover_id").parent().find('#showpic').html(
		        		'<img class="img-thumbnail" style="height:100px;" src="' + src + '"/>'
		        	);
				} else {
					updateAlert(data.info);
		        	setTimeout(function(){
		                updateAlert();
       					$(that).prop('disabled',false);
		            },1500);
				}
			}
		});
	</script>

</body>
</html>