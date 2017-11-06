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
    <div class="panel-head"><strong>定时采集</strong></div>
    <div class="panel-body">
    	<form method="post" action="<?php echo U('cron');?>" class="form-x">
        <div class="form-group">
            <div class="label"><label>采集间隔</label></div>
            <div class="field">
                <select class="input input-auto" name="cron_time">
                    <option value="">关闭</option>
                    <option value="600" <?php if(($crons[$key][1]) == "600"): ?>selected="selected"<?php endif; ?>>10分钟</option>
                    <option value="1800" <?php if(($crons[$key][1]) == "1800"): ?>selected="selected"<?php endif; ?>>30分钟</option>
                    <option value="3600" <?php if(($crons[$key][1]) == "3600"): ?>selected="selected"<?php endif; ?>>1小时</option>
                    <option value="7200" <?php if(($crons[$key][1]) == "7200"): ?>selected="selected"<?php endif; ?>>2小时</option>
                    <option value="21600" <?php if(($crons[$key][1]) == "21600"): ?>selected="selected"<?php endif; ?>>6小时</option>
                    <option value="43200" <?php if(($crons[$key][1]) == "43200"): ?>selected="selected"<?php endif; ?>>12小时</option>        
                </select>
    		</div>
        </div>
        <input type="hidden" name="key" value="<?php echo ($key); ?>">
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