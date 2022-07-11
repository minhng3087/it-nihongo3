<header class="main-header">
  <!-- Logo -->
  <a href="backend" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">Menu</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Quản trị</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        <li class=""><a href="<?php echo e(asset('')); ?>" alt="Xem website" target="_blank">Xem website</a></li>
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo e(url('public/admin_assets/dist/img/favicon.png')); ?>" class="user-image" alt="User Image">
            <span class="hidden-xs">Quản trị viên</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?php echo e(url('public/admin_assets/dist/img/favicon.png')); ?>" class="img-circle" alt="User Image">
              <p>
                <?php echo e(Auth::user()->user_name); ?> - Web Developer
                <small><?php echo e(Auth::user()->email); ?></small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              
              <div class="pull-right">
                <a href="<?php echo e(url('backend/logout')); ?>" class="btn btn-default btn-flat">Thoát</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header><?php /**PATH C:\xampp\htdocs\gdigital\resources\views/backend/layouts/header.blade.php ENDPATH**/ ?>