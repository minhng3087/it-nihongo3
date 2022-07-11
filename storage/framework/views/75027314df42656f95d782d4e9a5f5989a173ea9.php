
<div class="box-comment pt-50" id="content1">
	<?php if(count($errors) > 0): ?>
	  	<div class="alert alert-danger alert-dismissible">
	    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	    	<h4><i class="icon fa fa-ban"></i> Thông báo</h4>
	    	<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        	<li><?php echo $error; ?></li>
	     	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	  	</div>
	<?php endif; ?>
	<?php if($data->Comments->count()): ?>
		<div class="title-cmt"><?php echo e($data->Comments()->where('id_customers', '!=', '77')->where('content', '!=', null)->count()); ?> Bình luận</div>
		<div class="list-cmt">
			<?php $list_comments = $data->Comments()->active()->where('id_customers', '!=', '77')->where('content', '!=', null)->order()->where('parent_id', 0)->get(); ?>
			<?php if(count($list_comments)): ?>
				<?php $__currentLoopData = $list_comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="item">
						<div class="item-cmt">
							<div class="avarta"><img src="<?php echo e(__BASE_URL__); ?>/images/user.png" class="img-fluid" alt="user"></div>
							<div class="info">
								<?php if($item->type == 1): ?>
									<h5>
										<?php $userAdmin = \App\User::find($item->id_customers); ?>
										<?php if(!empty($userAdmin)): ?>
											<?php echo e($userAdmin->name); ?>

										<?php else: ?>
											Administrator
										<?php endif; ?>
										<span class="badge badge-success">Quản trị viên</span>
									</h5>
								<?php else: ?>
									<h5><?php echo e(@$item->Customers->name); ?></h5>
								<?php endif; ?>
								<div class="desc">
									<?php echo $item->content; ?>

									
								</div>
								<div class="date-btn">
									<ul class="list-inline">
										<li class="list-inline-item">
											<a title="" class="btn btn-primary reply-cmt" data-id="<?php echo e($item->id); ?>">Trả lời</a>
										</li>
										<li class="list-inline-item"><?php echo e($item->created_at->diffForHumans()); ?></li>
									</ul>
								</div>
							</div>
						</div>
						
						<?php renderCommentsFrontend($list_comments, $item, $data->id, $data) ?>
						<div class="action-cmt <?php echo e($item->id); ?>">
							<form action="<?php echo e(route('home.post.reply.comment', $data->id)); ?>" method="POST" enctype="multipart/form-data" class="form_reply <?php echo e($data->id); ?>">
								<?php echo csrf_field(); ?>
								
								<input type="hidden" name="cate"  value= <?php echo e($data->category()->first()->type == 'post_category' ? 'blog' : 'product'); ?>>
								<input type="hidden" name="parent_id" value="<?php echo e($item->id); ?>">
									<div class="item-box">
										<div class="form-group">
											<textarea name="content" required="" maxlength="300" cols="30" rows="10"><?php echo e($item->type == 0 ? '@'.$item->Customers->name : '@Quản trị viên'); ?>:</textarea>
										</div>
									</div>
									<div class="item-box item-box-per">
										<div class="info-percen">
											<p>Nhập thông tin của bạn</p>
											<ul class="list-inline">
												<li class="list-inline-item">
													<div class="gt">
														<div class="gt-rd">
															<input type="radio" id="gt-<?php echo e($item->id); ?>-1" name="gioitinh" value="1" checked>
															<label for="gt-<?php echo e($item->id); ?>-1">Anh</label>
														</div>
														<div class="gt-rd">
															<input type="radio" id="gt-<?php echo e($item->id); ?>-2" name="gioitinh" value="2">
															<label for="gt-<?php echo e($item->id); ?>-2">Chị</label>
														</div>
													</div>
												</li>
												<li class="list-inline-item">
													<div class="form-group">
														<input type="text" placeholder="Họ tên" class="inp-text" name="name" min="5" max="50" required="">
													</div>
													
												</li>
												<li class="list-inline-item">
													<div class="form-group">
														<input type="email" placeholder="Email" class="inp-text email_rp" name="email" required="">
													</div>
												</li>
												<li class="list-inline-item">
													<div class="form-group">
														<input type="phone" placeholder="phone" class="inp-text email_rp" name="phone">
													</div>
												</li>
											</ul>
										</div>
									</div>
									<input type="submit" value="Hoàn tất & gửi" class="btn-sent" >
							</form>
						</div>
						
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>
		</div>
	<?php endif; ?>
</div>

<?php /**PATH C:\xampp\htdocs\m\resources\views/frontend/comments/list-comments.blade.php ENDPATH**/ ?>