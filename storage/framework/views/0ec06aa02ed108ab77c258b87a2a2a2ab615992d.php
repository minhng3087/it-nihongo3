<?php $__env->startSection('controller','Filter'); ?>
<?php $__env->startSection('controller_route', route('list-category-filter')); ?>
<?php $__env->startSection('action', 'Cập nhật'); ?>
<?php $__env->startSection('content'); ?>
	<div class="content">
		<div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
            	<form action="<?php echo e(route( 'filter.update', $data->id )); ?>" method="POST">
            		<?php echo method_field('PUT'); ?>
            		<?php echo csrf_field(); ?>
			       	<?php echo $__env->make('backend.components.messages-error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			       	<div class="row">
			       		<div class="col-sm-12">
			       			<div class="form-group">
				       			<label for="">Tiêu đề bộ lọc</label>
				       			<input type="text" name="name" value="<?php echo e($data->name); ?>" class="form-control">
				       		</div>

				       		<div class="form-group">
				       			<label for="">Loại bộ lọc: </label>
				       			<label for="">
					       			<?php if($data->type == 'price'): ?>
		              					Giá
		              				<?php elseif($data->type == 'brand'): ?>
		              					Thương hiệu
		              				<?php else: ?>
		              					<?php 
		              						$idType = explode('-', $data->type);
		              						$attributeTypesName = \App\Models\ProductAttributeTypes::find($idType[1]);
		              					?>
		              					<?php if(!empty($attributeTypesName)): ?>
		              						<?php echo e($attributeTypesName->name); ?>

		              					<?php endif; ?>
		              				<?php endif; ?>
	              				</label>
				       		</div>
				       		<?php if(!empty($data->content)){
				       			$content = json_decode( $data->content );
				       		} ?>
							
							<?php if($data->type == 'price'): ?>
								<?php echo $__env->make('backend.filter.layout-type.price', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							<?php elseif($data->type == 'brand'): ?>
								<?php echo $__env->make('backend.filter.layout-type.brand', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							<?php else: ?>
								<?php echo $__env->make('backend.filter.layout-type.attribute', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							<?php endif; ?>
				           
				           <button class="btn-primary btn">Lưu lại</button>
			       		</div>
			       	</div>
			    </form>
		    </div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gdigital\resources\views/backend/filter/edit.blade.php ENDPATH**/ ?>