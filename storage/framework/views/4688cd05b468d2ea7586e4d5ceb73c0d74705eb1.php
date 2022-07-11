<?php $__env->startSection('controller','Trang'); ?>
<?php $__env->startSection('controller_route',route('pages.list')); ?>
<?php $__env->startSection('action','Danh sách'); ?>
<?php $__env->startSection('content'); ?>
	<div class="content">
		<div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
               	<?php echo $__env->make('backend.components.messages-error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               	<form action="<?php echo e(route('pages.build.post',['page' => $data->type])); ?>" method="POST">
					<?php echo csrf_field(); ?>
					<input name="type" value="<?php echo e($data->type); ?>" type="hidden">

					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="">Trang</label>
								<input type="text" class="form-control" value="<?php echo e($data->name_page); ?>" disabled="">
				 				
								<?php if(\Route::has($data->route)): ?>
									<h5>
										<a href="<?php echo e(route($data->route)); ?>" target="_blank">
					                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>
					                        Link: <?php echo e(route($data->route)); ?>

					                    </a>
									</h5>
				                <?php endif; ?>
							</div>
							
						</div>
					</div>
					<div class="nav-tabs-custom">
				        <ul class="nav nav-tabs">

							<li class="active">
				            	<a href="#activity1" data-toggle="tab" aria-expanded="true">Banner</a>
				            </li>

							<li class="">
				            	<a href="#activity2" data-toggle="tab" aria-expanded="true">Danh mục sản phẩm</a>
				            </li>

							<li class="">
				            	<a href="#activity5" data-toggle="tab" aria-expanded="true">Banner - Đầu trang</a>
				            </li>

				            <li class="">
				            	<a href="#activity3" data-toggle="tab" aria-expanded="true">Banner - Giữa trang</a>
				            </li>

							<li class="">
				            	<a href="#activity6" data-toggle="tab" aria-expanded="true">Banner - Cuối trang</a>
				            </li>

				            <li class="">
				            	<a href="#activity4" data-toggle="tab" aria-expanded="true">Đối tác</a>
				            </li>

				        </ul>
				    </div>
				    <?php if(!empty($data->content)){
						$content = json_decode($data->content);

					} ?>
				    <div class="tab-content">

				    	<div class="tab-pane active" id="activity1">
				    		<div class="repeater" id="repeater">
				                <table class="table table-bordered table-hover banners">
				                    <thead>
					                    <tr>
					                    	<th style="width: 30px;">STT</th>
					                    	<th width="200px">Hình ảnh</th>
					                    	<th>Mô tả - Liên kết</th>
					                    	<th style="width: 20px"></th>
					                    </tr>
				                	</thead>
				                    <tbody id="sortable">
										<?php if(!empty($content->banner)): ?>
											<?php $__currentLoopData = $content->banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php $index = $loop->index + 1;?>
												<?php echo $__env->make('backend.repeater.row-banner-home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
				                    </tbody>
				                </table>
				                <div class="text-right">
				                    <button class="btn btn-primary" 
						            	onclick="repeater(event,this,'<?php echo e(route('get.layout')); ?>','.index', 'banner-home', '.banners')">Thêm
						            </button>
				                </div>
				            </div>
				    	</div>
				    	<div class="tab-pane" id="activity2">
				    		<div class="row">
				    			<div class="col-sm-4">
				    				<div class="repeater" id="repeater">
					    				<label for="">Chọn danh mục điện thoại</label>
					    				<table class="table table-bordered table-hover category-moblie">
						                    <thead>
							                    <tr>
							                    	<th style="width: 30px;">STT</th>
							                    	<th>Danh mục</th>
							                    	<th style="width: 20px"></th>
							                    </tr>
						                	</thead>
						                    <tbody id="sortable">
												<?php if(!empty($content->category_moblie)): ?>
													<?php $__currentLoopData = $content->category_moblie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<?php $index = $loop->index + 1;?>
														<?php echo $__env->make('backend.repeater.row-category-moblie', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<?php endif; ?>
						                    </tbody>
						                </table>
						                <div class="text-right">
						                    <button class="btn btn-primary" 
								            	onclick="repeater(event,this,'<?php echo e(route('get.layout')); ?>','.index', 'category-moblie', '.category-moblie')">Thêm
								            </button>
						                </div>
						            </div>
				    			</div>
				    			<div class="col-sm-4">
				    				<div class="repeater" id="repeater">
					    				<label for="">Chọn danh mục Laptop</label>
					    				<table class="table table-bordered table-hover category-laptop">
						                    <thead>
							                    <tr>
							                    	<th style="width: 30px;">STT</th>
							                    	<th>Danh mục</th>
							                    	<th style="width: 20px"></th>
							                    </tr>
						                	</thead>
						                    <tbody id="sortable">
												<?php if(!empty($content->category_laptop)): ?>
													<?php $__currentLoopData = $content->category_laptop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<?php $index = $loop->index + 1;?>
														<?php echo $__env->make('backend.repeater.row-category-laptop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<?php endif; ?>
						                    </tbody>
						                </table>
						                <div class="text-right">
						                    <button class="btn btn-primary" 
								            	onclick="repeater(event,this,'<?php echo e(route('get.layout')); ?>','.index', 'category-laptop', '.category-laptop')">Thêm
								            </button>
						                </div>
						            </div>
				    			</div>

								<div class="col-sm-4">
				    				<div class="repeater" id="repeater">
					    				<label for="">Chọn danh mục Tablet</label>
					    				<table class="table table-bordered table-hover category-tablet">
						                    <thead>
							                    <tr>
							                    	<th style="width: 30px;">STT</th>
							                    	<th>Danh mục</th>
							                    	<th style="width: 20px"></th>
							                    </tr>
						                	</thead>
						                    <tbody id="sortable">
												<?php if(!empty($content->category_tablet)): ?>
													<?php $__currentLoopData = $content->category_tablet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<?php $index = $loop->index + 1;?>
														<?php echo $__env->make('backend.repeater.row-category-tablet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<?php endif; ?>
						                    </tbody>
						                </table>
						                <div class="text-right">
						                    <button class="btn btn-primary" 
								            	onclick="repeater(event,this,'<?php echo e(route('get.layout')); ?>','.index', 'category-tablet', '.category-tablet')">Thêm
								            </button>
						                </div>
						            </div>
				    			</div>
				    		</div>
				    	</div>
				    	<div class="tab-pane" id="activity3">
				    		<div class="repeater" id="repeater">
				                <table class="table table-bordered table-hover banners-mid">
				                    <thead>
					                    <tr>
					                    	<th style="width: 30px;">STT</th>
					                    	<th width="200px">Hình ảnh</th>
					                    	<th>Mô tả - Liên kết</th>
					                    	<th style="width: 20px"></th>
					                    </tr>
				                	</thead>
				                    <tbody id="sortable">
										<?php if(!empty($content->banner_mid)): ?>
											<?php $__currentLoopData = $content->banner_mid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php $index = $loop->index + 1;?>
												<?php echo $__env->make('backend.repeater.row-banner-home-mid', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
				                    </tbody>
				                </table>
				                <div class="text-right">
				                    <button class="btn btn-primary" 
						            	onclick="repeater(event,this,'<?php echo e(route('get.layout')); ?>','.index', 'banner-home-mid', '.banners-mid')">Thêm
						            </button>
				                </div>
				            </div>
				    	</div>

						<div class="tab-pane" id="activity5">
				    		<div class="repeater" id="repeater">
				                <table class="table table-bordered table-hover banners-head">
				                    <thead>
					                    <tr>
					                    	<th style="width: 30px;">STT</th>
					                    	<th width="200px">Hình ảnh</th>
					                    	<th>Mô tả - Liên kết</th>
					                    	<th style="width: 20px"></th>
					                    </tr>
				                	</thead>
				                    <tbody id="sortable">
										<?php if(!empty($content->banner_head)): ?>
											<?php $__currentLoopData = $content->banner_head; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php $index = $loop->index + 1;?>
												<?php echo $__env->make('backend.repeater.row-banner-home-head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
				                    </tbody>
				                </table>
				                <div class="text-right">
				                    <button class="btn btn-primary" 
						            	onclick="repeater(event,this,'<?php echo e(route('get.layout')); ?>','.index', 'banner-home-head', '.banners-head')">Thêm
						            </button>
				                </div>
				            </div>
				    	</div>

						<div class="tab-pane" id="activity6">
				    		<div class="repeater" id="repeater">
				                <table class="table table-bordered table-hover banners-end">
				                    <thead>
					                    <tr>
					                    	<th style="width: 30px;">STT</th>
					                    	<th width="200px">Hình ảnh</th>
					                    	<th>Mô tả - Liên kết</th>
					                    	<th style="width: 20px"></th>
					                    </tr>
				                	</thead>
				                    <tbody id="sortable">
										<?php if(!empty($content->banner_end)): ?>
											<?php $__currentLoopData = $content->banner_end; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php $index = $loop->index + 1;?>
												<?php echo $__env->make('backend.repeater.row-banner-home-end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
				                    </tbody>
				                </table>
				                <div class="text-right">
				                    <button class="btn btn-primary" 
						            	onclick="repeater(event,this,'<?php echo e(route('get.layout')); ?>','.index', 'banner-home-end', '.banners-end')">Thêm
						            </button>
				                </div>
				            </div>
				    	</div>
				    	<div class="tab-pane" id="activity4">
				    		<div class="repeater" id="repeater">
				                <table class="table table-bordered table-hover partner">
				                    <thead>
					                    <tr>
					                    	<th style="width: 30px;">STT</th>
					                    	<th width="200px">Logo</th>
					                    	<th>Mô tả - Liên kết</th>
					                    	<th style="width: 20px"></th>
					                    </tr>
				                	</thead>
				                    <tbody id="sortable">
										<?php if(!empty($content->partner)): ?>
											<?php $__currentLoopData = $content->partner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php $index = $loop->index + 1;?>
												<?php echo $__env->make('backend.repeater.row-partner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
				                    </tbody>
				                </table>
				                <div class="text-right">
				                    <button class="btn btn-primary" 
						            	onclick="repeater(event,this,'<?php echo e(route('get.layout')); ?>','.index', 'partner', '.partner')">Thêm
						            </button>
				                </div>
				            </div>
				    	</div>


			           	<button type="submit" class="btn btn-primary">Lưu lại</button>
			        </div>
				</form>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gdigital\resources\views/backend/pages/layout/home.blade.php ENDPATH**/ ?>