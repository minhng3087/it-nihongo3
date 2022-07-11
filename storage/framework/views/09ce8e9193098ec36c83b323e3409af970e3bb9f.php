<?php $__env->startSection('content'); ?>
	<section id="bread">
		<div class="container">
			<div class="content">
				<ul class="list-inline">
					<li class="list-inline-item"><a title="Trang chủ" href="<?php echo e(url('/')); ?>">Trang chủ</a></li>
					<li class="list-inline-item"><a title="" href="javascript:0">Thanh toán</a></li>
				</ul>
			</div>
		</div>
	</section>

	<section id="payment" class="pt-20 pb-80">
		<div class="container">
			<div class="content">
				<div class="row">
					<div class="col-md-6">
						<form action="<?php echo e(route('home.check-out.post')); ?>" method="POST" id="formsreviews">
							<?php echo csrf_field(); ?>
							<div class="left">
								<div class="form-pay">
									<div class="title-pay">Thông tin khách hàng</div>
									<div class="row">
										<div class="col-md-12">
											<div class="item">
												<div class="form-group">
													<input type="text" placeholder="Họ tên" name="name">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="item">
												<div class="form-group">
													<input type="text" placeholder="Email" name="email" class="email-cus">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="item">
												<div class="form-group">
													<input type="text" placeholder="Số điện thoại" name="phone">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="item">
												<div class="form-group">
													<select name="id_province" id="id_province">
														<option value="">Tỉnh / Thành phố</option>
														<?php $__currentLoopData = $province; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<option value="<?php echo e($item->id); ?>"><?php echo e($item->_name); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="item">
												<div class="form-group">
													<select name="id_district" id="id_district">
														<option value="">Quận / Huyện </option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="item">
												<div class="form-group">
													<select name="id_ward" id="id_ward">
														<option value="">Phường / Xã </option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="item">
												<div class="form-group">
													<input type="text" placeholder="Địa chỉ cụ thể (ghi rõ số nhà, ngõ, ngách)" name="address">
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="item">
												<div class="form-group">
													<textarea id="" cols="30" rows="10" placeholder="Nội dung" name="note"></textarea>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="method-pay">
									<div class="title-pay">Hình thức thanh toán</div>
									<div class="list-method">
										<div class="item">
											<input type="radio" id="method-1" name="radio-group" checked>
											<label for="method-1" class="hide-bank active">Thanh toán khi nhận hàng</label>
										</div>
										<div class="item">
											<input type="radio" id="method-2" name="radio-group">
											<label for="method-2" class="show-bank">Thanh toán online</label>
										</div>
									</div>
									<div class="btn-pay text-center pt-20">
										<input type="button" class="sent" value="Gửi đơn hàng">
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="col-md-6">
						<div class="right">
							<div class="info-dh">
								<div class="title-pay">Chi tiết đơn hàng</div>
								<div class="list-dh">
									<?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div class="item">
											<div class="prd-pay">
												<div class="avarta">
													<a title="<?php echo e($item->name); ?>" href="<?php echo e(route('home.single.product', $item->options->slug)); ?>">
														<img src="<?php echo e($item->options->image); ?>" class="img-fluid" alt="<?php echo e($item->name); ?>">
													</a>
												</div>
												<div class="info">
													<h3>
														<a title="<?php echo e($item->name); ?>" href="<?php echo e(route('home.single.product', $item->options->slug)); ?>">
															<?php echo e($item->name); ?>

															<?php if(!empty($item->options['attributes'])): ?>
																<span class="badge badge-success" style="color: #fff"><?php echo e($item->options['attributes']); ?></span>
															<?php endif; ?>
														</a>
													</h3>
													<span>Số lượng: <?php echo e($item->qty); ?></span>
												</div>
											</div>
											<div class="price"><?php echo e(number_format($item->qty * $item->price, 0, '.','.')); ?>đ</div>
										</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<style>
										.discount_amount {
											display: inline-flex;
											width: 100%;
											justify-content: space-between;
											align-items: center;
										}
										.discount_amount .amount{
											color: #d90000;
										}
										.discount_amount p{
											margin-bottom: 5px;
										}
									</style>
									<div class="discount_amount">
										
									</div>
									<div class="item">
										<div class="total">
											<p>Tổng thanh toán</p>
											<div class="price" id="price"><?php echo e(Cart::priceTotal()); ?>đ</div>
											<input type="hidden" id="base_price" value="<?php echo e(Cart::priceTotal()); ?>">
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


<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
	<script type="text/javascript" src="<?php echo e(asset('public/vendor/jsvalidation/js/jsvalidation.js')); ?>"></script>
	<?php echo $jsValidator->selector('#formsreviews'); ?>

	<script>
		jQuery(document).ready(function($) {
			$('#id_province').change(function(event) {
				id = $(this).val();
				$.get('<?php echo e(route('home.load.province')); ?>', { type : 'district', id : id  } , function(data) {
					$('#id_district').html(data);
				});
			});
			$('body').on('change', '#id_district', function(event) {
				id = $(this).val();
				$.get('<?php echo e(route('home.load.province')); ?>', { type : 'ward', id : id  } , function(data) {
					$('#id_ward').html(data);
				});
			});
		});
	</script>
	<script>
		function validateEmail($email) {
		  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		  return emailReg.test( $email );
		}
		jQuery(document).ready(function($) {
			$('.sent').click(function(event) {
				if($('#formsreviews').valid()){
					var email  = $('.email-cus');
					if(!validateEmail(email.val())){
						email.parent().removeClass('has-success').addClass('has-error');
						$('#email-error').text('Email phải là một địa chỉ email hợp lệ.');
					}else{
						$('#formsreviews').submit();
					}
				}
				event.preventDefault();
			});
		});
	</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\m\resources\views/frontend/pages/check-out.blade.php ENDPATH**/ ?>