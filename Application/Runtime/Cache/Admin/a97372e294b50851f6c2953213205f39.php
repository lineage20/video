<?php if (!defined('THINK_PATH')) exit();?><div class="view-body">
	<?php if(is_array($tree)): $i = 0; $__LIST__ = $tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div class="media media-x">
		<a class="float-left" href="#">
			<img src="<?php echo ($list['user']['path']); ?>" width="32" height="32" class="radius" alt="<?php echo ($list['user']['username']); ?>">
		</a>
		<div class="media-body">
			<strong><?php echo ($list['user']['username']); ?> <?php echo (tmspan($list['create_time'])); ?> <div class="float-right"><a class="ajaxget" href="<?php echo U('Comment/del',"id=".$list['id']);?>">删除</a></strong></div><?php echo (ubb_face($list['content'])); ?>
			<hr />
			<?php if(!empty($list['_'])): ?><div class="media media-x">
					<?php echo R('Comment/tree', array($list['_']));?>
				</div><?php endif; ?>
		</div>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>