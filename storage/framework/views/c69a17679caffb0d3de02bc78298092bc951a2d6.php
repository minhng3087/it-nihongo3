<header>
    <div class="heder-top">
        <div class="container">
            <div class="content" style="position: relative;">
                <div class="row">
                    <div class="col-md-7 col-sm-8">
                        <div class="left">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="javascript:0"><i class="fa fa-phone"></i><span>Hỗ trợ 24/7: <?php echo e(@$site_info->hotline); ?></span></a></li>
                                <li class="list-inline-item"><a href="javascript:0"><i class="fa fa-envelope"></i><span>Email: <?php echo e(@$site_info->email_admin); ?></span></a></li>
                            </ul>
                        </div> 
                    </div>
                    <div class="col-md-5 col-sm-4">
                        <div class="social">
                            <ul class="list-inline text-right">
                                <?php if(!empty(@$site_info->social)): ?>
                                    <?php $__currentLoopData = @$site_info->social; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="list-inline-item"><a title="<?php echo e(@$val->name); ?>" href="<?php echo e(@$val->link); ?>" target="_blank"><i class="<?php echo e(@$val->icon); ?>"></i></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="logo">
                            <a title="<?php echo e(@$site_info->site_title); ?>" href="<?php echo e(url('/')); ?>">
                                <img src="<?php echo e(@$site_info->logo); ?>" alt="<?php echo e(@$site_info->site_title); ?>">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">Danh mục</button>
                            <form action="<?php echo e(route('home.search')); ?>" method="GET" class="input-group">
                                <input type="text" placeholder="Tìm kiếm" name="q" id="query-search">
                                <button type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="heart-icon"><a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="cart-icon"><a href="<?php echo e(route('home.cart')); ?>">
                                    <i class="icon_bag_alt"></i>
                                    <span id="count-cart"><?php echo e(Cart::count()); ?></span>
                                </a>
                                <div class="cart-hover">
                                    <?php echo $__env->make('frontend.pages.part-header.products-cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <div class="header-menu">
        <div class="container">
            <div class="content">
               
                <div class="row">
                    <div class="col-md-3">
                        <div class="all-cate">
                            <div class="title-all"><a href="javascript:0"><i class="fa fa-list-ul"></i><span>TẤT CẢ DANH MỤC</span></a></div>
                            <div class="submenu">
                                <ul>

                                    
                                    <?php $__currentLoopData = $menuCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(url($item->url)); ?>"><span><img src="<?php echo e(@$item->icon); ?>" class="img-fluid" alt=""></span><?php echo e(@$item->title); ?></a></li>
                                    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="right text-uppercase">
                            <ul>
                                <?php $__currentLoopData = $menuMain; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(url($item->url)); ?>"><?php echo e(@$item->title); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- menu-mobile -->
    <div class="menu-mobile" style="display: none;">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-5">
                    <div class="logo"><a href=""><img src="<?php echo e(__BASE_URL_FRONTEND__); ?>/images/logo.png" class="img-fluid" alt=""></a></div>
                </div>
                <div class="col-md-7 col-sm-7 col-7">
                    <div class="right">
                        <ul>
                            <li><a href=""><img src="<?php echo e(__BASE_URL_FRONTEND__); ?>/images/cart.png" class="img-fluid" alt=""></a></li>
                            <li>
                                <div class="header">
                                    <a title="" href="#menu"><i class="fa fa-bars"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav id="menu">
            <ul>
                <?php $__currentLoopData = $menuMainMobile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(url($item->url)); ?>"><?php echo e(@$item->title); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>;
            </ul>
        </nav>
    </div>
    <!-- end menu-mobile -->
</header><?php /**PATH C:\xampp\htdocs\gdigital\resources\views/frontend/layouts/header.blade.php ENDPATH**/ ?>