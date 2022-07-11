
<div class="modal-body">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <div class="preview">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="slide-thumbs">
                    <div class="avarta" style="border: 1px solid #ddd;"><img class="" src="<?php echo e(@$product->image); ?>" class="img-fluid" width="100%" alt="<?php echo e(@$product->name); ?>"></div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="info-prev">
                    <div class="cate">
                        <h1><?php echo e(@$product->name); ?> </h1>
                        <div class="vote">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>	
                        <div class="price"><?php echo e(number_format($product->regular_price,0, '.', '.')); ?>đ</div>
                        <div class="desc">
                            <?php echo e(@$product->sort_desc); ?>

                            <?php if(count($product->ProductGift)): ?>
                                <?php $__currentLoopData = $product->ProductGift; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $indexParent = $loop->index; ?>
                                    <?php if($gift->type == 'options'): ?>
                                        <li><?php echo $gift->desc; ?></li>
                                        <ul>
                                            <?php $options_gift = json_decode( $gift->value );?>
                                            <?php if(!empty($options_gift->list)): ?>
                                                <?php $__currentLoopData = $options_gift->list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <input type="radio" id="sale-<?php echo e($loop->index + 1); ?>-<?php echo e($indexParent); ?>" name="radiosale[<?php echo e($indexParent); ?>]" class="apply-gift" value="<?php echo e($value->value); ?> " data-value="<?php echo e($value->value); ?>">
                                                        <label for="sale-<?php echo e($loop->index + 1); ?>-<?php echo e($indexParent); ?>"><?php echo e($value->title); ?></label>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </ul>
                                    <?php else: ?>
                                        <li><?php echo $gift->desc; ?></li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="quantity-add">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <div class="quantity">
                                        <span class="mont">Số lượng:</span>
                                        <div class="number-spinner">
                                            <input type="text" class="pl-ns-value" value="10" maxlength="5">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="add-cart"><a href="">Thêm vào giỏ hàng</a></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\m\resources\views/frontend/components/modal-product.blade.php ENDPATH**/ ?>