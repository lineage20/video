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
    <div class="panel-head"><strong>影片品论</strong></div>
    <div class="panel-body">
      	<?php echo R('Comment/tree', array($tree));?>
    </div>
</div>
<script src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript">
$(function(){
	$(".ajaxget").click(function(){
		var url=$(this).attr('href');
		$.get(url).success(function(data){
			 if (data.status==1) {
				parent.layer.msg(data.info,{icon: 1,shade: 0.3},function(){
					location.reload();
				});
			 }else{
				parent.layer.msg(data.info,{icon: 0,shade: 0.3});
			 }
		});
		return false;
	});
})
</script>
</body>
</html>