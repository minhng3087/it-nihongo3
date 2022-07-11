<?php $__env->startSection('controller','SMTP'); ?>
<?php $__env->startSection('action','Cập nhật'); ?>
<?php $__env->startSection('controller_route', route('backend.options.smtp-config')); ?>
<?php $__env->startSection('content'); ?>
	<div class="content">
		<div class="clearfix"></div>
		<?php echo $__env->make('backend.components.messages-error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<div class="nav-tabs-custom">
		    <ul class="nav nav-tabs">
		        <li class="active">
		            <a href="#activity" data-toggle="tab" aria-expanded="true">Cấu hình</a>
		        </li>
		        <li class="">
		            <a href="#activity1" data-toggle="tab" aria-expanded="true">Kiểm tra</a>
		        </li>
		    </ul>
		    <div class="tab-content">
		        <div class="tab-pane active" id="activity">
		        	<form action="<?php echo e(route('backend.options.smtp-config.post')); ?>" method="POST">
		        		<?php echo csrf_field(); ?>
		        		<div class="row">
		        			<div class="col-lg-6">
	                			<div class="form-group">
	                				<label for="">Mail username</label>
	                				<input type="text" name="content[username]" class="form-control" value="<?php echo e(@$content->username); ?>">
	                			</div>
	                			<div class="form-group">
	                				<label for="">Mail password</label>
	                				<input type="password" name="content[password]" class="form-control" value="<?php echo e(@$content->password); ?>">
	                			</div>
	                			<div class="form-group">
	                				<label for="">Mail name</label>
	                				<input type="text" name="content[name]" class="form-control" value="<?php echo e(@$content->name); ?>">
	                			</div>
	                			<div class="form-group">
	                				<button type="submit" class="btn btn-primary">Lưu lại</button>
	                			</div>
	                		</div>
		        		</div>
		        	</form>
		        </div>
		        <div class="tab-pane" id="activity1">
		        	<form action="<?php echo e(route('backend.options.send-mail.post')); ?>" method="POST">
		        		<?php echo csrf_field(); ?>
		        		<div class="row">
		        			<div class="col-lg-6">
	                			<div class="form-group">
	                				<label for="">Tới</label>
	                				<input type="text" name="smtp_email" class="form-control" value="" placeholder="Email">
	                			</div>
	                			<div class="form-group">
	                				<label for="">Tiêu đề</label>
	                				<input type="text" name="smtp_title" class="form-control" value="" placeholder="Tiêu đề">
	                			</div>
	                			<div class="form-group">
	                				<label for="">Tin nhắn</label>
	                				<textarea class="form-control" rows="5" name="smtp_message"></textarea>
	                			</div>
	                			<div class="form-group">
	                				<button type="submit" class="btn btn-primary">Gửi thử email</button>
	                			</div>
	                		</div>

		        		</div>
		        	</form>
		        </div>
		    </div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\m\resources\views/backend/options/smtp-config.blade.php ENDPATH**/ ?>