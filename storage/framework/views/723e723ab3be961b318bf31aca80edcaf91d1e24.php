<div class="item">
    <div class="avarta"><a href="<?php echo e(route('home.single.product', $item->slug)); ?>"><img src="<?php echo e($item->image); ?>" class="img-fluid" width="100%" alt=""></a></div>
    <div class="info">
        <h4><a href="<?php echo e(route('home.single.product', $item->slug)); ?>"><?php echo e($item->name); ?></a></h4>
        <div class="vote">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <div class="price"><span><?php echo e(number_format($item->regular_price,0, '.', '.')); ?>đ</span></div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\m\resources\views/frontend/components/product-4.blade.php ENDPATH**/ ?>