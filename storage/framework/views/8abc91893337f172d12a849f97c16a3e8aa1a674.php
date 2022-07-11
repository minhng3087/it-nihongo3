 
<?php $__env->startSection('controller','Bộ lọc theo danh mục'); ?>
<?php $__env->startSection('controller_route', route('list-category-filter')); ?>
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
			              	<th width="30px">STT</th>
			              	<th>Tên danh mục</th>
			              	<th width="150px">Thao tác</th>
			          	</tr>
			        </thead>
		          	<tbody>
		          		<tr>
	              			<td>1</td>
	              			<td>Trang sản phẩm</td>
	              			<td><a href="<?php echo e(route('filter.index', [ 'category'=> 0 ])); ?>" class="btn btn-success btn-sm">Bộ lọc</a></td>
	              		</tr>
		              	<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		              		<tr>
		              			<td><?php echo e($loop->index + 2); ?></td>
		              			<td><?php echo e($item->name); ?></td>
		              			<td><a href="<?php echo e(route('filter.index', [ 'category'=>$item->id ])); ?>" class="btn btn-success btn-sm">Bộ lọc</a></td>
		              		</tr>
		              	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		          	</tbody>
		      	</table>
           	</div>   
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/gdigital/resources/views/backend/filter/list-category.blade.php ENDPATH**/ ?>