	<footer>
		<div class="footer-top">
			<div class="container">
				<div class="content">
					<div class="row">
						<div class="col-md-4">
							<div class="item">
								<div class="logo"><a title="<?php echo e(@$site_info->site_title); ?>" href="<?php echo e(url('/')); ?>"><img src="<?php echo e(@$site_info->logo); ?>" class="img-fluid" alt="<?php echo e(@$site_info->site_title); ?>"></a></div>
								<div class="info">
									<div class="list-place">
										<?php echo @$site_info->col_footer_1->value; ?>

									</div>
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="item">
								<div class="title-ft"><?php echo @$site_info->col_footer_2->title; ?></div>
								<div class="info">
									<ul>
										<?php echo @$site_info->col_footer_2->value; ?>

									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="item">
								<div class="title-ft"><?php echo @$site_info->col_footer_3->title; ?></div>
								<div class="info">
									<ul> 
										<?php echo @$site_info->col_footer_3->value; ?>

									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="item">
								<div class="title-ft">Đăng ký nhận tin</div>
								<div class="info">
									<div class="desc">Đăng ký theo dõi chúng tôi để cập nhật những thông tin khuyến mãi mới nhất !</div>
									<div class="sent-mail">
										<input type="text" placeholder="Nhập email của bạn">
										<button><i class="fa fa-envelope"></i></button>
									</div>
								</div>
								<div class="social">
									<ul class="list-inline">
										<li class="list-inline-item"><a href=""><img src="<?php echo e(__BASE_URL_FRONTEND__); ?>/images/sc1.png" class="img-fluid" alt=""></a></li>
										<li class="list-inline-item"><a href=""><img src="<?php echo e(__BASE_URL_FRONTEND__); ?>/images/sc2.png" class="img-fluid" alt=""></a></li>
										<li class="list-inline-item"><a href=""><img src="<?php echo e(__BASE_URL_FRONTEND__); ?>/images/sc3.png" class="img-fluid" alt=""></a></li>
										<li class="list-inline-item"><a href=""><img src="<?php echo e(__BASE_URL_FRONTEND__); ?>/images/sc4.png" class="img-fluid" alt=""></a></li>
										<li class="list-inline-item"><a href=""><img src="<?php echo e(__BASE_URL_FRONTEND__); ?>/images/sc5.png" class="img-fluid" alt=""></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="reserved">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="left"><p><span>© GCO GROUP 2019.</span> All rights reserved</p></div>
					</div>
					<div class="col-md-8">
						<ul>
							<li><a href="index.php">Trang chủ</a></li>
							<li><a href="product.php">sản phẩm mới</a></li>
							<li><a href="product.php">Khuyến mãi</a></li>
							<li><a href="blog.php">blog</a></li>
							<li><a href="contact.php">liên hệ</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>
<!--Link js-->
<?php /**PATH C:\xampp\htdocs\gdigital\resources\views/frontend/layouts/footer.blade.php ENDPATH**/ ?>