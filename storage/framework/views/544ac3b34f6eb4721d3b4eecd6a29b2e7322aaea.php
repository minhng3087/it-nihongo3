<?php if(count($data)): ?>
	<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="item">
            <div class="avarta">
            	<a title="<?php echo e($item->name); ?>" href="<?php echo e(route('home.single.product', $item->slug)); ?>">
            		<img src="<?php echo e($item->image); ?>" class="img-fluid lazyload" alt="<?php echo e($item->name); ?>">
            	</a>
            </div>
            <div class="info">
                <h3><a title="<?php echo e($item->name); ?>" href="<?php echo e(route('home.single.product', $item->slug)); ?>"><?php echo e($item->name); ?></a></h3>
                <div class="price">
                    
                    <?php if($item->CheckPricePriority()): ?>
                        <span><?php echo e(number_format($item->price_priority,0, '.', '.')); ?>đ</span>
                        <del><?php echo e(number_format($item->regular_price,0, '.', '.')); ?>đ</del>
                    <?php else: ?>
                        <?php if(!is_null($item->sale_price)): ?>
                            <span><?php echo e(number_format($item->sale_price,0, '.', '.')); ?>đ</span>
                            <del><?php echo e(number_format($item->regular_price,0, '.', '.')); ?>đ</del>
                        <?php else: ?>
                            <?php if($item->regular_price != 0): ?>
                                <span><?php echo e(number_format($item->regular_price,0, '.', '.')); ?>đ</span>
                            <?php else: ?>
                                <span>Liên hệ</span>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\gdigital\resources\views/frontend/components/loop-search.blade.php ENDPATH**/ ?>