<?php $__env->startSection('controller', $module['name'] ); ?>
<?php $__env->startSection('controller_route', route($module['module'].'.index')); ?>
<?php $__env->startSection('action', 'Chỉnh sửa'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
				<?php echo $__env->make('backend.components.messages-error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <form action="<?php echo updateOrStoreRouteRender( @$module['action'], $module['module'], @$data); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php if(isUpdate(@$module['action'])): ?>
                        <?php echo e(method_field('put')); ?>

                    <?php endif; ?>
                	<div class="row">
                		<div class="col-sm-12">
                			<div class="form-group">
                				<label for="">Họ tên</label>
                				<input type="text" class="form-control" value="<?php echo e(@$data->name); ?>" readonly="">
                			</div>
                			<div class="form-group">
                				<label for="">Email</label>
                				<input type="text" class="form-control" value="<?php echo e(@$data->email); ?>" readonly="">
                			</div>
                			<div class="form-group">
                				<label for="">Số điên thoại</label>
                				<input type="text" class="form-control" value="<?php echo e(@$data->phone); ?>"  readonly="">
                			</div>
                			
                			<div class="form-group">
                				<label for="">Nội dung</label>
                				<textarea class="form-control" name="content" rows="6" readonly=""><?php echo e(@$data->content); ?></textarea>
                			</div>
                            <label class="custom-checkbox" style="margin-bottom: 10px ">
                                <?php if(isUpdate(@$module['action'])): ?>
                                    <input type="checkbox" name="status" value="1" <?php echo e(@$data->status == 1 ? 'checked' : null); ?>> Duyệt
                                <?php else: ?>
                                    <input type="checkbox" name="status" value="1" checked> Duyệt
                                <?php endif; ?>
                            </label>
                			<button type="submit" class="btn btn-primary">Lưu lại</button>
                		</div>
                	</div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
	<style>
		.row-upload .col-upload {
		    padding: 0 7px;
		}
		.row-upload {
		    display: inline-flex;
		    width: 100%;
		    flex-wrap: wrap;
		    margin: 0 -7px;
		}
		.row-upload .col-upload img {
		    width: 70px;
		    height: 70px;
		    object-fit: cover;
		    border-radius: 3px;
		}
	</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/gdigital/resources/views/backend/contact/edit.blade.php ENDPATH**/ ?>