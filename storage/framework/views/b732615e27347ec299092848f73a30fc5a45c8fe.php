 
<?php $__env->startSection('controller','Menu'); ?>
<?php $__env->startSection('controller_route', route('setting.menu')); ?>
<?php $__env->startSection('action','Danh sách'); ?>
<?php $__env->startSection('content'); ?>
	<div class="content">
		<div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
               	<?php echo $__env->make('backend.components.messages-error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<table id="example1" class="table table-bordered table-striped table-hover">
	            <thead>
		            <tr>
		                <th>STT</th>
		                <th>Tiêu đề</th>
		                <th>Vị trí</th>
		                <th>Thao tác</th>
		            </tr>
	            </thead>
	            <tbody>
	                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                	<?php if($item->id != 3): ?>
	                    <tr>
	                        <td><?php echo e($loop->index +1); ?></td>
	                        <td><?php echo e($item->title); ?></td>
	                        <td><?php echo e($item->position); ?></td>
	                        <td>
	                            <a href="<?php echo e(route('backend.config.menu.edit',$item->id )); ?>">
	                                <i class="fa fa-pencil fa-fw"></i> Sửa Menu
	                            </a>
	                        </td>
	                    </tr>
	                    <?php endif; ?>
	                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	            </tbody>
	        </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/gdigital/resources/views/backend/menu/list-group.blade.php ENDPATH**/ ?>