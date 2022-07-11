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
        <?php if($item->sale_price): ?>
            <div class="price"><span><?php echo e(number_format($item->sale_price,0, '.', '.')); ?>đ</span></div>
            <div class="price"><del><span><?php echo e(number_format($item->regular_price,0, '.', '.')); ?>đ</span></del></div>
        <?php else: ?>
             <div class="price"><span><?php echo e(number_format($item->regular_price,0, '.', '.')); ?>đ</span></div>

        <?php endif; ?>

    </div>
</div><?php /**PATH C:\xampp\htdocs\gdigital\resources\views/frontend/components/product-4.blade.php ENDPATH**/ ?>