<?php $__env->startSection('controller', @$module['name'] ); ?>
<?php $__env->startSection('controller_route', route('categories-post.index')); ?>
<?php $__env->startSection('action', 'Danh sách'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="clearfix"></div>
		<?php echo $__env->make('backend.components.messages-error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
        	<div class="col-sm-5">
	        	<form action="<?php echo updateOrStoreRouteRender( @$module['action'], $module['module'], @$data); ?>" method="POST">
	        		<?php echo csrf_field(); ?>
					<?php if(isUpdate(@$module['action'])): ?>
				        <?php echo method_field('PUT'); ?>
				    <?php endif; ?>
	        		<div class="nav-tabs-custom">
		                <ul class="nav nav-tabs">
		                    <li class="active">
		                        <a href="#activity" data-toggle="tab" aria-expanded="true">Danh mục</a>
		                    </li>
		                </ul>
		                <div class="tab-content">
		                    <div class="tab-pane active" id="activity">
								<div class="form-group">
									<label for="">Tên danh mục</label>
									<input type="text" class="form-control" name="name" id="name" value="<?php echo e(old('name')); ?>">
								</div>
								<div class="form-group">
									<label for="">Đường dẫn tĩnh</label>
									<input type="text" class="form-control" name="slug" id="slug" value="<?php echo e(old('slug')); ?>">
								</div>
		                    </div>
		                    <div class="tab-pane" id="setting">
		                    	<div class="row">
		                    		<div class="col-sm-12">
		                    			<div class="form-group">
		                    				<label for="">Hình ảnh</label>
		                    				 <div class="image">
					                            <div class="image__thumbnail">
					                                <img src="<?php echo e(__IMAGE_DEFAULT__); ?>"
					                                     data-init="<?php echo e(__IMAGE_DEFAULT__); ?>">
					                                <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
					                                    <i class="fa fa-times"></i></a>
					                                <input type="hidden" value="<?php echo e(old('image')); ?>" name="image"/>
					                                <div class="image__button" onclick="fileSelect(this)">
					                                	<i class="fa fa-upload"></i>
					                                    Upload
					                                </div>
					                            </div>
					                        </div>
		                    			</div>
		                    		</div>
		                    	</div>
		                    </div>
		                    <button type="submit" class="btn btn-primary">Lưu lại</button>
		                </div>
		            </div>
	        	</form>
	        </div>
	        <div class="col-sm-7">
	        	<div class="box box-primary">
	                <div class="box-body">
	                    <table id="example1" class="table table-bordered table-striped table-hover">
	                        <thead>
	                            <tr>
	                                <th style="width: 15px"><input type="checkbox" name="chkAll" id="chkAll"></th>
	                                <th style="width: 15px">STT</th>
	                                <th>Tiêu đề</th>
	                                <th>Đường dẫn</th>
	                                <th style="width: 150px">Thao tác</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                                <tr>
	                                    <td><input type="checkbox" name="chkItem[]" value="<?php echo e($item->id); ?>"></td>
	                                    <td><?php echo e($loop->index + 1); ?></td>
	                                    <td><?php echo e($item->name); ?></td>
	                                    <td><?php echo e($item->slug); ?></td>
	                                    <td>
	                                        <a href="<?php echo e(route('categories-post.edit', ['id' => $item->id])); ?>" title="Sửa">
	                                            <i class="fa fa-pencil fa-fw"></i> Sửa
	                                        </a> &nbsp; &nbsp; &nbsp;
	                                        <a href="javascript:;" class="btn-destroy" data-href="<?php echo e(route('categories-post.destroy', $item->id)); ?>"
				                            data-toggle="modal" data-target="#confim">
				                            <i class="fa fa-trash-o fa-fw"></i> Xóa</a>
	                                    </td>
	                                </tr>
	                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	        </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gdigital\resources\views/backend/categories-post/create-list.blade.php ENDPATH**/ ?>