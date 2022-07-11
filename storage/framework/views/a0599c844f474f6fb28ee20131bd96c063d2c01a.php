<div class="box-comment-custom box-comment" style="padding-left:25px;">
    <div class="comment-text">
        <span class="username"> <?php echo e($item->type != 1 ? @$item->Customers->name.' - '.@$item->Customers->email.' - '.@$item->Customers->phone : 'Administrator'); ?> 
        	<span class="text-muted pull-right"><?php echo e($item->created_at->format('d/m/yy')); ?></span>
        	<?php if($item->status != 1): ?>
        		<a href="javascript:;" class="activeq" data-id="<?php echo e($item->id); ?>'"><label class="label label-danger">Chưa duyệt</label></a>
        	<?php endif; ?>
        </span>
        <?php if(!empty($item->image)): ?>
			<?php $list_images = json_decode( $item->image ); ?>
			<div class="row-upload">
				<?php $__currentLoopData = $list_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-upload">
						<img src="<?php echo e(url('uploads/comments/'.$value )); ?>" class="image_comment">
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		<?php endif; ?>
       	<p><?php echo $item->content; ?></p>
       	<div style="margin-top: 10px">
       		<button type="button" class="btn btn-default btn-xs btn-reply" data-id="<?php echo e($item->id); ?>">
       			<i class="fa fa-share"></i> Trả lời</button>
       		<button type="button" class="btn btn-default btn-xs btn-destroy" data-href="<?php echo e(route('comments.destroy', $item->id)); ?>" data-toggle="modal" data-target="#confim"><i class="fa fa-trash"></i> Xóa bỏ</button>
       	</div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\m\resources\views/backend/comments/row-comment.blade.php ENDPATH**/ ?>