 
<?php $__env->startSection('controller','Filter'); ?>
<?php $__env->startSection('controller_route', route('list-category-filter')); ?>
<?php $__env->startSection('action','Danh sách'); ?>
<?php $__env->startSection('content'); ?>
	<div class="content">
		<div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
           		<?php echo $__env->make('backend.components.messages-error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
           		<div class="btnAdd">
           			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-plus"></i> Thêm mới bộ lọc
					</button>
					<a href="<?php echo e(route('sort-category-filter', ['category'=> request('category')])); ?>" class="btn btn-primary" style="display: none;">Sắp xếp thứ tự</a>
           		</div>
           		<table id="example1" class="table table-bordered table-striped table-hover">
			        <thead>
			          	<tr>
			              	<th width="30px">STT</th>
			              	<th>Tên bộ lọc</th>
			              	<th>Loại</th>
			              	<th width="230px">Thao tác</th>
			          	</tr>
			        </thead>
		          	<tbody>
		              	<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		              		<tr>
		              			<td><?php echo e($loop->index + 1); ?></td>
		              			<td><?php echo e($item->name); ?></td>
		              			<td>
		              				<?php if($item->type == 'price'): ?>
		              					<label class="label label-success">Giá</label>
		              				<?php elseif($item->type == 'brand'): ?>
		              					<label class="label label-success">Thương hiệu</label>
		              				<?php else: ?>
		              					<?php 
		              						$idType = explode('-', $item->type);
		              						$attributeTypesName = \App\Models\ProductAttributeTypes::find($idType[1]);
		              					?>
		              					<?php if(!empty($attributeTypesName)): ?>
		              						<label class="label label-success"><?php echo e($attributeTypesName->name); ?></label>
		              					<?php endif; ?>
		              				<?php endif; ?>
		              			</td>
		              			<td>
		              				<a href="<?php echo e(route('filter.edit', [ 'id' => $item->id ])); ?>" class="btn btn-success btn-sm">Xây dựng bộ lọc</a>
		              				 &nbsp; &nbsp; &nbsp;
                                      <a href="javascript:void(0);" class="btn-destroy" 
                                      data-href="<?php echo e(route( 'filter.destroy',  $item->id )); ?>"
                                      data-toggle="modal" data-target="#confim">
                                      <i class="fa fa-trash-o fa-fw"></i> Xóa
                                    </a>
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
	        	<form action="<?php echo e(route('filter.store')); ?>" method="POST">
	        		<?php echo csrf_field(); ?>
		            <div class="modal-header">
		                <h5 class="modal-title" id="exampleModalLabel">Thêm mới bộ lọc</h5>
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                    <span aria-hidden="true">&times;</span>
		                </button>
		            </div>
		            <div class="modal-body">
		                <div class="form-group">
		                	<label for="">Tên bộ lọc</label>
		                	<input type="text" class="form-control" name="name" required="">
		                </div>
		                <input type="hidden" name="category_id" value="<?php echo e(request()->get('category')); ?>">
						<?php $attributeTypes = \App\Models\ProductAttributeTypes::get(); ?>
		                <div class="form-group">
		                	<label for="">Loại bộ lọc</label>
		                	<select name="type" class="form-control">
		                		<option value="brand">Thương hiệu</option>
		                		<option value="price">Giá</option>
								<?php if(count($attributeTypes)): ?>
									<?php $__currentLoopData = $attributeTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="attribute-<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
		                	</select>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		                <button type="submit" class="btn btn-primary">Lưu lại</button>
		            </div>
	            </form>
	        </div>
	    </div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gdigital\resources\views/backend/filter/list.blade.php ENDPATH**/ ?>