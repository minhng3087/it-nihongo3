<?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="item">
        <div class="avarta">
            <a title="<?php echo e($item->name); ?>" href="<?php echo e(route('home.single.product', $item->options->slug)); ?>">
                <img src="<?php echo e($item->options->image); ?>" class="img-fluid" alt="<?php echo e($item->name); ?>">
            </a>
        </div>
        <div class="info">
            <h3>
                <a title="<?php echo e($item->name); ?>" href="<?php echo e(route('home.single.product', $item->options->slug)); ?>" class="text-left">
                    <?php echo e($item->name); ?>

                </a>
            </h3>
            <div class="quantt"><?php echo e($item->qty); ?> x <?php echo e(number_format($item->price, 0, '.', '.')); ?>đ</div>
        </div>
        <div class="btn-remove"><a class="remove-cart" data-id="<?php echo e($item->id); ?>"><i class="fa fa-times"></i></a></div>
   </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<div class="total-cart">
    <span>TỔNG GIÁ</span>
    <div class="price"><?php echo e(Cart::total()); ?>đ</div>
</div>
<div class="view-cart text-center pt-20"><a href="<?php echo e(route('home.cart')); ?>">XEM GIỎ HÀNG</a></div><?php /**PATH C:\xampp\htdocs\m\resources\views/frontend/pages/part-header/products-cart.blade.php ENDPATH**/ ?>