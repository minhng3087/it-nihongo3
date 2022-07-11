<?php $__env->startSection('controller', 'Danh mục tin tức' ); ?>
<?php $__env->startSection('controller_route', route('categories-post.index')); ?>
<?php $__env->startSection('action', 'Danh sách'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="clearfix"></div>
        <div class="row">
        	<div class="col-sm-5">
	        	<form action="<?php echo updateOrStoreRouteRender( @$module['action'], $module['module'], @$data); ?>" method="POST">
	        		<?php echo csrf_field(); ?>
					<?php if(isUpdate(@$module['action'])): ?>
				        <?php echo e(method_field('put')); ?>

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
									<input type="text" class="form-control" name="name" id="name" value="<?php echo e(old('name', @$data->name)); ?>">
								</div>
								<div class="form-group">
									<label for="">Đường dẫn tĩnh</label>
									<input type="text" class="form-control" name="slug" id="slug" value="<?php echo e(old('slug', @$data->slug)); ?>">
								</div>
		                    </div>
		                    <div class="tab-pane" id="setting">
		                    	<div class="row">
		                    		<div class="col-sm-12">
		                    			<div class="form-group">
											<label for="">Hình ảnh</label>
											<div class="image">
												<div class="image__thumbnail">
													<img src="<?php echo e(!empty(@$data->image) ? @$data->image : __IMAGE_DEFAULT__); ?>"
														data-init="<?php echo e(__IMAGE_DEFAULT__); ?>">
													<a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
														<i class="fa fa-times"></i></a>
													<input type="hidden" value="<?php echo e(old('image', @$data->image)); ?>" name="image"/>
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
	    </div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gdigital\resources\views/backend/categories-post/edit.blade.php ENDPATH**/ ?>