<div class="col-md-2">
	<div class="item">
		<div class="avarta">
			<a href="<?php echo e(route('home.single.product', $item->slug)); ?>"><img src="<?php echo e(@$item->image); ?>" class="img-fluid" alt="<?php echo e(@$item->name); ?>"></a>
		</div>
		<div class="info">
			<h3><a href="<?php echo e(route('home.single.product', $item->slug)); ?>"><?php echo e(@$item->name); ?></a></h3>
			<!-- <div class="vote">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-o"></i>
			</div> -->
				<div class="price"><span><?php echo e(number_format($item->regular_price,0, '.', '.')); ?>đ</span></div>
				<div class="price"><span></span></div>
			<div class="btn-add">
				<a title="Thêm vào giỏ hàng" class="add-cart" data-id="<?php echo e($item->id); ?>">Thêm vào giỏ hàng</a>
			</div>
		</div>
	</div>
</div><?php /**PATH /var/www/html/gdigital/resources/views/frontend/components/product.blade.php ENDPATH**/ ?>