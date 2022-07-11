<?php $__env->startSection('controller', $module['name']); ?>
<?php $__env->startSection('controller_route', route('posts.index', ['type' => 'blog']) ); ?>
<?php $__env->startSection('action',renderAction(@$module['action'])); ?>
<?php $__env->startSection('content'); ?>
	<section class="content">
		<?php echo $__env->make('backend.components.messages-error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<div class="clearfix"></div>
		<form action="<?php echo e(updateOrStoreRouteRender( @$module['action'], $module['module'], @$data)); ?>" method="POST">
			<?php echo csrf_field(); ?>
			<?php if(isUpdate(@$module['action'])): ?>
				<?php echo method_field('PUT'); ?>
		    <?php endif; ?>
			<input type="hidden" value="blog" name="type">
			<div class="row">
				<div class="col-sm-9">
		            <div class="nav-tabs-custom">
		                <ul class="nav nav-tabs">
		                    <li class="active">
		                        <a href="#activity" data-toggle="tab" aria-expanded="true">Bài viết</a>
		                    </li>
		                </ul>
		                <div class="tab-content">
		                    <div class="tab-pane active" id="activity">
		                        <div class="row">
		                            <div class="col-sm-12">
		                                <div class="form-group">
		                                    <label>Tiêu đề</label>
		                                    <input type="text" class="form-control" name="name" id="name" value="<?php echo old('name', @$data->name); ?>" required="">
		                                </div>
                                        <?php if(isUpdate(@$module['action'])): ?>
                                            <div class="form-group" id="edit-slug-box">
                                                <?php echo $__env->make('backend.posts.permalink', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </div>
                                        <?php else: ?>
		                                <div class="form-group">
		                                    <label>Đường dẫn tĩnh</label>
		                                    <input type="text" class="form-control" name="slug" id="slug" value="<?php echo old('slug', @$data->slug); ?>">
		                                </div>
                                        <?php endif; ?>
		                                
		                                <div class="form-group">
		                                    <label>Mô tả ngắn</label>
		                                    <textarea class="form-control" rows="5" name="desc"><?php echo old('desc', @$data->desc); ?></textarea>
		                                </div>
		                                
		                                <div class="form-group">
		                                    <label>Nội dung</label>
		                                    <textarea class="content" name="content"><?php echo old('content', @$data->content); ?></textarea>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
				</div>
				<div class="col-sm-3">
					<div class="box box-success">
		                <div class="box-header with-border">
		                    <h3 class="box-title">Đăng</h3>
		                </div>
		                <div class="box-body">
		                    <div class="form-group">
		                        <label for="">Trạng thái</label>
		                        <select name="status" class="form-control">
		                        	<option value="1" <?php echo e(@$data->status == 1 ? 'selected' : null); ?>>Hiển thị</option>
                                    <option value="2" <?php echo e(@$data->status == 2 ? 'selected' : null); ?>>Bản nháp</option>
                                    <option value="3" <?php echo e(@$data->status == 3 ? 'selected' : null); ?>>Chờ duyệt</option>
		                        </select>
		                    </div>
		                    <div class="form-group">
                                <?php if(isUpdate(@$module['action'])): ?>
                                    <label for="">Thời gian hiển thị: <?php echo e(@$data->published_at->format('d/m/Y')); ?></label>
                                    <label for="">Thời gian tạo bài: <?php echo e(@$data->created_at->format('d/m/Y')); ?></label>
                                <?php else: ?>
		                            <label for="">Thời gian đăng bài</label>
                                <?php endif; ?>
		                        <label class="custom-checkbox" style="font-weight: initial;">
		                            <input type="radio" name="time_published" value="1" checked=""> Thời gian tạo bài
		                        </label>
		                        <label class="custom-checkbox" style="font-weight: initial;">
		                            <input type="radio" name="time_published" value="2"> Chọn thời gian
		                        </label>
		                    </div>
		                    <div class="row time_published_value" style="display: none;">
	                    		<div class="col-sm-4" style="padding-right: 0px;">
	                    			<div class="form-group">
										<label for="">Ngày</label>
										<select name="time[date]" class="form-control">
											<?php for($i = 1; $i < 32; $i++): ?>
												<option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
											<?php endfor; ?>
										</select>
				                    </div>
	                    		</div>
	                    		<div class="col-sm-4" >
	                    			<div class="form-group">
										<label for="">Tháng</label>
										<select name="time[month]" class="form-control">
											<?php for($i = 1; $i < 13; $i++): ?>
												<option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
											<?php endfor; ?>
										</select>
				                    </div>
	                    		</div>
	                    		<div class="col-sm-4" style="padding-left: 0px;">
	                    			<div class="form-group">
										<label for="">Năm</label>
										<input type="text" name="time[year]" min="1" value="2020" class="form-control">
				                    </div>
	                    		</div>
	                    	</div>

	                    	<label class="custom-checkbox">
                                <input type="checkbox" name="hot" value="1" <?php echo e(@$data->hot == 1 ? 'checked' : null); ?>> Nổi bật
                            </label>
                            
		                    <div class="form-group text-right">
		                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
		                    </div>
		                </div>
		            </div>
		            <div class="box box-success category-box">
                        <?php if(isUpdate(@$module['action'])): ?>
                            <?php
                                $category_list = [];
                                    if(!empty(@$data->category)){
                                $category_list = @$data->category->pluck('id')->toArray();
                                }
                            ?>
                        <?php endif; ?>
		                <div class="box-header with-border">
		                    <h3 class="box-title">Danh mục bài viết </h3>
		                </div>
		                <div class="box-body checkboxlist">
		                    <?php if(!empty($categories)): ?>
		                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                            <?php if($item->parent_id == 0): ?>
		                                <label class="custom-checkbox">
		                                    <input type="checkbox" class="category" name="category[]" value="<?php echo e($item->id); ?>" 
                                                <?php if(isUpdate(@$module['action'])): ?>
                                                <?php echo e(in_array( $item->id, $category_list ) ? 'checked' : null); ?>

                                                <?php endif; ?>
                                            > <?php echo e($item->name); ?>

		                                 </label>
		                            <?php endif; ?>
		                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		                    <?php endif; ?>
		                </div>
		            </div>
		            <div class="box box-success">
		                <div class="box-header with-border">
		                    <h3 class="box-title">Ảnh đại diện</h3>
		                </div>
		                <div class="box-body">
		                    <div class="form-group" style="text-align: center;">
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
			</div>
		</form>
	</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
	<script>
		jQuery(document).ready(function($) {
			$('#btn-ok').click(function(event) {
		        var slug_new = $('#new-post-slug').val();
		        var name = $('#name').val();
		        $.ajax({
		        	url: '<?php echo e(route('posts.get-slug')); ?>',
		        	type: 'GET',
		        	data: {
		        		id: $('#idPost').val(),
		        		slug : slug_new.length > 0 ? slug_new : name,
		        	},
		        })
		        .done(function(data) {
		        	$('#change_slug').show();
			        $('#btn-ok').hide();
			        $('.cancel.button-link').hide();
			        $('#current-slug').val(data);
		        	cancelInput(data);
		        })
		    });
		});	
	</script>
	
	<script>
		jQuery(document).ready(function($) {
			$('input[name="time_published"]').click(function(){
			   	if($(this).val() == 2){
			   		$('.time_published_value').show('slow/400/fast');
			   	}else{
			   		$('.time_published_value').hide('slow/400/fast');
			   	}
			});
		});
	</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gdigital\resources\views/backend/posts/create-edit.blade.php ENDPATH**/ ?>