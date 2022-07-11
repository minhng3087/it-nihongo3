<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Quản trị website 
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo e(asset('backend')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Tables</a></li>
    <li class="active">Data tables</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <?php 
          $countProducts = \App\Models\Products::where('status', 1)->count(); 
      ?>
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo e(@$countProducts); ?></h3>
          <p>Tổng sản phẩm</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="<?php echo e(route('products.index')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <?php 
          $countNews = \App\Models\Posts::where('status', 1)->count(); 
      ?>
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?php echo e(@$countNews); ?></h3>
          <p>Bài viết</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="<?php echo e(route('posts.index', ['type' => 'blog'])); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
        <?php 
          $countUsers = \App\Models\Users::where('status', 1)->count(); 
        ?>
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?php echo e(@$countUsers); ?></h3>
          <p>Tài khoản</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="<?php echo e(route('backend.users.listuse')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <?php 
          $countOrders = \App\Models\Orders::count(); 
      ?>
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?php echo e($countOrders); ?></h3>
          <p>Đơn hàng</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="<?php echo e(route('orders.index')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
  </div>
  
</section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/gdigital/resources/views/backend/index.blade.php ENDPATH**/ ?>