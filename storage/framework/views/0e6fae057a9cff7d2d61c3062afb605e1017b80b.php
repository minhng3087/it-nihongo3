<?php $__env->startSection('content'); ?>
	<section id="bread">
		<div class="container">
			<div class="content">
				<ul class="list-inline">
					<li class="list-inline-item"><a href="<?php echo e(url('/')); ?>">Trang chủ</a></li>
					<li class="list-inline-item"><a href="javascript:0">Danh sách sản phẩm</a></li>
				</ul>
			</div>
		</div>
	</section>
	<section id="product" class="pb-50">
		<div class="container">
			<div class="content">
				<div class="row"> 
					<div class="col-md-3"> 
						<div class="side-bar" id="filter-product">
							<?php echo $__env->make('frontend.components.filters.filter-product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							<!-- <div class="box-bar">
								<div class="title-bar">Sản phẩm đặc biệt</div>
								<div class="list-db">
									<?php $__currentLoopData = $product_hot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php echo $__env->make('frontend.components.product-4', ['item' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									
								</div>
							</div> -->
						</div>
					</div>
					<div class="col-md-9">
						<div class="tab-product">
							<div class="row">
								<div class="col-md-6 col-sm-6 col-4">
									<div class="sort">
										<ul class="nav nav-tabs" role="tablist">
											<li class="">
												<a class="active" data-toggle="tab" href="#tabs-1" role="tab"><i class="fa fa-th"></i></a>
											</li>
										</ul>
									</div>
								</div>
								<div class="col-md-6 col-sm-6 col-8">
									<div class="show-product text-right">
										<span>Hiển thị: </span>
										<select name="" id="display_fields">
											<option value="">Chọn</option>
											<option value="1">1 sản phẩm</option>
											<option value="2">2 sản phẩm</option>
											<option value="3">3 sản phẩm</option>
											<option value="4">4 sản phẩm</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="list-product">
							<div class="tab-content">
								<div class="tab-pane active" id="tabs-1" role="tabpanel">
									<div class="row" id="list-products">
										<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div class="col-md-4 col-sm-4 col-6">
											<?php echo $__env->make('frontend.components.product', ['item' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
										</div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

				
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/gdigital/resources/views/frontend/pages/product.blade.php ENDPATH**/ ?>