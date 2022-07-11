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
    <div class="header-logo">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-md-3">
                        <div class="logo"><a title="<?php echo e(@$site_info->site_title); ?>" href="<?php echo e(url('/')); ?>"><img src="<?php echo e(@$site_info->logo); ?>" class="img-fluid" alt="<?php echo e(@$site_info->site_title); ?>"></a></div>
                    </div>
                    <div class="col-md-6">
                        <form action="<?php echo e(route('home.search')); ?>" method="GET">
                            <div class="search">
                                <select name="m" id="query-cate">
                                    <option value="0">Danh mục</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->slug); ?>" <?php echo e(!empty($_GET['m']) &&  $item->slug == $_GET['m'] ? 'selected' : ''); ?>><?php echo e($item->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <input type="text" placeholder="Nhập từ khóa" name="q" id="query-search">
                                <button type="submit" id="icon-search"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                        <div class="list-search" style="display: none;">
                                
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="cart text-right">
                            <a href="<?php echo e(route('home.cart')); ?>"><img src="<?php echo e(__BASE_URL__); ?>/images/cart.png" class="img-fluid" alt="">
                                <span id="count-cart"><?php echo e(Cart::count()); ?></span> sản phẩm
                            </a>
                        </div>

                        <?php if(Cart::count()): ?>
                            <div class="hver-cart">
                                <?php echo $__env->make('frontend.pages.part-header.products-cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
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
                    <div class="logo"><a href=""><img src="<?php echo e(__BASE_URL__); ?>/images/logo.png" class="img-fluid" alt=""></a></div>
                </div>
                <div class="col-md-7 col-sm-7 col-7">
                    <div class="right">
                        <ul>
                            <li><a href=""><img src="<?php echo e(__BASE_URL__); ?>/images/cart.png" class="img-fluid" alt=""></a></li>
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
</header><?php /**PATH C:\xampp\htdocs\m\resources\views/frontend/layouts/header.blade.php ENDPATH**/ ?>