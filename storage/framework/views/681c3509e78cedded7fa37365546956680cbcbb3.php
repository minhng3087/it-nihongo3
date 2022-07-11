<?php if(count($filters)): ?>
    <?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $indexLoop = $loop->index + 2; ?>
        <?php if(!empty($filter->content)) { 
            $content = json_decode($filter->content);
        } ?>
        <div class="box-bar">
            <div class="title-bar"><?php echo e($filter->name); ?></div>
            <div class="list-cate">
                <ul >
                <?php if(!empty($content->filter)): ?>
                    <?php $__currentLoopData = $content->filter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($filter->type == 'price'): ?>
                            <li>
                                <input type="radio" id="filter-<?php echo e($key); ?>" name="filter-<?php echo e($indexLoop); ?>" value="<?php echo e($value->min_value.'-'.$value->max_value); ?>" data-type="<?php echo e($filter->type); ?>"
						 		class="filter-check-box <?php echo e($filter->type); ?>" data-id="input-<?php echo e($filter->type); ?>" data-name="<?php echo e($value->name); ?>" >
                                <label for="filter-<?php echo e($key); ?>"><?php echo e($value->name); ?> </label>
                            </li>
                        <?php elseif($filter->type == 'brand'): ?>
                            <?php $brand = \App\Models\Categories::find($value->brand_id); ?>
                            <li>
                                <input type="checkbox" id="filter-<?php echo e($key); ?>" name="filter-<?php echo e($indexLoop); ?>" value="<?php echo e($value->brand_id); ?>" data-type="<?php echo e($filter->type); ?>"
							 	class="filter-check-box <?php echo e($filter->type); ?>" data-id="input-<?php echo e($filter->type); ?>" data-name="<?php echo e($value->name); ?>" >
                                <label for="filter-<?php echo e($key); ?>"><?php echo e($value->name); ?></label>
                            </li>
                        <?php else: ?>
                            <li>
                                <input type="checkbox" id="filter-<?php echo e($key); ?>" name="filter-<?php echo e($indexLoop); ?>" value="<?php echo e(@$value->value); ?>" data-type="<?php echo e($filter->type); ?>"
							 	class="filter-check-box <?php echo e($filter->type); ?>" data-id="input-<?php echo e($filter->type); ?>" data-name="<?php echo e(@$value->name); ?>">
                                <label for="filter-<?php echo e($key); ?>"><?php echo e($value->name); ?> </label>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                
                </ul>
                <input type="hidden" id="input-<?php echo e($filter->type); ?>" value="" class="input-param" data-type="<?php echo e($filter->type); ?>">
            </div>
        </div>
    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>

<?php /**PATH /var/www/html/gdigital/resources/views/frontend/components/filters/filter-product.blade.php ENDPATH**/ ?>