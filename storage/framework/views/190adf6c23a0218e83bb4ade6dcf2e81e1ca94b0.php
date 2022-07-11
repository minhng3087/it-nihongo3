<div class="item">
		<div class="avarta">
			<a href="<?php echo e(route('home.single.product', $item->slug)); ?>"><img src="<?php echo e(@$item->image); ?>" class="img-fluid" alt="<?php echo e(@$item->name); ?>"></a>
			<div class="abs">
				<ul class="list-inline text-center">
					<li class="list-inline-item"><a href="" class="modal-product" data-id="<?php echo e($item->id); ?>" data-toggle="modal" data-target="#myModal"><img src="<?php echo e(__BASE_URL_FRONTEND__); ?>/images/zoom.png" class="img-fluid" alt=""></a></li>
					<li class="list-inline-item"><a href=""><img src="<?php echo e(__BASE_URL_FRONTEND__); ?>/images/vote.png" class="img-fluid" alt=""></a></li>
				</ul>
			</div>
		</div>
		<div class="info">
			<h3><a href="<?php echo e(route('home.single.product', $item->slug)); ?>"><?php echo e(@$item->name); ?></a></h3>
			<div class="vote">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-o"></i>
			</div>
			<?php if($item->sale_price): ?>
				<div class="price"><span><?php echo e(number_format($item->sale_price,0, '.', '.')); ?>đ</span></div>
				<div class="price"><del><span><?php echo e(number_format($item->regular_price,0, '.', '.')); ?>đ</span></del></div>
			<?php else: ?>
				<div class="price"><span><?php echo e(number_format($item->regular_price,0, '.', '.')); ?>đ</span></div>
				<div class="price"><span></span></div>

			<?php endif; ?>
			<div class="btn-add"><a href="">Thêm vào giỏ hàng</a></div>
		</div>
</div><?php /**PATH /var/www/html/gdigital/resources/views/frontend/components/product-2.blade.php ENDPATH**/ ?>