<?php $__env->startSection('controller', @$module['name'] ); ?>
<?php $__env->startSection('controller_route', route(@$module['module'].'.index')); ?>
<?php $__env->startSection('action', 'Danh sách'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
				<?php echo $__env->make('backend.components.messages-error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="btnAdd">
		          	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
					  	Thêm mới loại thuộc tính
					</button>
		      	</div>
		      	<table id="example1" class="table table-bordered table-striped table-hover">
			        <thead>
			          	<tr>
			              	<th><input type="checkbox" name="chkAll" id="chkAll"></th>
			              	<th>STT</th>
			              	<th>Loại thuộc tính</th>
			              	<th>Loại input</th>
			              	<th width="150px">Thao tác</th>
			          	</tr>
			        </thead>
		          	<tbody>
		              	<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		              		<tr>
		              			<td><input type="checkbox" name="chkItem[]" value="<?php echo e($item->id); ?>"></td>
		              			<td><?php echo e($loop->index + 1); ?></td>
		              			<td><?php echo e($item->name); ?></td>
		              			<td>
		              				<?php if($item->type == 'color'): ?>
		              					Color
		              				<?php else: ?>
										Tùy chọn
		              				<?php endif; ?>
		              			</td>
		              			
		              			<td>
		              				<div>
				                        <a href="<?php echo e(route('product-attributes.edit', ['id'=> $item->id ])); ?>" title="Sửa">
				                            <i class="fa fa-pencil fa-fw"></i> Sửa
				                        </a> &nbsp; &nbsp; &nbsp;
				                          <a href="javascript:void(0);" class="btn-destroy" 
				                          data-href="<?php echo e(route( 'product-attributes.destroy',  $item->id )); ?>"
				                          data-toggle="modal" data-target="#confim">
				                          <i class="fa fa-trash-o fa-fw"></i> Xóa
				                          </a>
				                    </div>
		              			</td>
		              		</tr>
		              	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		          	</tbody>
		      	</table>
            </div>
        </div>
    </div>

    <!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	        	<form action="<?php echo e(route('product-attributes.store')); ?>" method="POST">
	        		<?php echo csrf_field(); ?>
	        		
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Thêm mới loại thuộc tính</h5>
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                    <span aria-hidden="true">&times;</span>
		                </button>
		            </div>
		            <div class="modal-body">
		               	<div class="form-group">
		               		<label for="">Tên loại thuộc tính</label>
		               		<input type="text" name="name" class="form-control" required>
		               	</div>
		               	<div class="form-group">
		               		<label for="">Loại thuộc tính</label>
							<select name="type" class="form-control">
								<option value="input">Options</option>
							</select>
		               	</div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		                <button type="submit" class="btn btn-primary">Thêm mới</button>
		            </div>
		        </form>
	        </div>
	    </div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gdigital\resources\views/backend/product-attributes/list.blade.php ENDPATH**/ ?>