<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quản trị website</title>
    <base href="<?php echo e(url('backend')); ?>" >
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo e(__BASE_URL_BACKEND__); ?>/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(__BASE_URL_BACKEND__); ?>/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(__BASE_URL_BACKEND__); ?>/dist/css/styles.css"/>
    <link rel="stylesheet" href="<?php echo e(__BASE_URL_BACKEND__); ?>/dist/css/AdminLTE.min.css"/>
    <link rel="stylesheet" href="<?php echo e(__BASE_URL_BACKEND__); ?>/dist/css/mycss.css"/>
    <link rel="stylesheet" href="<?php echo e(__BASE_URL_BACKEND__); ?>/dist/css/jquery.toast.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
    
    <link rel="stylesheet" href="<?php echo e(__BASE_URL_BACKEND__); ?>/plugins/datepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo e(__BASE_URL_BACKEND__); ?>/plugins/iconpicker/fontawesome-iconpicker.min.css">
    <?php echo toastr_css(); ?>
    <?php echo $__env->yieldContent('css'); ?>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo e(__BASE_URL_BACKEND__); ?>/dist/css/skins/_all-skins.min.css">
    <link href="<?php echo e(__BASE_URL_BACKEND__); ?>/dist/js/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    
  </head>
  <body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">
      <?php echo $__env->make('backend.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php echo $__env->make('backend.layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <div class="content-wrapper">
            <?php if(URL::current() != url('backend')): ?>
                <section class="content-header">
                    <h1>
                        <a href="<?php echo $__env->yieldContent('controller_route'); ?>"><?php echo $__env->yieldContent('controller'); ?></a>
                        <small><?php echo $__env->yieldContent('action'); ?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(url('backend')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?php echo $__env->yieldContent('controller_route'); ?>"><?php echo $__env->yieldContent('controller'); ?></a></li>
                        <li class="active"><?php echo $__env->yieldContent('action'); ?></li>
                    </ol>
                </section>
            <?php endif; ?>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
     
        <!-- Main content -->
      <?php echo $__env->make('backend.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <?php echo $__env->make('backend.components.modal-confim-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      

      <!-- Control Sidebar -->
    </div><!-- ./wrapper -->
  </body>
       
      <!-- jQuery 2.1.4 -->
      <script src="<?php echo e(__BASE_URL_BACKEND__); ?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
      <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
      <!-- CK Editor -->
      <script src="<?php echo e(__BASE_URL_BACKEND__); ?>/plugins/ckeditor/ckeditor.js"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      
      <script src="<?php echo e(__BASE_URL_BACKEND__); ?>/bootstrap/js/bootstrap.min.js"></script>
      <script src="<?php echo e(__BASE_URL_BACKEND__); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="<?php echo e(__BASE_URL_BACKEND__); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
  
      <!-- AdminLTE App -->
      <script src="<?php echo e(__BASE_URL_BACKEND__); ?>/dist/js/app.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="<?php echo e(__BASE_URL_BACKEND__); ?>/dist/js/demo.js"></script>
      <script src="<?php echo e(__BASE_URL_BACKEND__); ?>/dist/js/myscript.js"></script>
      <script src="<?php echo e(__BASE_URL_BACKEND__); ?>/dist/js/fileinput.min.js" type="text/javascript"></script>
      <script src="<?php echo e(__BASE_URL_BACKEND__); ?>/dist/js/jquery.nestable.js" type="text/javascript"></script>
      <script src="<?php echo e(__BASE_URL_BACKEND__); ?>/plugins/datepicker/moment.min.js"></script>
      <script src="<?php echo e(__BASE_URL_BACKEND__); ?>/plugins/datepicker/daterangepicker.js"></script>
      <script src="<?php echo e(__BASE_URL_BACKEND__); ?>/dist/js/jquery.toast.min.js"></script>
      <script src="<?php echo e(__BASE_URL_BACKEND__); ?>/plugins/iconpicker/fontawesome-iconpicker.min.js"></script>
      <script src="<?php echo e(__BASE_URL_BACKEND__); ?>/plugins/ckfinder/ckfinder.js"></script>

      <?php echo toastr_js(); ?>
      <?php echo app('toastr')->render(); ?>
      <?php echo $__env->yieldContent('scripts'); ?>
</html>
<?php /**PATH C:\xampp\htdocs\gdigital\resources\views/backend/layouts/master.blade.php ENDPATH**/ ?>