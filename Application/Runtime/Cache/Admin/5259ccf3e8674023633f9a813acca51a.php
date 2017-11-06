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
	
	<script type="text/javascript" src="/Public/static/uploadify/jquery.uploadify.min.js"></script>
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
                    <div class="label"><label>影片名称</label></div>
                    <div class="field">
                        <input type="text" name="title" class="input input-auto" size="50" value="<?php echo ((isset($info["title"]) && ($info["title"] !== ""))?($info["title"]):''); ?>" placeholder="影片名称"/>                    
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>影片主演</label></div>
                    <div class="field">
                        <input type="text" name="actors" class="input input-auto" size="50" value="<?php echo ((isset($info["actors"]) && ($info["actors"] !== ""))?($info["actors"]):''); ?>" placeholder="多个主演使用半角逗号分隔开"/>                    
                    </div>
                </div>
              <div class="form-group">
                    <div class="label"><label>影片分类</label></div>
                    <div class="field">
                        <select class="input input-auto" name="category">
                        	<?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["html"]); echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                         </select>
                    </div>
              </div>
                <div class="form-group">
                    <div class="label"><label>影片地区</label></div>
                    <div class="field">
                        <select class="input input-auto" name="area">
                            <?php if(is_array(C("MOVIE_AREA"))): $i = 0; $__LIST__ = C("MOVIE_AREA");if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$area): $mod = ($i % 2 );++$i;?><option value="<?php echo ($area); ?>"><?php echo ($area); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>影片语言</label></div>
                    <div class="field">
                        <select class="input input-auto" name="language">
                            <?php if(is_array(C("MOVIE_LANGUAGE"))): $i = 0; $__LIST__ = C("MOVIE_LANGUAGE");if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$language): $mod = ($i % 2 );++$i;?><option value="<?php echo ($language); ?>"><?php echo ($language); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>影片年份</label></div>
                    <div class="field">
                        <select class="input input-auto" name="year">
                                <?php if(is_array(C("MOVIE_YEAR"))): $i = 0; $__LIST__ = C("MOVIE_YEAR");if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$year): $mod = ($i % 2 );++$i;?><option value="<?php echo ($year); ?>"><?php echo ($year); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="label"><label>影片图片</label></div>
                    <div class="field">
                    	<input type="file" id="upload_picture">
                    	<input type="hidden" name="cover_id" id="cover_id" value="<?php echo ((isset($info["cover_id"]) && ($info["cover_id"] !== ""))?($info["cover_id"]):0); ?>"/>
                        <div class="upload-img-box">
                            <?php if(!empty($info["picurl"])): ?><div class="upload-pre-item"><img width="155" height="220" class="img-border" src="<?php echo ($info["picurl"]); ?>"/></div><?php endif; ?>
               			</div>
                        <script type="text/javascript">
    						//上传图片
    					    /* 初始化上传插件 */
    						$("#upload_picture").uploadify({
    					        "height"          : 35,
    					        "swf"             : "/Public/static/uploadify/uploadify.swf",
    					        "fileObjName"     : "download",
    							"buttonClass"     :  "button bg-green",
    					        "buttonText"      : "上传图片",
    					        "uploader"        : "<?php echo U('File/uploadPicture',array('session_id'=>session_id(),'water'=>1));?>",
    					        "width"           : 100,
    					        'removeTimeout'	  : 1,
    					        'fileTypeExts'	  : '*.jpg; *.png; *.gif;',
    					        "onUploadSuccess" : uploadPicture,
    					        'onFallback' : function() {
    					            alert('未检测到兼容版本的Flash.');
    					        }
    					    });
    						function uploadPicture(file, data){
    							var data = eval('('+data+')');
    					    	//var data = $.parseJSON(data);
    					    	var src = '';
    					        if(data.status){
    					        	$("#cover_id").val(data.id);
    					        	src = data.url || '' + data.path
    					        	$("#cover_id").parent().find('.upload-img-box').html(
    					        		'<div class="upload-pre-item"><img width="155" height="220" class="img-border" src="' + src + '"/></div>'
    					        	);
    					        } else {
    					        	updateAlert(data.info);
    					        	setTimeout(function(){
    					                updateAlert();
                       					$(that).prop('disabled',false);
    					            },1500);
    					        }
    					    }
    					</script>
                    </div>
                </div>
                <?php if(($info["id"] != '') AND ($info["palyer"] != '') ): if(is_array($info["palyer"])): $num = 0; $__LIST__ = $info["palyer"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$playerurl): $mod = ($num % 2 );++$num;?><div class="form-group" id="movieurl">
                    <div class="label"><label>播放地址<?php echo ($num); ?></label></div>
                    <div class="field">
                        <p>
                            <select class="input input-auto" name="movie_player_id[]">
                                <?php if(is_array($playerlist)): $i = 0; $__LIST__ = $playerlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$player): $mod = ($i % 2 );++$i;?><option value="<?php echo ($player["id"]); ?>" <?php if(($playerurl["movie_player_id"]) == $player["id"]): ?>selected<?php endif; ?>><?php echo ($player["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                            <span class="text-gray">注：分集名称用"$"分隔，一行一集播放地址。</span>
                            <?php if(($num) == "1"): ?><button name="addurl" class="float-right button button-small icon-plus bg-yellow addurl" type="button"> 添加一组播放地址</button>
                            <?php else: ?>
                            <button name="addurl" class="float-right button button-small icon-minus bg-yellow delurl confirm ajax-get no-refresh" callback="removeurl(that)" type="button" url="<?php echo U('delurl?pid='.$playerurl['id']);?>"> 删除这组播放地址</button><?php endif; ?>
                        </p>
                        <p>
                        	<input type="hidden" name="pid[]" value="<?php echo ((isset($playerurl["id"]) && ($playerurl["id"] !== ""))?($playerurl["id"]):0); ?>">
                        	<textarea id="movie_url_<?php echo ($num); ?>" name="movie_url[]" class="input" rows="6"><?php echo ((isset($playerurl["movie_url"]) && ($playerurl["movie_url"] !== ""))?($playerurl["movie_url"]):''); ?></textarea>
                        </p>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                <?php else: ?>
                <div class="form-group" id="movieurl">
                    <div class="label"><label>播放地址1</label></div>
                    <div class="field">
                        <p>
                            <select class="input input-auto" name="movie_player_id[]">
                                <?php if(is_array($playerlist)): $i = 0; $__LIST__ = $playerlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$player): $mod = ($i % 2 );++$i;?><option value="<?php echo ($player["id"]); ?>"><?php echo ($player["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                            <span class="text-gray">注：分集名称用"$"分隔，一行一集播放地址。</span>
                             <button name="addurl" class="float-right button button-small icon-plus bg-yellow addurl" type="button"> 添加一组播放地址</button>
                        </p>
                        <p>
                        	<textarea name="movie_url[]" class="input" rows="6"></textarea>
                        </p>
                    </div>
                </div><?php endif; ?>
                <div class="form-group">
                    <div class="label"><label>影片介绍</label></div>
                    <div class="field">
                        <script type="text/javascript" src="/Public/static/ueditor/ueditor.config.js"></script>
                        <script type="text/javascript" src="/Public/static/ueditor/ueditor.all.js"></script>
                        <script id="container" name="content" style="width:100%;height:300px;" type="text/plain"><?php echo (stripslashes(htmlspecialchars_decode($info["content"]))); ?></script>
                        <script type="text/javascript">
                            var ue = UE.getEditor('container',{
                              serverUrl :'<?php echo U('Ueditor/Index');?>',
                                    UEDITOR_HOME_URL:'/Public/static/ueditor/',
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="tab-panel" id="tab-senior">
            	<div class="form-group">
                    <div class="label"><label>影片别名</label></div>
                    <div class="field">
                        <input type="text" name="also_known_as" class="input input-auto" size="50" value="<?php echo ((isset($info["also_known_as"]) && ($info["also_known_as"] !== ""))?($info["also_known_as"]):''); ?>"/>      
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>导演</label></div>
                    <div class="field">     
						<input type="text" name="directors" class="input input-auto" size="50" value="<?php echo ((isset($info["directors"]) && ($info["directors"] !== ""))?($info["directors"]):''); ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>影片推荐</label></div>
                    <div class="field">
                    	<div class="button-group checkbox">
                        <?php if(is_array(C("DOCUMENT_POSITION"))): $i = 0; $__LIST__ = C("DOCUMENT_POSITION");if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pos): $mod = ($i % 2 );++$i;?><label class="button <?php if(check_document_position($info['position'],$key)): ?>active<?php endif; ?>"><input type="checkbox" value="<?php echo ($key); ?>" name="position[]" <?php if(check_document_position($info['position'],$key)): ?>checked="checked"<?php endif; ?>><?php echo ($pos); ?></label><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>推荐标签</label></div>
                    <div class="field">
                        <div class="button-group radio">
                            <label class="button <?php if(($info['tj_tag']) == "0"): ?>active<?php endif; ?>">
                                <input name="tj_tag" value="0" checked="checked" type="radio">无
                            </label>
                            <label class="button <?php if(($info['tj_tag']) == "1"): ?>active<?php endif; ?>">
                                <input name="tj_tag" value="1" type="radio">热剧更新
                            </label>
                            <label class="button <?php if(($info['tj_tag']) == "2"): ?>active<?php endif; ?>">
                                <input name="tj_tag" value="2" type="radio">正在热播
                            </label>
                            <label class="button <?php if(($info['tj_tag']) == "3"): ?>active<?php endif; ?>">
                                <input name="tj_tag" value="3" type="radio">大片抢先看
                            </label>
                            <label class="button <?php if(($info['tj_tag']) == "4"): ?>active<?php endif; ?>">
                                <input name="tj_tag" value="4" type="radio">VIP专享
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>连载信息</label></div>
                    <div class="field">     
						<input type="text" name="serialize" class="input input-auto" size="15" value="<?php echo ((isset($info["serialize"]) && ($info["serialize"] !== ""))?($info["serialize"]):''); ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>影片人气</label></div>
                    <div class="field">
                        <input type="text" name="hits" class="input input-auto" size="15" value="<?php echo ((isset($info["hits"]) && ($info["hits"] !== ""))?($info["hits"]):0); ?>"/>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="label"><label>影片评分</label></div>
                    <div class="field">
                        <input type="text" name="rating" class="input input-auto" size="15" value="<?php echo ((isset($info["rating"]) && ($info["rating"] !== ""))?($info["rating"]):0); ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>评分人数</label></div>
                    <div class="field">
                        <input type="text" name="rating_count" class="input input-auto" size="15" value="<?php echo ((isset($info["rating_count"]) && ($info["rating_count"] !== ""))?($info["rating_count"]):0); ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>顶</label></div>
                    <div class="field">
                        <input type="text" name="up" class="input input-auto" size="15" value="<?php echo ((isset($info["up"]) && ($info["up"] !== ""))?($info["up"]):0); ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>踩</label></div>
                    <div class="field">
                        <input type="text" name="down" class="input input-auto" size="15" value="<?php echo ((isset($info["down"]) && ($info["down"] !== ""))?($info["down"]):0); ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label>创建时间</label></div>
                    <div class="field">     
                        <input type="text" name="create_time" class="input input-auto time" size="15" value="<?php echo (time_format($info["create_time"],'Y-m-d')); ?>"/>
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

    <script src="/Public/static/layer/layer.js"></script>
    <link href="/Public/static/datetimepicker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css">
    <link href="/Public/static/datetimepicker/css/dropdown.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/Public/static/datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
	<script type="text/javascript">
		$(function(){
			$('.time').datetimepicker({
				format: 'yyyy-mm-dd',
				language:"zh-CN",
				minView:2,
				autoclose:true
			});
		});	
		<?php if(isset($info["id"])): ?>setValue("category", <?php echo ((isset($info["category"]) && ($info["category"] !== ""))?($info["category"]):1); ?>);
		setValue("area", "<?php echo ((isset($info["area"]) && ($info["area"] !== ""))?($info["area"]):''); ?>");
		setValue("language", "<?php echo ((isset($info["language"]) && ($info["language"] !== ""))?($info["language"]):''); ?>");
		setValue("year", <?php echo ((isset($info["year"]) && ($info["year"] !== ""))?($info["year"]):2014); ?>);
		setValue("display", <?php echo ((isset($info["display"]) && ($info["display"] !== ""))?($info["display"]):1); ?>);
        setValue("tj_tag", <?php echo ((isset($info["tj_tag"]) && ($info["tj_tag"] !== ""))?($info["tj_tag"]):0); ?>);
		highlight_subnav('<?php echo U('Movie/index');?>');<?php endif; ?>
	</script>

</body>
</html>