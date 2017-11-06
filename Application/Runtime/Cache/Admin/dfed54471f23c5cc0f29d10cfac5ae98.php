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
                <li class="active"><a href="#tab-basics">基础</a></li>
                <li><a href="#tab-senior">高级</a></li>
            </ul>
            </div>
            <div class="tab-body">
            <br />
            <form action="<?php echo U();?>" class="form-x"  method="post">
            <div class="tab-panel active" id="tab-basics">
                <div class="form-group">
                    <div class="label"><label>上级分类</label></div>
                    <div class="field">
                        <input type="text" class="input input-auto" size="50" value="<?php echo ((isset($category['title']) && ($category['title'] !== ""))?($category['title']):'无'); ?>" disabled="disabled" placeholder="上级分类"/>                    
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>分类名称</label></div>
                    <div class="field">
                        <input type="text" name="title" class="input input-auto" size="50" value="<?php echo ((isset($info["title"]) && ($info["title"] !== ""))?($info["title"]):''); ?>" placeholder="名称不能为空"/>                    
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>分类标识</label></div>
                    <div class="field">
                        <input type="text" name="name" class="input input-auto" size="50" value="<?php echo ((isset($info["name"]) && ($info["name"] !== ""))?($info["name"]):''); ?>" placeholder="分类标识"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>分类图标</label></div>
                    <div class="field">
                        <input type="text" name="icon" class="input input-auto" size="50" value="<?php echo ((isset($info["icon"]) && ($info["icon"] !== ""))?($info["icon"]):''); ?>" placeholder="分类图标"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>分类模型</label></div>
                    <div class="field">
                        <select class="input input-auto" name="type">
                        	<option value="1">视频模型 | vod</option>
                            <option value="2">文章模型 | news</option>
                            <option value="3">外链模型 | url</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>外链地址</label></div>
                    <div class="field">
                        <input type="text" name="link" class="input input-auto" size="50" value="<?php echo ((isset($info["link"]) && ($info["link"] !== ""))?($info["link"]):''); ?>" placeholder="外链url"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>播放记录</label></div>
                    <div class="field">
                        <select class="input input-auto" name="record">
                            <option value="1">记录</option>
                            <option value="0">不记录</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>收藏</label></div>
                    <div class="field">
                        <select class="input input-auto" name="private">
                            <option value="0">收藏夹</option>
                            <option value="1">私密收藏夹</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>app见性</label></div>
                    <div class="field">
                        <select class="input input-auto" name="appno">
                            <option value="1">可见</option>
                            <option value="0">不可见</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>导航见性</label></div>
                    <div class="field">
                        <select class="input input-auto" name="navno">
                            <option value="1">可见</option>
                            <option value="0">不可见</option>
                        </select>
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
            <div class="tab-panel" id="tab-senior">
            	 <div class="form-group">
                    <div class="label"><label>排序</label></div>
                    <div class="field">
                        <input type="text" name="sort" class="input input-auto" size="10" value="<?php echo ((isset($info["sort"]) && ($info["sort"] !== ""))?($info["sort"]):0); ?>"/> <span class="text-gray">（仅对当前层级分类有效）</span>                   
                    </div>
                </div>
                 <div class="form-group">
                    <div class="label"><label>网页标题</label></div>
                    <div class="field">
                        <input type="text" name="meta_title" class="input input-auto" size="50" value="<?php echo ((isset($info["meta_title"]) && ($info["meta_title"] !== ""))?($info["meta_title"]):''); ?>" placeholder="SEO 网页标题"/>                    
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>关键字</label></div>
                    <div class="field">     
                        <textarea name="keywords"  class="input input-auto" rows="5" cols="50" placeholder="SEO 关键字"><?php echo ((isset($info["keywords"]) && ($info["keywords"] !== ""))?($info["keywords"]):''); ?></textarea>           
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>描述</label></div>
                    <div class="field">     
                        <textarea name="description" class="input input-auto" rows="5" cols="50" placeholder="SEO 描述"><?php echo ((isset($info["description"]) && ($info["description"] !== ""))?($info["description"]):''); ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>频道模板</label></div>
                    <div class="field">     
                        <input type="text" name="template_index" class="input input-auto" size="50" value="<?php echo ((isset($info["template_index"]) && ($info["template_index"] !== ""))?($info["template_index"]):''); ?>"/>
                    </div>
                </div> 
                <div class="form-group">
                    <div class="label"><label>详情模板</label></div>
                    <div class="field">     
                        <input type="text" name="template_detail" class="input input-auto" size="50" value="<?php echo ((isset($info["template_detail"]) && ($info["template_detail"] !== ""))?($info["template_detail"]):''); ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>播放模板</label></div>
                    <div class="field">     
                        <input type="text" name="template_play" class="input input-auto" size="50" value="<?php echo ((isset($info["template_play"]) && ($info["template_play"] !== ""))?($info["template_play"]):''); ?>"/>
                    </div>
                </div>
                  <div class="form-group">
                    <div class="label"><label>筛选模板</label></div>
                    <div class="field">     
                        <input type="text" name="template_type" class="input input-auto" size="50" value="<?php echo ((isset($info["template_type"]) && ($info["template_type"] !== ""))?($info["template_type"]):''); ?>"/>
                    </div>
                </div>
            </div>
            <br />
            <input type="hidden" name="id" value="<?php echo ((isset($info["id"]) && ($info["id"] !== ""))?($info["id"]):''); ?>">
			<input type="hidden" name="pid" value="<?php echo isset($category['id'])?$category['id']:$info['pid'];?>">
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
		<?php if(isset($info["id"])): ?>setValue("record", <?php echo ((isset($info["record"]) && ($info["record"] !== ""))?($info["record"]):1); ?>);
        setValue("private", <?php echo ((isset($info["private"]) && ($info["private"] !== ""))?($info["private"]):0); ?>);
        setValue("appno", <?php echo ((isset($info["appno"]) && ($info["appno"] !== ""))?($info["appno"]):1); ?>);
        setValue("navno", <?php echo ((isset($info["navno"]) && ($info["navno"] !== ""))?($info["navno"]):1); ?>);
		setValue("display", <?php echo ((isset($info["display"]) && ($info["display"] !== ""))?($info["display"]):1); ?>);
		setValue("type", <?php echo ((isset($info["type"]) && ($info["type"] !== ""))?($info["type"]):1); ?>);
		highlight_subnav('<?php echo U('Category/index');?>');<?php endif; ?>
        type_show('<?php echo ((isset($info["type"]) && ($info["type"] !== ""))?($info["type"]):1); ?>');
        $('[name="type"]').change(function(event) {
            var type_value=$(this).val();
            type_show(type_value);
        });

        function type_show(type){
            switch(type){
            case '1':
              $('[name="link"]').parents('.form-group').hide();
              $('[name="record"]').parents('.form-group').show();
              $('[name="private"]').parents('.form-group').show();
              $('[name="template_index"]').parents('.form-group').show();
              $('[name="template_detail"]').parents('.form-group').show();
              $('[name="template_play"]').parents('.form-group').show();
              $('[name="template_type"]').parents('.form-group').show();
              break;
            case '2':
              $('[name="template_index"]').parents('.form-group').show();
              $('[name="template_detail"]').parents('.form-group').show();
              $('[name="link"]').parents('.form-group').hide();
              $('[name="record"]').parents('.form-group').hide();
              $('[name="private"]').parents('.form-group').hide();
              $('[name="template_play"]').parents('.form-group').hide();
              $('[name="template_type"]').parents('.form-group').hide();
              break;
            case '3':
              $('[name="link"]').parents('.form-group').show();
              $('[name="record"]').parents('.form-group').hide();
              $('[name="private"]').parents('.form-group').hide();
              $('[name="template_index"]').parents('.form-group').hide();
              $('[name="template_detail"]').parents('.form-group').hide();
              $('[name="template_play"]').parents('.form-group').hide();
              $('[name="template_type"]').parents('.form-group').hide();
              break;
            }
        }
	</script>

</body>
</html>