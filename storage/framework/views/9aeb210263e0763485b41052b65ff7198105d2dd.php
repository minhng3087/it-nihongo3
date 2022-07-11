<?php $__env->startSection('content'); ?>
	<section id="bread">
		<div class="container">
			<div class="content">
				<ul class="list-inline text-uppercase">
					<li class="list-inline-item"><a href="index.php">Trang chủ</a></li>
					<li class="list-inline-item"><a href="javascript:0">blog</a></li>
				</ul>
			</div>
		</div>
	</section>
	<section id="blog">
		<div class="container">
			<div class="content">
				<div class="list-news pb-100">
					<div class="row">
					<?php if(!empty($data)): ?>
						<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-md-4 col-sm-4">
							<div class="item">
								<div class="avarta"><a href="<?php echo e(route('home.post.single', $item->slug)); ?>">	<img src="<?php echo e($item->image); ?>" class="img-fluid" width="100%" alt=""></a></div>
								<div class="info">
									<div class="date robo-light"><i class="fa fa-clock-o"></i> <?php echo e($item->published_at->diffForHumans()); ?></div>
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
						<div class="col-md-12">
							<div class="pagination">
								<?php echo $data->links('vendor.pagination.custom'); ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/gdigital/resources/views/frontend/pages/blog.blade.php ENDPATH**/ ?>