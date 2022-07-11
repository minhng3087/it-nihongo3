<?php if($paginator->hasPages()): ?>
    <ul class="list-inline text-center">
        
        <?php if($paginator->onFirstPage()): ?>
            <li class="disabled list-inline-item"><i class="fa fa-angle-left"></i></li>
        <?php else: ?>
            <li class="list-inline-item"><a href="<?php echo e($paginator->previousPageUrl()); ?>"><i class="fa fa-angle-left"></i></a></li>	
        <?php endif; ?>
        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if(is_string($element)): ?>
                <li class="disabled list-inline-item"><a href=""><i class="fa fa-angle-left"></i><?php echo e($element); ?></a></li>
            <?php endif; ?>
            
            <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                        <li class="active list-inline-item"><a class="active"><?php echo e($page); ?></a></li>
                    <?php else: ?>
                        <li class="list-inline-item"><a href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <?php if($paginator->hasMorePages()): ?>
            <li class="list-inline-item"><a href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next"><i class="fa fa-angle-right"></i></a></li>
        <?php else: ?>
            <li class="disabled list-inline-item"><i class="fa fa-angle-right"></i></li>
        <?php endif; ?>
    </ul>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\m\resources\views/vendor/pagination/custom.blade.php ENDPATH**/ ?>