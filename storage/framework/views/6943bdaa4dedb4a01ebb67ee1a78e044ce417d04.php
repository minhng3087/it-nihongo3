<?php $__env->startSection('content'); ?>
	<section id="bread">
		<div class="container">
			<div class="content">
				<ul class="list-inline text-uppercase">
					<li class="list-inline-item"><a href="<?php echo e(url('/')); ?>">Trang chủ</a></li>
					<li class="list-inline-item"><a href="<?php echo e(url('/tin-tuc')); ?>">Blog</a></li>
					<li class="list-inline-item"><a href="javascript:0"><?php echo e($data->name); ?></a></li>
				</ul>
			</div>
		</div>
	</section>
	<section id="news-detail">
		<div class="container">
			<div class="content">
				<div class="tab-detail">
					<div class="detail pb-50">
						<div class="row">
							<div class="col-md-9">
								<div class="tab-content">
									<div class="tab-pane active" id="tabs-1" role="tabpanel">
										<div class="title-hot">
										 	<?php echo $data->content; ?>

										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="side-bar">
									<div class="other-detail">
										<div class="title-other">BÀI VIẾT LIÊN QUAN</div>
										<div class="list-item-other">
											<?php $__currentLoopData = $post_related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<div class="item">
												<div class="date"><i class="fa fa-clock-o"></i><?php echo e($item->published_at->diffForHumans()); ?></div>
												<h4><a href="<?php echo e(route('home.post.single', $item->slug)); ?>"><?php echo e(@$item->desc); ?></a></h4>
											</div>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</div>
										<div class="new-detail">
											<div class="title-other">BÀI VIẾT MỚI NHẤT</div>
											<div class="list-new-bar">
												<?php if(!empty($posts_hot)): ?>
													<?php $__currentLoopData = $posts_hot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<div class="item">
														<div class="avarta"><a href="<?php echo e(route('home.post.single', $item->slug)); ?>"><img src="<?php echo e($item->image); ?>" class="img-fluid" alt=""></a></div>
														<div class="info">
															<div class="date"><i class="fa fa-clock-o"></i><?php echo e($item->published_at->diffForHumans()); ?></div>
															<h4><a href="<?php echo e(route('home.post.single', $item->slug)); ?>"><?php echo e($item->title); ?></a></h4>
															<div class="desc"><?php echo e($item->desc); ?></div>
															<div class="read-more"><a href="<?php echo e(route('home.post.single', $item->slug)); ?>">Đọc thêm</a></div>
														</div>
													</div>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gdigital\resources\views/frontend/pages/blog-detail.blade.php ENDPATH**/ ?>