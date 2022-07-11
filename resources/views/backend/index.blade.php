@extends('backend.layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Quản trị website 
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ asset('backend') }}"><i class="fa fa-dashboard"></i> Home</a></li>
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
          <h3>{{ @$countProducts }}</h3>
          <p>Tổng sản phẩm</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="{{ route('products.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <?php 
          $countNews = \App\Models\Posts::where('status', 1)->count(); 
      ?>
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>{{ @$countNews }}</h3>
          <p>Bài viết</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="{{ route('posts.index', ['type' => 'blog']) }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
        <?php 
          $countUsers = \App\Models\Users::where('status', 1)->count(); 
        ?>
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>{{ @$countUsers }}</h3>
          <p>Tài khoản</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="{{ route('backend.users.listuse') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      @php 
          $countOrders = \App\Models\Orders::count(); 
      @endphp
      <div class="small-box bg-red">
        <div class="inner">
          <h3>{{ $countOrders }}</h3>
          <p>Đơn hàng</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="{{ route('orders.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
  </div>
  
</section><!-- /.content -->
@endsection