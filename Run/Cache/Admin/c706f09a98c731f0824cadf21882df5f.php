<?php if (!defined('THINK_PATH')) exit();?>
<?php if(is_array($tree)): $i = 0; $__LIST__ = $tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><dl class="cate-item">
		<dt class="cf" <?php if($list['leixing']) echo 'style="background-color: #efefef;"'; ?> >
			<form action="<?php echo U('edit');?>" method="post">
				<div class="btn-toolbar opt-btn cf">
					<a title="编辑" href="<?php echo U('edit?id='.$list['id'].'&pid='.$list['pid']);?>">编辑</a>
					<!-- <a title="<?php echo (show_status_op($list["status"])); ?>" href="<?php echo U('setStatus?ids='.$list['id'].'&status='.abs(1-$list['status']));?>" class="ajax-get"><?php echo (show_status_op($list["status"])); ?></a> -->
					<a title="删除" href="<?php echo U('del?id='.$list['id']);?>" class="confirm ajax-get">删除</a>
					<!-- <a title="移动" href="<?php echo U('operate?type=move&from='.$list['id']);?>">移动</a>
					<a title="合并" href="<?php echo U('operate?type=merge&from='.$list['id']);?>">合并</a> -->
				</div>
				<div class="fold"><i></i></div>
				<div class="order"><span><?php echo ($list["sort"]); ?></span> </div>
				
				<div class="name" style="width:400px">
					<span class="tab-sign"></span>
					<input type="hidden" name="id" value="<?php echo ($list["id"]); ?>">
					<a href="<?php echo U('getItem?id='.$list['id']);?>"><?php echo ($list["title"]); ?></a> 
					<!-- <input type="text" name="title" class="text" value="<?php echo ($list["title"]); ?>"> -->
					<a class="add-sub-cate" title="添加子分类" href="<?php echo U('add?pid='.$list['id']);?>">
						<i class="icon-add"></i>
					</a>
					<span class="help-inline msg"></span>
				</div>
				
			
			</form>
		</dt>
		<?php if(!empty($list['_'])): ?><dd>

				<?php echo R('Othercategory/tree', array($list['_']));?>
			</dd><?php endif; ?>
	</dl><?php endforeach; endif; else: echo "" ;endif; ?>