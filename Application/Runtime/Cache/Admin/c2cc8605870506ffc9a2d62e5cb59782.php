<?php if (!defined('THINK_PATH')) exit(); if(is_array($tree)): $i = 0; $__LIST__ = $tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><dl>
		<dt class="line border-bottom">
			<form action="<?php echo U('edit');?>" method="post">
			  <div class="x1 fold"><span></span></div>
			  <div class="x1"><?php echo ($list["id"]); ?></div>
			  <div class="x1"><input name="sort" type="text" class="input input-auto input-small" value="<?php echo ($list["sort"]); ?>" size="3">
				</div>
				<div class="x1"><?php echo ($list['display']?'是':'否'); ?></div>
                <div class="x1"><?php echo show_type_op($list['type']);?></div>
				<div class="x4">
					<span class="tab-sign"></span>
					<input type="hidden" name="id" value="<?php echo ($list["id"]); ?>">
					<input type="text" name="title" class="input input-auto input-small" class="text" value="<?php echo ($list["title"]); ?>" size="30">
					<a class="add-sub-cate" title="添加子分类" href="<?php echo U('add?pid='.$list['id']);?>">
						<span class="icon-plus-circle text-big"></span>
                        添加子类
					</a>
				</div>
                <div class="float-right">
					<a title="编辑" href="<?php echo U('edit?id='.$list['id'].'&pid='.$list['pid']);?>">编辑</a>
					<a title="<?php echo (show_status_op($list["status"])); ?>" href="<?php echo U('setStatus?id='.$list['id'].'&status='.abs(1-$list['status']));?>" class="ajax-get"><?php echo (show_status_op($list["status"])); ?></a>
					<a title="删除" href="<?php echo U('remove?id='.$list['id']);?>" class="confirm ajax-get">删除</a>
					<a title="移动" href="<?php echo U('operate?type=move&from='.$list['id']);?>">移动</a>
					<a title="合并" href="<?php echo U('operate?type=merge&from='.$list['id']);?>">合并</a>
				</div>
			</form>
		</dt>
		<?php if(!empty($list['_'])): ?><dd>
				<?php echo R('Category/tree', array($list['_']));?>
			</dd><?php endif; ?>
	</dl><?php endforeach; endif; else: echo "" ;endif; ?>