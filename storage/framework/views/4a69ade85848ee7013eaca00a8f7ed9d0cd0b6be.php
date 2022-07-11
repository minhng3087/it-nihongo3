<?php $__env->startSection('controller','Cấu hình chung'); ?>
<?php $__env->startSection('action','Cập nhật'); ?>
<?php $__env->startSection('controller_route', route('backend.options.general')); ?>
<?php $__env->startSection('content'); ?>
	<div class="content">
        <div class="clearfix"></div>
		<?php echo $__env->make('backend.components.messages-error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<form action="<?php echo e(route('backend.options.general.post')); ?>" method="POST">
			<?php echo csrf_field(); ?>
				<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#activity" data-toggle="tab" aria-expanded="true">Thông tin chung</a>
					</li>
					<li class="">
						<a href="#activity3" data-toggle="tab" aria-expanded="true">Footer - Mạng xã hội</a>
					</li>
					
					<li class="">
						<a href="#activity4" data-toggle="tab" aria-expanded="true">Liên kết</a>
					</li>
				</ul>
				<div class="tab-content">

					<div class="tab-pane active" id="activity">
						<div class="row">
							<div class="col-lg-2">
								<div class="form-group">
									<label>Favicon</label>
									<div class="image">
										<div class="image__thumbnail">
											<img src="<?php echo e(!empty(@$content->favicon) ? @$content->favicon :  __IMAGE_DEFAULT__); ?>"  data-init="<?php echo e(__IMAGE_DEFAULT__); ?>">
											<a href="javascript:void(0)" class="image__delete" 
											onclick="urlFileDelete(this)">
											<i class="fa fa-times"></i></a>
											<input type="hidden" value="<?php echo e(@$content->favicon); ?>" name="content[favicon]"  />
											<div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-2">
								<div class="form-group">
									<label>Logo</label>
									<div class="image">
										<div class="image__thumbnail">
											<img src="<?php echo e(!empty(@$content->logo) ? @$content->logo :  __IMAGE_DEFAULT__); ?>"  data-init="<?php echo e(__IMAGE_DEFAULT__); ?>">
											<a href="javascript:void(0)" class="image__delete" 
											onclick="urlFileDelete(this)">
											<i class="fa fa-times"></i></a>
											<input type="hidden" value="<?php echo e(@$content->logo); ?>" name="content[logo]"  />
											<div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
										</div>
									</div>
								</div>
							</div>

						</div>

						<div class="row">
							
							<div class="col-sm-3">
								<div class="form-group">
									<label for="">Code Fanpages Facebook</label>
									<textarea name="content[code_facebook]" class="form-control" rows="10"><?php echo @$content->code_facebook; ?></textarea>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="">Code Google Analytics</label>
									<textarea name="content[google_analytics]" class="form-control" rows="10"><?php echo @$content->google_analytics; ?></textarea>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="">Script</label>
									<textarea name="content[script]" class="form-control" rows="10"><?php echo @$content->script; ?></textarea>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="">Hotline</label>
									<input type="text" class="form-control" name="content[hotline]" value="<?php echo e(@$content->hotline); ?>">
								</div>
								<div class="form-group">
									<label for="">Email nhận yêu cầu đặt hàng</label>
									<input type="email" class="form-control" name="content[email_admin]" value="<?php echo e(@$content->email_admin); ?>">
								</div>


							</div>
							
						</div>
					</div>

					<div class="tab-pane" id="activity2">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="">Tên website</label>
									<input type="text" class="form-control" name="content[site_title]"
									value="<?php echo e(@$content->site_title); ?>">
								</div>

								<div class="form-group">
									<label for="">Mô tả ngắn</label>
									<textarea class="form-control" rows="5" 
									name="content[site_description]"><?php echo e(@$content->site_description); ?></textarea>
								</div>

								<div class="form-group">
									<label for="">Meta keyword</label>
									<input type="text" class="form-control" name="content[site_keyword]"
									value="<?php echo e(@$content->site_keyword); ?>">
								</div>

							</div>
						</div>
					</div>
					
					<div class="tab-pane" id="activity3">
						<div class="row">
							<div class="col-sm-12">
								<div class="repeater" id="repeater">
									<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<th style="width: 30px;">STT</th>
												<th>Tên mạng xã hội</th>
												<th>Icon</th>
												<th>Liên kết</th>
												<th></th>
											</tr>
										</thead>
										<tbody id="sortable">
											<?php if(!empty(@$content->social)): ?>
												<?php $__currentLoopData = @$content->social; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<?php $index = $loop->index + 1;?>
													<?php echo $__env->make('backend.repeater.row-socials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										</tbody>
									</table>
									<div class="text-right">
										<button class="btn btn-primary" 
											onclick="repeater(event,this,'<?php echo e(route('get.layout')); ?>','.index', 'socials')">Thêm
										</button>
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-4">
										<label for="" style="text-align: center;display: block;">Cột 1 Footer</label>
										<div class="form-group">
											<label for="">Tiêu đề cột</label>
											<input type="text" class="form-control" value="<?php echo e(@$content->col_footer_1->title); ?>" name="content[col_footer_1][title]">
										</div>
										<div class="form-group">
											<label for="">Nội dung</label>
											<textarea class="content" name="content[col_footer_1][value]"><?php echo @$content->col_footer_1->value; ?></textarea>
										</div>
									</div>
								
									
									<div class="col-sm-4">
										<label for="" style="text-align: center;display: block;">Cột 3 Footer</label>
										<div class="form-group">
											<label for="">Tiêu đề cột</label>
											<input type="text" class="form-control" value="<?php echo e(@$content->col_footer_3->title); ?>" name="content[col_footer_3][title]">
										</div>
										<div class="form-group">
											<label for="">Nội dung</label>
											<textarea class="content" name="content[col_footer_3][value]"><?php echo @$content->col_footer_3->value; ?></textarea>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>

					<div class="tab-pane" id="activity4">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="">Link message</label>
									<input type="text" name="content[link][message]" class="form-control" value="<?php echo e(@$content->link->message); ?>">
								</div>
								<div class="form-group">
									<label for="">Link zalo</label>
									<input type="text" name="content[link][zalo]" class="form-control" value="<?php echo e(@$content->link->zalo); ?>">
								</div>
								<div class="form-group">
									<label for="">Link tin nhắn</label>
									<input type="text" name="content[link][orther]" class="form-control" value="<?php echo e(@$content->link->orther); ?>">
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<button class="btn btn-primary" type="submit">Lưu lại</button>
				</div>
			</div>
		</form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/gdigital/resources/views/backend/options/general.blade.php ENDPATH**/ ?>