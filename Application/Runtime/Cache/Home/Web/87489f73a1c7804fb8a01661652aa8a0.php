<?php if (!defined('THINK_PATH')) exit();?><ul id="post-list" class="post-list">
	<?php if(is_array($tree)): $i = 0; $__LIST__ = $tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><li class="post">
		<div class="post-content">
			<div class="avatar hovercard">
				<div class="user">
					<img src="<?php echo ($list['user']['path']); ?>"></div>
				<div style="color:#666;font-size: 12px;text-align: center;margin-top: 5px">
				<?php echo ($_POST['count']-($_POST['page']*$_POST['limit']+$i-$_POST['limit'])+1); ?>楼</div>
			</div>
			<div class="post-body">
				<div class="u-header">
					<span class="author publisher-anchor-color" style="color:#f40;font-weight: initial;"><?php echo ($list['user']['username']); ?></span>
					<?php if($list['user']['vip_time'] > time()): ?><div class="post-meta"><i class="icon icon-user-vip"></i></div><?php endif; ?>
					<div class="post-meta">
						<span aria-hidden="true" class="bullet time-ago-bullet">•</span>
						<a class="time-ago"><?php echo (tmspan($list['create_time'])); ?></a>
					</div>
				</div>
				<div class="post-body-inner">
					<div data-role="message-container" class="post-message-container">
						<div data-role="message-content">
							<div class="post-message publisher-anchor-color">
								<p><?php echo (ubb_face($list['content'])); ?></p>
							</div>
						</div>
					</div>
				</div>
				<div class="u-footer">
					<ul>
						<li>
							<a onclick="up(<?php echo ($list['id']); ?>);" title="顶一下" href="javascript:void(0);" class="action">
								<span></span>
								顶<span style="font-size: 12px">（<?php echo ($list['up']); ?>）</span>
							</a> <em>•</em>
						</li>
						<li class="reply">
							<a class="action" href="javascript:void(0);" onclick="reply(this,<?php echo ((isset($list['mid']) && ($list['mid'] !== ""))?($list['mid']):0); ?>,<?php echo ((isset($list['id']) && ($list['id'] !== ""))?($list['id']):0); ?>);">回复</a>
						</li>
						<div class="claer"></div>
					</ul>
				</div>
			</div>
		</div>
		<div class="uyan-reply-postbox"></div>
		<ul class="children">
			<?php if(!empty($list['_'])): echo R('Comment/tree', array($list['_'])); endif; ?>
		</ul>
	</li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>