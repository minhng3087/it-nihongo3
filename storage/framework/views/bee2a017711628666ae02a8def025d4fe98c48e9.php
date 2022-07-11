<div class="repeater" id="repeater">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
            	<th style="width: 30px;">STT</th>
            	<th>Tiêu đề</th>
            	<th>Thương hiệu</th>
            	<th style="width: 30px;"></th>
            </tr>
    	</thead>
        <tbody id="sortable">
			<?php if(!empty($content->filter)): ?>
                <?php $__currentLoopData = $content->filter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $index = $loop->index +1  ?>
                    <?php echo $__env->make('backend.repeater.row-filter-brand', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="text-right">
        <button class="btn btn-primary" onclick="repeater(event,this,'<?php echo e(route('get.layout')); ?>','.index', 'filter-brand')">Thêm</button>
    </div>
</div><?php /**PATH C:\xampp\htdocs\gdigital\resources\views/backend/filter/layout-type/brand.blade.php ENDPATH**/ ?>