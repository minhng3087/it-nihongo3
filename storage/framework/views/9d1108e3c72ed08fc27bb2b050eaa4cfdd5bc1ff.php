<?php $__env->startSection('controller','Trang'); ?>
<?php $__env->startSection('controller_route',route('pages.list')); ?>
<?php $__env->startSection('action','Danh sách'); ?>
<?php $__env->startSection('content'); ?>
	<div class="content">
		<div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
               	<?php echo $__env->make('backend.components.messages-error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               	<form action="<?php echo e(route('pages.build.post', ['page' => $data->type])); ?>" method="POST">
					<?php echo csrf_field(); ?>
					<input name="type" value="<?php echo e($data->type); ?>" type="hidden">

	               	<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="">Trang</label>
								<input type="text" class="form-control" value="<?php echo e($data->name_page); ?>" disabled="">
				 				
								<?php if(\Route::has($data->route)): ?>
									<h5>
										<a href="<?php echo e(route($data->route)); ?>" target="_blank">
					                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>
					                        Link: <?php echo e(route($data->route)); ?>

					                    </a>
									</h5>
				                <?php endif; ?>
							</div>
							
						</div>
					</div>
					<div class="nav-tabs-custom">
				        <ul class="nav nav-tabs">

                            <li class="active">
				            	<a href="#setting" data-toggle="tab" aria-expanded="true" >Thiết lập trang</a>
				            </li>
				        </ul>
				    </div>
						<?php if(!empty($data->content)){
							$content = json_decode($data->content);

						} ?>

                        <div class="tab-pane" id="setting">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Link map</label>
                                        <textarea type="text" name="content[contact][map]" class="form-control"><?php echo e(@$content->contact->map); ?></textarea>
                                    </div>
                                    <div class="form-group">
										<label for="">Text</label>
										<textarea name="content[contact][desc]" class="content"><?php echo @$content->contact->desc; ?></textarea>
									</div>
                                </div>
                            </div>

                        </div>
			           <button type="submit" class="btn btn-primary">Lưu lại</button>
				</form>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gdigital\resources\views/backend/pages/layout/contact.blade.php ENDPATH**/ ?>