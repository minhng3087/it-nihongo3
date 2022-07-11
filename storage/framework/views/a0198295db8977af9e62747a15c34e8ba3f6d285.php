<?php $__env->startSection('controller', @$module['name'] ); ?>
<?php $__env->startSection('controller_route', route('brand.index')); ?>
<?php $__env->startSection('action', renderAction(@$module['action'])); ?>
<?php $__env->startSection('content'); ?>
	<div class="content">
		<div class="clearfix"></div>
		<?php echo $__env->make('backend.components.messages-error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       		<form 
		   	action="<?php echo e(updateOrStoreRouteRender(@$module['action'], @$module['module'], @$data)); ?>" 
			method="POST">
			<?php echo csrf_field(); ?>
			<?php if(isUpdate(@$module['action'])): ?>
				<?php echo e(method_field('put')); ?>

			<?php endif; ?>
		    <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#activity" data-toggle="tab" aria-expanded="true">Thương hiệu sản phẩm</a>
                    </li>
                    <li class="">
                    	<a href="#category" data-toggle="tab" aria-expanded="true">Danh mục</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="activity">
                    	<div class="row">
                    		<div class="col-sm-2">
                    			<div class="form-group">
	                				<label for="">Hình ảnh</label>
									<div class="image">
										<div class="image__thumbnail">
			                                <img src="<?php echo e(!empty(@$data['image']) ? @$data['image'] : __IMAGE_DEFAULT__); ?>"
			                                     data-init="<?php echo e(__IMAGE_DEFAULT__); ?>">
			                                <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
			                                    <i class="fa fa-times"></i></a>
			                                <input type="hidden" value="<?php echo e(old('image', @$data['image'])); ?>" name="image"/>
			                                <div class="image__button" onclick="fileSelect(this)">
			                                	<i class="fa fa-upload"></i>
			                                    Upload
			                                </div>
			                            </div>
					                </div>
	                			</div>
                    		</div>
                    		<div class="col-sm-2">
                    			<div class="form-group">
	                				<label for="">Banner</label>
									<div class="image">
										<div class="image__thumbnail">
			                                <img src="<?php echo e(!empty(@$data['banner']) ? @$data['banner'] : __IMAGE_DEFAULT__); ?>"
			                                     data-init="<?php echo e(__IMAGE_DEFAULT__); ?>">
			                                <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
			                                    <i class="fa fa-times"></i></a>
			                                <input type="hidden" value="<?php echo e(old('banner', @$data['banner'])); ?>" name="banner"/>
			                                <div class="image__button" onclick="fileSelect(this)">
			                                	<i class="fa fa-upload"></i>
			                                    Upload
			                                </div>
			                            </div>
					                </div>
	                			</div>
                    		</div>

                    		

                    		<div class="col-sm-8">
                    			<div class="form-group">
									<label for="">Tên thương hiệu</label>
									<input type="text" class="form-control" name="name" id="name" value="<?php echo e(old('name', @$data['name'] )); ?>">
								</div>
								<div class="form-group">
									<label for="">Đường dẫn tĩnh</label>
									<input type="text" class="form-control" name="slug" id="slug" value="<?php echo e(old('slug', @$data['slug'] )); ?>">
								</div>

								<div class="form-group">
									<?php if(isUpdate(@$module['action'])){
										$order = old('order', @$data->order);
									}else{
										$order = old('order', \App\Models\Categories::where('type', 'brand_category')->count() + 1);
									} ?>
									<label for="">Số thứ tự</label>
									<input type="number" class="form-control" name="order" value="<?php echo e(@$order); ?>">
								</div>
                    		</div>
                    	</div>
						
                    </div>

					<div class="tab-pane" id="category">
						<div class="row">
		            		<div class="col-sm-12">
		            			<label for="">Chọn danh mục hiển thị trang chi tiết thương hiệu</label>
		            			<?php 
			                        $category_list = [];
			                        if(!empty($data->meta_orthers)){
			                        	$content = json_decode( $data->meta_orthers );
			                        	$category_list = $content->list_category;
			                        }
			                        $categories = \App\Models\Categories::where('type','product_category')->get();
				                ?>
			                    <?php if(!empty($categories)): ?>
			                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                            <?php if($item->parent_id == 0): ?>
			                                <label class="custom-checkbox">
			                                    <input type="checkbox" class="category" name="meta_orthers[list_category][]" value="<?php echo e($item->id); ?>" <?php echo e(in_array( $item->id, $category_list ) ? 'checked' : NULL); ?>> <?php echo e($item->name); ?>

			                                 </label>
			                                 <?php checkBoxCategoryName( $categories, $item->id, $item, $category_list, 'meta_orthers[list_category][]' ) ?>
			                            <?php endif; ?>
			                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			                    <?php endif; ?>
		            		</div>
		            	</div>
					</div>

                    <button type="submit" class="btn btn-primary">Lưu lại</button>
                </div>
            </div>
		</form>
			
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gdigital\resources\views/backend/brand/create-edit.blade.php ENDPATH**/ ?>