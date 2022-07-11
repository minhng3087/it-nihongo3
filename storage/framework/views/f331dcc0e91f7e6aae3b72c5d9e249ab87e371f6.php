<?php if(count($data)): ?>
	<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="<?php echo e(!empty($class) ? $class : 'col-lg-3 col-sm-3 col-6'); ?>">
			<?php $__env->startComponent('frontend.components.product-2', ['item'=> $item]); ?>
			<?php echo $__env->renderComponent(); ?>
		</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<div class="col-sm-12">
	<div class="alert alert-primary" role="alert">
		Không tìm thấy sản phẩm phù hợp.
	</div>
</div>
<?php endif; ?><?php /**PATH /var/www/html/gdigital/resources/views/frontend/components/products/loop-products.blade.php ENDPATH**/ ?>