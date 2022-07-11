<?php $__env->startSection('content'); ?>
	<section id="bread">
		<div class="container">
			<div class="content">
				<ul class="list-inline">
					<li class="list-inline-item"><a title="Trang chủ" href="<?php echo e(url('/')); ?>">Trang chủ</a></li>
					<li class="list-inline-item"><a title="" href="javascript:0">Tìm kiếm từ khóa: <?php echo e(request()->get('q')); ?></a></li>
				</ul>
			</div>
		</div>
	</section>


	<section id="product">
		<div class="container">
			<div class="content">
				<div class="row">
					<div class="col-md-12">
						<div class="right-product">
							<div class="tab-pane pane-prd active" style="background: #fff;">
								<div class="list-product">
									<div class="row">
										<?php if(count($data)): ?>
											<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<div class="col-md-2">
													<?php $__env->startComponent('frontend.components.product-2', ['item' => $item]); ?>
													    
													<?php echo $__env->renderComponent(); ?>
												</div>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php else: ?>
											<div class="col-sm-12">
												<div class="alert alert-success" role="alert">
												  	Không có sản phẩm nào phù hợp.
												</div>
											</div>
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
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gdigital\resources\views/frontend/pages/search.blade.php ENDPATH**/ ?>