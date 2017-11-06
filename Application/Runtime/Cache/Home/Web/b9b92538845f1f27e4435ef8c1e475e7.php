<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href="/Public/Comment/style/style.css" rel="stylesheet" type="text/css">
	<link href="/Public/static/face/css/face.css" rel="stylesheet" type="text/css">
	<title>评论</title>
</head>
<body>
	<!-- 未完成 -->
	<div style="width: 100%; padding-bottom: 20px">
		<span id="counter-box">
			<div class="global-nav">
				<ul>
					<li>
						<h4 class="pull-left" style="display: inline-block;font-weight: initial;font-size: 20px">精彩影评</h4>
						<h5 class="pull-left" style="display: inline-block;font-weight: initial;font-size:14px">已盖 <span style="color:#f10"><?php echo ($count); ?></span> 楼</h5>
					</li>
				</ul>
			</div>
		</span>
		<span id="post-box">
			<div class="uyanpost">
				<form method="post" action="<?php echo U('add');?>" class="form-x">
				<div class="resetbox sectionbox">
					<div class="blockbox">
						<div class="postarea">
							<div class="postborder">
								<div class="layui-form" style="position: relative;">
									<?php if(empty($user['id'])): ?><div style="background:#fff;
									width: 99.8%;height: 128px;font-size: 14px;box-sizing:border-box;padding:10px">您还未登录，请先 <a href="<?php echo U('User/Public/login');?>" style="color:#f20" target="_parent">登录</a> 后再发表评论。</div>
									<?php else: ?>
									<textarea style="height: 100px;box-shadow:none;border:1px solid #DFDFDF;box-sizing:border-box;padding:10px" name="content" id="LAY_desc"></textarea><?php endif; ?>
								</div>
							</div>
							<div style="display: block;text-align: right;margin-top:8px">
								<span style="font-size: 14px;color:#f20">注意，以下行为将被封号：严重剧透、发布广告、木马链接、宣传同类网站、等骂工作人员等。</span>
								<button class="btn btn-info ajaxpost" type="submit" target-form="form-x">发 送</button>
							</div>
						</div>
						<input type="hidden" name="mid" value="<?php echo ($mid); ?>">
					</div>
				</div>
				</form>
			</div>
		</span>
		<span id="nav-box">
			<div class="nav">
				<div class="nav-left">
					<span style="font-size: 20px;"> 最新影评</span>
				</div>
				<div class="claer"></div>
			</div>
		</span>
		<span id="posts">
			
		</span>
		<span id="loadmore" style="display: none;"></span>
		<div class="ujian-uyan"></div>
	</div>
	<script src="/Public/static/jquery.js"></script>
</body>
	<script src="/Public/static/face/face_icon.js"></script>
	<script src="/Public/static/face/face.js"></script>
	<script type="text/javascript">
		var trre=<?php echo json_encode($tree);?>,page_num=<?php echo ((isset($limit) && ($limit !== ""))?($limit):5); ?>,count=<?php echo ($count); ?>;
	</script>
	<script src="/Public/Comment/js/comment.js"></script>
</html>