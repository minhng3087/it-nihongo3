<table id="table-ajax" class="table table-bordered table-striped table-hover">
<thead>
    <tr>
        <th width="10px"><input type="checkbox" name="chkAll" id="chkAll"></th>
        <th width="10px">STT</th>
        <?php $__currentLoopData = $module['table']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <th width="<?php echo e(@$item['with']); ?>"><?php echo e($item['title']); ?></th>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <th width="100px">Thao tác</th>
    </tr>
    </thead>
    <tbody>
        
    </tbody>
</table><?php /**PATH C:\xampp\htdocs\m\resources\views/backend/components/table.blade.php ENDPATH**/ ?>