<?php $__env->startSection('content'); ?>
<?php $__env->startSection('controller','Thêm mới tài khoản '); ?>
<!-- Content Header (Page header) -->
<style type="text/css">
    #mginb input{
        margin-bottom: 10px;
    }
</style>
<!-- Main content -->
<section class="content">
    <div class="box">
    	<?php echo $__env->make('backend.components.messages-error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="box-body">
               <div class="col-md-6 col-xs-12" id="mginb">
                	<form  action="<?php echo url('backend/users/posuse'); ?>" name="frmRegister" method="post" class="form-group modal_frm">
                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                    <select name="level" class="form-control">
                      <option value="1">Quản trị admin</option>
                      <option value="3">Quản trị viên</option>
                    </select>
                		<input type="text" placeholder="Họ và tên"  name="name" required="required" class="form-control frm_user">
                		<input type="tel" placeholder="Điện thoại" name="phone" required="required" class="form-control frm_tel">
                		<input type="email" placeholder="Thư điện tử" name="email" required="required" class="form-control frm_email">
                    <input type="text" placeholder="Tài khoản đăng nhập" name="username" required="required" class="form-control frm_user">
                		<input type="password" placeholder="Mật khẩu" name="password"  required="required" class="form-control frm_pw">
                        <!------------------------>
                        <!------------------------>
                        <p class="text-center" style="margin-top: 30px;"><button type="submit" class="btn text-uppercase frm_btn">Đăng ký</button></p>
                	</form>
                    </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section><!-- /.content -->
<!-- Modal -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/gdigital/resources/views/backend/users/adduse.blade.php ENDPATH**/ ?>