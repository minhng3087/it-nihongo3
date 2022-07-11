
<?php if(Cart::content()): ?>
    <div class="select-items">
        <table>
            <tbody>
                <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="si-pic"><img src="<?php echo e($item->options->image); ?>" alt="<?php echo e($item->name); ?>"></td>
                        <td class="si-text">
                            <div class="product-selected">
                                <p><?php echo e(number_format($item->price, 0, '.', '.')); ?>đ x <?php echo e($item->qty); ?></p>
                                <h6><?php echo e($item->name); ?></h6>
                            </div>
                        </td>
                        <td class="si-close">
                            <i class="ti-close" data-id="<?php echo e($item->rowId); ?>" value="<?php echo e($item->qty); ?>"></i>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="select-total">
        <span>TỔNG GIÁ</span>
        <h5><?php echo e(number_format(Cart::total(), 0, '.', '.')); ?>đ</h5>
    </div>
    <div class="select-button">
        <a href="<?php echo e(route('home.cart')); ?>" class="primary-btn view-card">XEM GIỎ HÀNG</a>
        <a href="<?php echo e(route('home.check-out')); ?>" class="primary-btn checkout-btn">THANH TOÁN</a>
    </div>
<?php else: ?>
    <h6>Giỏ hàng trống</h6>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\gdigital\resources\views/frontend/pages/part-header/products-cart.blade.php ENDPATH**/ ?>