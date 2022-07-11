<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu">
      <!-- <li class="<?php echo e(Request::segment(2) == '' ? 'active' : null); ?>">
          <a href="<?php echo e(route('backend.index')); ?>">
              <i class="fa fa-home"></i> <span>Trang chủ</span>
          </a>
      </li> -->
      <!-- <li class="<?php echo e(Request::segment(2) == 'users' ? 'active' : null); ?>">
        <a href="backend/users/listuse">
          <i class="fa fa-user" aria-hidden="true"></i><span>Quản lý tài khoản</span>
        </a>
      </li> -->


      <!-- Sản phẩm -->
      <!-- <li class="treeview <?php echo e(Request::segment(2) === 'category' || Request::segment(2) === 'products' ||  Request::segment(2) === 'product-attributes' || Request::segment(2) === 'brand' || Request::segment(2) === 'category-filter' || Request::segment(2) === 'filter' ? 'active' : null); ?>">
        <a href="#">
            <i class="fa fa-tags" aria-hidden="true"></i> <span>Sản phẩm</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
           
            <li class="<?php echo e(Request::segment(2) === 'products' ? 'active' : null); ?>">
              <a href="<?php echo e(route('products.index')); ?>"><i class="fa fa-circle-o"></i> Danh sách sản phẩm</a>
            </li>

            <li class="<?php echo e(Request::segment(2) === 'category' ? 'active' : null); ?>">
              <a href="<?php echo e(route('category.index')); ?>"><i class="fa fa-circle-o"></i> Danh mục sản phẩm</a>
            </li>

            <li class="<?php echo e(Request::segment(2) === 'brand' ? 'active' : null); ?>">
                <a href="<?php echo e(route('brand.index')); ?>"><i class="fa fa-circle-o"></i> Thương hiệu sản phẩm</a>
            </li>

            <li class="<?php echo e(Request::segment(2) === 'product-attributes' ? 'active' : null); ?>">
                <a href="<?php echo e(route('product-attributes.index')); ?>"><i class="fa fa-circle-o"></i> Thuộc tính sản phẩm</a>
            </li>


            <li class="<?php echo e(Request::segment(2) === 'category-filter' ? 'active' : null); ?>">
                <a href="<?php echo e(route('list-category-filter')); ?>"><i class="fa fa-circle-o"></i> Bộ lọc</a>
            </li>
            
         </ul>
      </li> -->
     
      <!-- Bài viết -->
      <!-- <li class="treeview <?php echo e(Request::segment(2) === 'posts' || Request::segment(2) === 'categories-post' ? 'active' : null); ?>">
          <a href="#">
              <i class="fa fa-tags" aria-hidden="true"></i> <span>Bài viết</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
              <li class="<?php echo e(Request::segment(2) === 'posts' ? 'active' : null); ?>">
                  <a href="<?php echo e(route('posts.index', ['type'=> 'blog'])); ?>"><i class="fa fa-circle-o"></i> Danh sách bài viết</a>
              </li>
              <li class="<?php echo e(Request::segment(2) === 'categories-post' ? 'active' : null); ?>">
                  <a href="<?php echo e(route('categories-post.index')); ?>"><i class="fa fa-circle-o"></i> Danh mục bài viết</a>
              </li>

          </ul>
      </li>

      <li class="<?php echo e(Request::segment(2) == 'contact' ? 'active' : null); ?>">
          <a href="<?php echo e(route('contact.index')); ?>">
              <i class="fa fa-phone" aria-hidden="true"></i> <span>Khách hàng liên hệ</span>
          </a>
      </li>

      <li class="<?php echo e(Request::segment(2) == 'pages' ? 'active' : null); ?>">
        <a href="<?php echo e(route('pages.list')); ?>">
            <i class="fa fa-paper-plane" aria-hidden="true"></i> <span>Cài đặt trang</span>
        </a>
      </li> -->

      <li class="<?php echo e(Request::segment(2) == 'orders' ? 'active' : null); ?>">
          <a href="<?php echo e(route('orders.index')); ?>">
              <i class="fa fa-line-chart" aria-hidden="true"></i> <span>Đơn hàng</span>
          </a>
      </li>


      <!-- Setting -->

      <!-- <li class="header">Cấu hình hệ thống</li>
      <li class="treeview <?php echo e(Request::segment(2) === 'options' || Request::segment(2) === 'branchs' || Request::segment(2) === 'menu-category' ||  Request::segment(2) === 'menu' || Request::segment(2) === 'banks' ? 'active' : null); ?>">
          <a href="#">
              <i class="fa fa-cog" aria-hidden="true"></i> <span>Cấu hình</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">

              <li class="<?php echo e(Request::segment(3) === 'general' ? 'active' : null); ?>">
                  <a href="<?php echo e(route('backend.options.general')); ?>"><i class="fa fa-circle-o"></i> Cấu hình chung</a>
              </li>

              <li class="<?php echo e(Request::segment(2) === 'menu' ? 'active' : null); ?>">
                  <a href="<?php echo e(route('setting.menu')); ?>"><i class="fa fa-circle-o"></i> Menu</a>
              </li>

              <li class="<?php echo e(Request::segment(2) === 'menu-category' ? 'active' : null); ?>">
                  <a href="<?php echo e(route('setting.menu-category')); ?>"><i class="fa fa-circle-o"></i> Menu Danh mục</a>
              </li>

              <li class="<?php echo e(Request::segment(3) === 'smtp' ? 'active' : null); ?>">
                  <a href="<?php echo e(route('backend.options.smtp-config')); ?>"><i class="fa fa-circle-o"></i>  Cấu hình Email</a>
              </li>
              
          </ul>
      </li> -->
    </ul>

  
  </section>
</aside><?php /**PATH /var/www/html/gdigital/resources/views/backend/layouts/menu.blade.php ENDPATH**/ ?>