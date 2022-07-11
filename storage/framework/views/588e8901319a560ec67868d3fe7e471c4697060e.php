<?php $__env->startSection('content'); ?>
	<?php 
		if(!empty($dataContent->content)){
			$content = json_decode( $dataContent->content );
		}
		
	?>
	<section id="banner">
		<div class="slide-banner">
			<?php if(!empty($content->banner)): ?>
				<?php $__currentLoopData = $content->banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="item">
						<div class="avarta"><img src="<?php echo e($value->image); ?>" class="img-fluid" width="100%" alt=""></div>
						<div class="caption">
							<div class="container">
								<div class="content">
									<div class="info">
										<?php echo e($value->desc); ?>

									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>
		</div>
	</section>
	<section id="banner-top">
		<div class="container">
			<div class="content">
				<div class="list-banner-top">
					<div class="row"> 
						<?php if(!empty($content->banner_head)): ?>
							<?php $__currentLoopData = $content->banner_head; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-md-4 col-sm-4">
								<div class="item">
									<div class="avata"><a href="<?php echo e($value->link); ?>"><img src="<?php echo e($value->image); ?>" class="img-fluid" width="100%" alt="<?php echo e($value->image); ?>"></a></div>
									<div class="info">
										<?php echo e($value->desc); ?>

									</div>
								</div>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="box-product">
		<div class="container">
			<div class="content">
				<div class="box-cate">
					<div class="row">
						<div class="col-md-3">
							<div class="left"><img src="<?php echo e(__BASE_URL__); ?>/images/icon1.png" class="img-fluid" alt="">Điện thoại<i></i></div>
						</div>
						<div class="col-md-9">
							<div class="right text-right">
								<ul class="list-inline">
									<?php if(!empty($content->category_moblie)): ?>
										<?php $__currentLoopData = $content->category_moblie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php $cate = \App\Models\Categories::find($value->category_id) ?>
											<?php if(!empty($cate)): ?>
												<li class="list-inline-item">
													<a class="category-moblie" href="<?php echo e(route('home.archive.product', $cate->slug)); ?>" ><?php echo e($cate->name); ?></a>
												</li>
											<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
				
				<div class="list-product">
					<div class="row">
						<?php 
							$category = reset($content->category_moblie);
							$products = \App\Models\Products::where('brand_id', $category->category_id)->where('status', 1)->where('is_hot', 1)->take(4)->get();
							$brand = \App\Models\Categories::where('type', 'brand_category')->where('id', $category->category_id)->get();
						?>
						<div class="col-md-2">
							<div class="item item-left">
								<div class="avarta"><a href=""><img src="<?php echo e($brand[0]->banner); ?>" class="img-fluid" alt=""></a></div>
							</div>
						</div>
						<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php echo $__env->make('frontend.components.product', ['item' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
							
			</div>
		</div>
	</section>
	<section class="box-product pt-50">
		<div class="container">
			<div class="content">
				<div class="box-cate">
					<div class="row">
						<div class="col-md-3">
							<div class="left"><img src="<?php echo e(__BASE_URL__); ?>/images/icon2.png" class="img-fluid" alt="">Laptop<i></i></div>
						</div>
						<div class="col-md-9">
							<div class="right text-right">
								<ul class="list-inline">
									<?php if(!empty($content->category_laptop)): ?>
										<?php $__currentLoopData = $content->category_laptop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php $cate = \App\Models\Categories::find($value->category_id) ?>
											<?php if(!empty($cate)): ?>
												<li class="list-inline-item">
													<a class="category-moblie" href="<?php echo e(route('home.archive.product', $cate->slug)); ?>"><?php echo e($cate->name); ?></a>
												</li>
											<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="list-product">
					<div class="row">
					<?php 
							$category = reset($content->category_laptop);
							$products = \App\Models\Products::where('brand_id', $category->category_id)->where('status', 1)->where('is_hot', 1)->take(4)->get();
							$brand = \App\Models\Categories::where('type', 'brand_category')->where('id', $category->category_id)->get();
						?>
						<div class="col-md-2">
							<div class="item item-left">
								<div class="avarta"><a href=""><img src="<?php echo e($brand[0]->banner); ?>" class="img-fluid" alt=""></a></div>
							</div>
						</div>
						<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php echo $__env->make('frontend.components.product', ['item' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="banner-hot" class="pt-50">
		<div class="container">
			<?php if(!empty($content->banner_mid)): ?>
				<?php $__currentLoopData = $content->banner_mid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="item">
						<a href="<?php echo e($value->link); ?>"><img src="<?php echo e($value->image); ?>" class="img-fluid" width="100%" alt="<?php echo e($value->image); ?>"></a>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>
		</div>
	</section>
	<section class="box-product pt-50">
		<div class="container">
			<div class="content">
				<div class="list-product">
					<div class="row">
						<div class="col-md-2">
							<div class="item item-left" style="height: 100%">
								<div class="cate-left text-left">
									<h3>TABLET</h3>
									<ul>
										<?php if(!empty($content->category_tablet)): ?>
										<?php $__currentLoopData = $content->category_tablet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php $cate = \App\Models\Categories::find($value->category_id) ?>
											<?php if(!empty($cate)): ?>
												<li class="list-inline-item">
													<a class="category-moblie" href="<?php echo e(route('home.archive.product', $cate->slug)); ?>"><?php echo e($cate->name); ?></a>
												</li>
											<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
									</ul>
								</div>
							</div>
						</div>
						<?php 
							$category = reset($content->category_tablet);
							$products = \App\Models\Products::where('brand_id', $category->category_id)->where('status', 1)->where('is_hot', 1)->take(4)->get();
							$brand = \App\Models\Categories::where('type', 'brand_category')->where('id', $category->category_id)->get();
						?>
						<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php echo $__env->make('frontend.components.product', ['item' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="box-product pt-50">
		<div class="container">
			<div class="content">
				<div class="box-cate">
					<div class="row">
						<div class="col-md-3">
							<div class="left">Sản phẩm mới<i></i></div>
						</div>
						<div class="col-md-9">
							<div class="right text-right">
								<ul class="list-inline">
									<li class="list-inline-item"><a href="product.php" class="active">Apple</a></li>
									<li class="list-inline-item"><a href="product.php">Samsung </a></li>
									<li class="list-inline-item"><a href="product.php">LG</a></li>
									<li class="list-inline-item"><a href="product.php">Samsung </a></li>
									<li class="list-inline-item"><a href="product.php">Samsung </a></li>
									<li class="list-inline-item"><a href="product.php">BlackBerry</a></li>
									<li class="list-inline-item"><a href="product.php">Oppo</a></li>
									<li class="list-inline-item"><a href="product.php">Vivo</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="list-product slide-prod">
					<div class="row">
						<div class="col-md-2">
							<div class="item">
								<div class="avarta">
									<a href="product-detail.php"><img src="<?php echo e(__BASE_URL__); ?>/images/pr1.png" class="img-fluid" alt=""></a>
									<div class="abs">
										<ul class="list-inline text-center">
											<li class="list-inline-item"><a href="" data-toggle="modal" data-target="#myModal"><img src="<?php echo e(__BASE_URL__); ?>/images/zoom.png" class="img-fluid" alt=""></a></li>
											<li class="list-inline-item"><a href=""><img src="<?php echo e(__BASE_URL__); ?>/images/vote.png" class="img-fluid" alt=""></a></li>
										</ul>
									</div>
								</div>
								<div class="info">
									<h3><a href="product-detail.php">Iphone XS 64G</a></h3>
									<div class="vote">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<div class="price"><span>22.225.000đ</span></div>
									<div class="btn-add"><a href="">Thêm vào giỏ hàng</a></div>
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="item">
								<div class="avarta">
									<a href="product-detail.php"><img src="<?php echo e(__BASE_URL__); ?>/images/pr2.png" class="img-fluid" alt=""></a>
									<div class="abs">
										<ul class="list-inline text-center">
											<li class="list-inline-item"><a href="" data-toggle="modal" data-target="#myModal"><img src="<?php echo e(__BASE_URL__); ?>/images/zoom.png" class="img-fluid" alt=""></a></li>
											<li class="list-inline-item"><a href=""><img src="<?php echo e(__BASE_URL__); ?>/images/vote.png" class="img-fluid" alt=""></a></li>
										</ul>
									</div>
								</div>
								<div class="info">
									<h3><a href="product-detail.php">Iphone XS 64G</a></h3>
									<div class="vote">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<div class="price"><span>22.225.000đ</span></div>
									<div class="btn-add"><a href="">Thêm vào giỏ hàng</a></div>
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="item">
								<div class="avarta">
									<a href="product-detail.php"><img src="<?php echo e(__BASE_URL__); ?>/images/pr1.png" class="img-fluid" alt=""></a>
									<div class="abs">
										<ul class="list-inline text-center">
											<li class="list-inline-item"><a href="" data-toggle="modal" data-target="#myModal"><img src="<?php echo e(__BASE_URL__); ?>/images/zoom.png" class="img-fluid" alt=""></a></li>
											<li class="list-inline-item"><a href=""><img src="<?php echo e(__BASE_URL__); ?>/images/vote.png" class="img-fluid" alt=""></a></li>
										</ul>
									</div>
								</div>
								<div class="info">
									<h3><a href="product-detail.php">Iphone XS 64G</a></h3>
									<div class="vote">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<div class="price"><span>22.225.000đ</span></div>
									<div class="btn-add"><a href="">Thêm vào giỏ hàng</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="box-hot pt-50 pb-50">
		<div class="container">
			<div class="content">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<div class="left">
							<div class="item"><a href=""><img src="<?php echo e(__BASE_URL__); ?>/images/hot1.png" class="img-fluid" width="100%" alt=""></a></div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="right">
							<div class="item"><a href=""><img src="<?php echo e(__BASE_URL__); ?>/images/hot2.png" class="img-fluid" width="100%" alt=""></a></div>
							<div class="small-hot">
								<ul>
									<li><a href=""><img src="<?php echo e(__BASE_URL__); ?>/images/hot3.png" class="img-fluid" width="100%^" alt=""></a></li>
									<li><a href=""><img src="<?php echo e(__BASE_URL__); ?>/images/hot4.png" class="img-fluid" width="100%^" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section id="box-news">
		<div class="container">
			<div class="content">
				<div class="title-news">
					<h2 class="robo-bold text-uppercase"><span>Bài viết mới nhất</span></h2>
				</div>
				<div class="list-news">
					<div class="row">
						<?php if(count($posts_hot)): ?>
							<?php $__currentLoopData = $posts_hot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-md-4 col-sm-4">
								<div class="item">
									<div class="avarta"><a href="<?php echo e(route('home.post.single', $item->slug)); ?>">	<img src="<?php echo e($item->image); ?>" class="img-fluid" width="100%" alt="<?php echo e($item->name); ?>"></a></div>
									<div class="info">
										<div class="date robo-light"><i class="fa fa-clock-o"></i> <?php echo e($date->diffForHumans($item->published_at)); ?></div>
										<h3><a href="<?php echo e(route('home.post.single', $item->slug)); ?>" class="robo-bold"><?php echo e($item->name); ?></a></h3>
										<div class="desc">
											<?php echo e($item->desc); ?>

										</div>
										<div class="view-now robo-light"><a href="<?php echo e(route('home.post.single', $item->slug)); ?>">Đọc thêm</a></div>
									</div>
								</div>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="partner" class="pb-50">
		<div class="container">
			<div class="content">
				<div class="slide-part">
					<div class="row">
						<?php if(!empty($content->partner)): ?>
							<?php $__currentLoopData = $content->partner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="col-md-2"><div class="item"><a href="<?php echo e($value->link); ?>"><img src="<?php echo e($value->image); ?>" class="img-fluid" alt="<?php echo e($value->desc); ?>"></a></div></div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="popup">
    	<div class="modal fade" id="myModal">
			<div class="modal-dialog">
        		<div class="modal-content">
				</div>
			</div>
		</div>
	</section>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\m\resources\views/frontend/pages/home.blade.php ENDPATH**/ ?>