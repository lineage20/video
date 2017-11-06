<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>欢迎您登录雷风影视系统-<?php echo ($meta_title); ?></title>
    <link rel="stylesheet" href="/Public/Admin/css/pintuer.css">
    <link rel="stylesheet" href="/Public/Admin/css/admin.css">
</head>
<body class="bg-white">
<div class="panel admin-panel margin-big">
    <div class="panel-head"><strong>推荐设置</strong></div>
    <div class="panel-body">
    	<form method="post" action="<?php echo U('tj');?>" class="form-x">
        <div class="form-group">
            <div class="label"><label>影片推荐</label></div>
            <div class="field">
                <div class="button-group checkbox">
                    <?php if(is_array(C("DOCUMENT_POSITION"))): $i = 0; $__LIST__ = C("DOCUMENT_POSITION");if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pos): $mod = ($i % 2 );++$i;?><label class="button <?php if(check_document_position($info['position'],$key)): ?>active<?php endif; ?>"><input type="checkbox" value="<?php echo ($key); ?>" name="position[]" <?php if(check_document_position($info['position'],$key)): ?>checked="checked"<?php endif; ?>><?php echo ($pos); ?></label><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
    		</div>
        </div>
        <div class="form-group add_time">
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
        <input type="hidden" name="id" value="<?php echo ((isset($info["id"]) && ($info["id"] !== ""))?($info["id"]):''); ?>">
        <div class="form-button"><button class="button bg-main ajaxpost" type="submit" target-form="form-x">确 认</button></div>
        </form>
    </div>
</div>
<script src="/Public/Admin/js/jquery.js"></script>
<script src="/Public/Admin/js/pintuer.js"></script>
<script src="/Public/Admin/js/respond.js"></script>
<script src="/Public/Admin/js/admin.js"></script>
<script src="/Public/static/layer/layer.js"></script>
<script type="text/javascript">
$(function(){
	$(".ajaxpost").click(function(){
		var url;
		var target_form = $(this).attr('target-form');
		var index = parent.layer.getFrameIndex(window.name);
		var form = $('.'+target_form);
		if (url = form.get(0).action) {
			query = form.serialize();
			$.post(url,query).success(function(data){
				 if (data.status==1) {
					parent.layer.msg(data.info,{icon: 1,shade: 0.3},function(){
						parent.location.reload();
						parent.layer.close(index);
					});
				 }else{
					parent.layer.msg(data.info,{icon: 0,shade: 0.3});
				 }
			});
		}
		return false;
	});
})
</script>
</body>
</html>