<?php $__env->startSection('content'); ?>
<?php $__env->startSection('controller','Cập nhật tài khoản'); ?>
<?php $__env->startSection('action','Edit'); ?>
<!-- Content Header (Page header) -->
<!-- Main content -->
<section class="content">
    <div class="box">
		<?php echo $__env->make('backend.components.messages-error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="box-body">
        	<form method="post" action="backend/users/postedituse?id=<?php echo e($data->id); ?>" enctype="multipart/form-data">
        		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
          		<div class="row">
              		<div class="col-md-6 col-xs-12">
						<div class="clearfix"></div>
						<div class="form-group">
							<label for="ten">Loại tài khoản</label>
							<select name="level" class="form-control">
		                      	<option <?php if($data->level==1): ?> selected <?php endif; ?> value="1">Quản trị admin</option>
		                      	<option <?php if($data->level==3): ?> selected <?php endif; ?> value="3">Quản trị viên</option>
		                    </select>
						</div>		
						<div class="form-group">
					      	<label for="ten">Username</label>
					      	<input type="text" disabled value="<?php echo e($data->username); ?>"  class="form-control" />
						</div>
						<div class="form-group <?php if($errors->first('txtPasswordNew')!=''): ?> has-error <?php endif; ?>">
					      	<label for="ten">Password mới</label>
					      	<input type="password" name="txtPasswordNew" value=""  class="form-control" />
					      	<?php if($errors->first('txtPasswordNew')!=''): ?>
					      	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> <?php echo $errors->first('txtPasswordNew');; ?></label>
					      	<?php endif; ?>
						</div>
				    	<div class="form-group  <?php if($errors->first('txtName')!=''): ?> has-error <?php endif; ?>">
					      	<label for="ten">Họ tên</label>
					      	<input type="text" name="txtName" value="<?php echo e($data->name); ?>"  class="form-control" />
					      	<?php if($errors->first('txtName')!=''): ?>
					      	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> <?php echo $errors->first('txtName');; ?></label>
					      	<?php endif; ?>
						</div>
						<div class="form-group">
					      	<label for="alias">Email</label>
					      	<input type="email" name="txtEmail" id="txtEmail" value="<?php echo e($data->email); ?>"  class="form-control" />
						</div>
						<div class="form-group">
					      	<label for="alias">Điện thoại</label>
					      	<input type="text" name="txtPhone" id="txtPhone" value="<?php echo e($data->phone); ?>"  class="form-control" />
						</div>
                         <!------------------------>
                        <!------------------------>
					</div>
					<div class="col-md-6 col-xs-12"></div>
				</div>
			    <div class="clearfix"></div>
			    <div class="box-footer">
			    	<div class="row">
						<div class="col-md-6">
					    	<button type="submit" class="btn btn-primary">Cập nhật</button>
					    	<button type="button" class="btn btn-danger" onclick="javascript:window.location='backend'">Thoát</button>
				    	</div>
			    	</div>
			  	</div>
		    </form>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section><!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/gdigital/resources/views/backend/users/edituse.blade.php ENDPATH**/ ?>