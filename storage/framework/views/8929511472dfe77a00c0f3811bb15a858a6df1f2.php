<?php $__env->startSection('controller', $module['name'] ); ?>
<?php $__env->startSection('controller_route', route($module['module'].'.index')); ?>
<?php $__env->startSection('action', renderAction(@$module['action'])); ?>
<?php $__env->startSection('content'); ?>
	<div class="content">
		<div class="clearfix"></div>
       	<?php echo $__env->make('backend.components.messages-error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       	<form action="<?php echo updateOrStoreRouteRender( @$module['action'], $module['module'], @$data); ?>" method="POST">
			<?php echo csrf_field(); ?>
			<?php if(isUpdate(@$module['action'])): ?>
		        <?php echo method_field('PUT'); ?>
		    <?php endif; ?>
			<div class="row">
				<div class="col-sm-9">
					<div class="nav-tabs-custom">
						<input type="hidden" name="active_tab" id="active_tab" value="">
		                <ul class="nav nav-tabs">
		                    <li class="<?php if(!session('active_tab') || session('active_tab')=='' || session('thong-tin')): ?> active <?php endif; ?>" data-tab="thong-tin">
		                        <a href="#activity" data-toggle="tab" aria-expanded="true">Thông tin</a>
		                    </li>
		                    <li <?php if(session('active_tab')=='phien-ban'): ?> class="active" <?php endif; ?> data-tab="phien-ban">
		                    	<a href="#vesions" data-toggle="tab" aria-expanded="true">Phiên bản</a>
		                    </li>
		                    <li <?php if(session('active_tab')=='thuoc-tinh'): ?> class="active" <?php endif; ?> data-tab="thuoc-tinh">
		                    	<a href="#attributes" data-toggle="tab" aria-expanded="true">Thuộc tính</a>
		                    </li>
		                    <?php if(isUpdate(@$module['action'])): ?>
		                    	<li <?php if(session('active_tab')=='qua-tang'): ?> class="active" <?php endif; ?> data-tab="qua-tang">
			                    	<a href="#gift" data-toggle="tab" aria-expanded="true">Quà tặng</a>
			                    </li>
		                    <?php endif; ?>
		                    <li  <?php if(session('active_tab')=='thu-vien-anh'): ?> class="active" <?php endif; ?> data-tab="thu-vien-anh">
		                    	<a href="#gallery" data-toggle="tab" aria-expanded="true">Thư viện ảnh</a>
		                    </li>
		                </ul>
		                <div class="tab-content">
		                    <div class="tab-pane  <?php if(!session('active_tab') || session('active_tab')=='' || session('active_tab')=='thong-tin'): ?> active <?php endif; ?>" id="activity">
		                    	<div class="row">
		                    		<div class="col-sm-12">
		                    			<div class="form-group">
				                    		<label for="">Tên sản phẩm</label>
				                    		<input type="text" name="name" id="name" class="form-control m" value="<?php echo e(old('name', @$data->name)); ?>">
				                    	</div>
										<?php if(isUpdate(@$module['action'])): ?>
			                                <div class="form-group" id="edit-slug-box">
			                                    <?php echo $__env->make('backend.products.permalink', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			                                </div>
		                                <?php else: ?>
											<div class="form-group">
												<label>Đường dẫn tĩnh</label>
												<input type="text" class="form-control" name="slug" id="slug" value="<?php echo old('slug', @$data->slug); ?>">
											</div>
										<?php endif; ?>

		                    		</div>
		                    		<div class="col-sm-6">
		                    			<div class="form-group">
				                    		<label for="">Giá bán</label>
				                    		<input type="number" name="regular_price" class="form-control" 
				                    		value="<?php echo e(old('regular_price', @$data->regular_price)); ?>">
				                    	</div>
		                    		</div>
		                    		<div class="col-sm-6">
		                    			<div class="form-group">
				                    		<label for="">Giá khuyến mại ( Nếu có )</label>
				                    		<input type="number" name="sale_price" class="form-control" 
				                    		value="<?php echo e(old('sale_price', @$data->sale_price)); ?>">
				                    	</div>
		                    		</div>
		                    		<div class="col-sm-6">
		                    			<div class="form-group">
		                    				<label for="">Giá ưu tiên (Nếu có)</label>
		                    				<input type="number" class="form-control" name="price_priority" value="<?php echo e(old("price_priority", @$data->price_priority)); ?>">
		                    			</div>
		                    		</div>
		                    		<div class="col-sm-6">
		                    			<div class="form-group">
		                    				<label for="">Thời gian áp dụng giá ưu tiên (Nếu có)</label>
		                    				<div class="input-group">
							                  	<div class="input-group-addon">
							                    	<i class="fa fa-calendar"></i>
							                  	</div>
							                  	<input type="text" class="form-control pull-right" id="reservation" name="time_priority">
							                </div>
		                    			</div>
		                    		</div>
		                    		<div class="col-sm-12">
		                    			<div class="form-group">
				                    		<label for="">Thương hiệu ( Nếu có )</label>
				                    		<select name="brand_id" class="form-control multislt">
				                    			<option value="">---Chọn thương hiệu---</option>
				                    			<?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				                    				<option value="<?php echo e($item->id); ?>" <?php echo e($item->id == @$data->brand_id ? 'selected' : null); ?> >
				                    					<?php echo e($item->name); ?>

				                    				</option>
				                    			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				                    		</select>
				                    	</div>
		                    		</div>
		                    		<div class="col-sm-12">
		                    			<div class="form-group">
		                    				<label for="">Mô tả ngắn</label>
		                    				<textarea class="form-control" rows="5" name="sort_desc"><?php echo e(old('sort_desc', @$data->sort_desc)); ?></textarea>
		                    			</div>
		                    			<div class="form-group">
		                    				<label for="">Mô tả</label>
		                    				<textarea class="content" name="content"><?php echo old('content', @$data->content); ?></textarea>
		                    			</div>
										<div class="form-group">
		                    				<label for="">Đánh giá</label>
		                    				<textarea class="content" name="evaluate"><?php echo old('evaluate', @$data->evaluate); ?></textarea>
		                    			</div>
		                    			<div class="form-group">
		                    				<label for="">Thông số kỹ thuật</label>
		                    				<textarea class="content" name="specifications"><?php echo old('specifications', @$data->specifications); ?></textarea>
		                    			</div>
		                    		</div>
		                    		<div class="col-sm-12">
		                    			<label for="">Dịch vụ bảo hành thêm</label>	
										<div class="repeater" id="repeater">
							                 <table class="table table-bordered table-hover">
							                    <thead>
								                    <tr>
								                    	<th style="width: 30px;">STT</th>
								                    	<th>Tiêu đề</th>
								                    	<th>Giá cộng thêm</th>
								                    	<th style="width: 30px;"></th>
								                    </tr>
							                	</thead>
							                    <tbody id="sortable">
							                    	<?php if(!empty($data->content_services_warranty)): ?>
							                    		<?php $services = json_decode( $data->content_services_warranty ); ?>
							                    		<?php if(!empty($services->services)): ?>
							                    			<?php $__currentLoopData = $services->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							                    				<?php $index = $loop->index + 1; ?>
							                    				<?php echo $__env->make('backend.repeater.row-products-services-warranty', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
							                    			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							                    		<?php endif; ?>
							                    	<?php endif; ?>
												</tbody>
							                </table>
							               	<div class="text-right">
							                    <button class="btn btn-primary" onclick="repeater(event,this,'<?php echo e(route('get.layout')); ?>','.index', 'products-services-warranty')">Thêm</button>
						                	</div>
							            </div>
						            </div>
		                    	</div>
		                    </div>
		                    <div class="tab-pane <?php if(session('active_tab')=='thu-vien-anh'): ?> active <?php endif; ?>" id="gallery">
		                    	<div class="row">
			                        <div class="col-sm-12 image">
			                        	<label for="">Hình ảnh chi tiết sản phẩm</label><br>
			                            <button type="button" class="btn btn-success" onclick="fileMultiSelect(this)"><i class="fa fa-upload"></i>  
			                                Chọn hình ảnh
			                            </button>
			                            <br><br>
			                            <div class="image__gallery">
			                            	<?php 
			                            		if(isUpdate(@$module['action'])){
			                            			$gallery = @$data->ProductImage()->where('type', 'more_image_product')->where('key_color_filter', null)->get();
			                            		}
			                            	?>
			                                <?php if(!empty($gallery)): ?>
			                                    <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                                        <div class="image__thumbnail image__thumbnail--style-1">
			                                            <img src="<?php echo e($item->image); ?>">
			                                            <a href="javascript:void(0)" class="image__delete" onclick="urlFileMultiDelete(this)">
			                                                <i class="fa fa-times"></i>
			                                            </a>
			                                            <input type="hidden" name="gallery[]" value="<?php echo e($item->image); ?>">
			                                        </div>
			                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			                                <?php endif; ?>
			                            </div>
			                        </div>
			                    </div>
		                    </div>
		                    <div class="tab-pane <?php if(session('active_tab')=='phien-ban'): ?> active <?php endif; ?>" id="vesions">
		                    	<div class="row">
					                <div class="col-sm-12">
										<div class="repeater" id="repeater">
							                 <table class="table table-bordered table-hover products-version">
							                    <thead>
								                    <tr>
								                    	<th style="width: 30px;">STT</th>
								                    	<th>Loại thuộc tính</th>
								                    	<th>Tên</th>
								                    	<th>Giá trị</th>
								                    	<th style="width: 30px;"></th>
								                    </tr>
							                	</thead>
							                    <tbody id="sortable">
							                    	<?php $ProductVersion = @$data->ProductVersion; ?>
							                    	<?php if(!empty($ProductVersion)): ?>
							                    		<?php $__currentLoopData = @$data->ProductVersion()->orderBy('id', 'ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							                    			<tr>
																<td class="index"><?php echo e($loop->index + 1); ?></td>
																<?php $product_attribute_types = \App\Models\ProductAttributeTypes::all(); ?>
																<td>
																	<select name="product_version[<?php echo e($loop->index + 1); ?>][id_product_attribute_types]" class="form-control">
																		<?php $__currentLoopData = $product_attribute_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																			<option value="<?php echo e($item->id); ?>" 
																				<?php echo e($attribute->id_product_attribute_types == $item->id ? 'selected' : null); ?>>
																				<?php echo e($item->name); ?>

																			</option>
																		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																	</select>
																</td>
																<td><input type="text" class="form-control" name="product_version[<?php echo e($loop->index + 1); ?>][key]" value="<?php echo e($attribute->key); ?>" required=""></td>
																<td><input type="number" class="form-control" name="product_version[<?php echo e($loop->index + 1); ?>][value]" required="" value="<?php echo e($attribute->value); ?>"></td>
															    <td style="text-align: center;">
															        <a href="javascript:void(0);" onclick="$(this).closest('tr').remove()" class="text-danger buttonremovetable" title="Xóa">
															            <i class="fa fa-minus"></i>
															        </a>
															    </td>
															</tr>
							                    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							                    	<?php endif; ?>
												</tbody>
							                </table>
							               	<div class="text-right">
							                    <button class="btn btn-primary" onclick="repeater(event,this,'<?php echo e(route('get.layout')); ?>','.index', 'products-version')">Thêm</button>
						                	</div>
							            </div>
						            </div>
		                    	</div>
		                    </div>
		                    <div class="tab-pane <?php if(session('active_tab')=='thuoc-tinh'): ?> active <?php endif; ?>" id="attributes">
		                    	<div class="row">
					                <div class="col-sm-12">
										<div class="repeater" id="repeater">
							                 <table class="table table-bordered table-hover">
							                    <thead>
								                    <tr>
								                    	<th style="width: 30px;">STT</th>
								                    	<th>Loại thuộc tính</th>
								                    	<th>Giá trị</th>
								                    	<th style="width: 30px;"></th>
								                    </tr>
							                	</thead>
							                    <tbody id="sortable">
							                    	<?php $productAttributes = @$data->ProductAttributes ?>
							                    	<?php if(!empty($productAttributes)): ?>
							                    		<?php $__currentLoopData = $productAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							                    			<tr>
																<td class="index"><?php echo e($loop->index + 1); ?></td>
																<?php $product_attribute_types = \App\Models\ProductAttributeTypes::all(); ?>
																<td>
																	<select name="product_attributes[<?php echo e($loop->index + 1); ?>][id_product_attribute_types]" class="form-control">
																		<?php $__currentLoopData = $product_attribute_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																			<option value="<?php echo e($item->id); ?>" 
																				<?php echo e($attribute->id_product_attribute_types == $item->id ? 'selected' : null); ?>>
																				<?php echo e($item->name); ?>

																			</option>
																		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																	</select>
																</td>
																<td><input type="text" class="form-control" name="product_attributes[<?php echo e($loop->index + 1); ?>][key]" value="<?php echo e($attribute->key); ?>" required=""></td>
															    <td style="text-align: center;">
															        <a href="javascript:void(0);" onclick="$(this).closest('tr').remove()" class="text-danger buttonremovetable" title="Xóa">
															            <i class="fa fa-minus"></i>
															        </a>
															    </td>
															</tr>
							                    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							                    	<?php endif; ?>
												</tbody>
							                </table>
							               	<div class="text-right">
							                    <button class="btn btn-primary" onclick="repeater(event,this,'<?php echo e(route('get.layout')); ?>','.index', 'products-attributes')">Thêm</button>
						                	</div>
							            </div>
						            </div>
		                    	</div>
		                    </div>
							<?php if(isUpdate(@$module['action'])): ?>
			                    <div class="tab-pane <?php if(session('active_tab')=='qua-tang'): ?> active <?php endif; ?>" id="gift">
			                    	<div class="row">
			                    		<div class="col-sm-12">
			                    			<div class="form-group">
			                    				<label for="">Mô tả khuyến mại</label>
			                    				<input type="text" class="form-control" name="title_desc_gift" value="<?php echo e(old('title_desc_gift', @$data->title_desc_gift )); ?>">
			                    			</div>
			                    			<div class="form-group row">
			                    				<div class="col-sm-12">
			                    					<label for="">Ngày kết thúc</label>
			                    					<div class="input-group date">
									                  	<div class="input-group-addon">
									                    	<i class="fa fa-calendar"></i>
									                  	</div>
									                  	<?php if(!empty($data->end_date_apply_gift)){
									                  		$end_date_apply_gift = \Carbon\Carbon::parse($data->end_date_apply_gift)->format('d/m/Y');
									                  	} ?>
														<input type="text" class="form-control pull-right datepicker" name="end_date_apply_gift" 
														value="<?php echo e(old('end_date_apply_gift', @$end_date_apply_gift )); ?>" readonly="" 
														style="background-color: #fff; opacity: 1">
									                </div>
			                    				</div>
			                    			</div>
			                    		</div>
			                    		<div class="col-sm-12">
											<div class="form-group">
												<a href="<?php echo e(route('product-gift.create', ['id'=> $data->id])); ?>" class="btn btn-primary">Thêm mới khuyến mại</a>
											</div>
											<table id="example1" class="table table-bordered table-striped table-hover">
							                    <thead>
							                        <tr>
							                            <th width="30px"><input type="checkbox" name="chkAll" id="chkAll"></th>
							                            <th width="30px">STT</th>
							                            <th>Mô tả</th>
							                            <th width="100px"> Thao tác</th>
							                        </tr>
							                    </thead>
							                    <tbody>
							                    	<?php $productsGift = \App\Models\ProductGift::where('id_product', $data->id)->orderBy('created_at', 'ASC')->get();  ?>
							                        <?php $__currentLoopData = $productsGift; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							                            <tr>
							                                <td><input type="checkbox" name="chkItem[]" value="<?php echo $item['id']; ?>"></td>
							                                <td><?php echo e($loop->index + 1); ?></td>
							                                <td><?php echo $item->desc; ?></td>
							                                <td>
							                                    <div>
							                                        <a href="<?php echo e(route('product-gift.edit', ['id'=> $item->id])); ?>?id=<?php echo e($data->id); ?>" title="Sửa">
							                                            <i class="fa fa-pencil fa-fw"></i> Sửa
							                                        </a> &nbsp; &nbsp;
							                                          <a href="javascript:void(0);" class="btn-destroy" 
							                                          data-href="<?php echo e(route( 'product-gift.destroy',  $item->id )); ?>"
							                                          data-toggle="modal" data-target="#confim">
							                                          <i class="fa fa-trash-o fa-fw"></i> Xóa
							                                        </a>
							                                    </div>
							                                </td>
							                            </tr>
							                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							                    </tbody>
							                </table>
							            </div>
			                    	</div>
			                    </div>
		                    <?php endif; ?>
		                   
		                   
		                </div>
		            </div>
				</div>
				<div class="col-sm-3">
					<div class="box box-success">
		                <div class="box-header with-border">
		                    <h3 class="box-title">Đăng sản phẩm</h3>
		                </div>
		                <div class="box-body">
		                    <div class="form-group">
		                        <label class="custom-checkbox">
		                        	<?php if(isUpdate(@$module['action'])): ?>
		                            	<input type="checkbox" name="status" value="1" <?php echo e(@$data->status == 1 ? 'checked' : null); ?>> Hiển thị
		                            <?php else: ?>
		                            	<input type="checkbox" name="status" value="1" checked> Hiển thị
		                            <?php endif; ?>
		                        </label>
								<label class="custom-checkbox">
									<?php if(isUpdate(@$module['action'])): ?>
		                            	<input type="checkbox" name="hot" value="1" <?php echo e(@$data->is_hot == 1 ? 'checked' : null); ?>> Nổi bật
		                            <?php else: ?>
		                            	<input type="checkbox" name="hot" value="1" checked> Nổi bật
		                            <?php endif; ?>
		                        </label>
		                        <label class="custom-checkbox">
									<?php if(isUpdate(@$module['action'])): ?>
										<input type="checkbox" name="is_flash_sale" value="1" <?php echo e(@$data->is_flash_sale == 1 ? 'checked' : null); ?>> Flash sale
									<?php else: ?>
		                            	<input type="checkbox" name="is_flash_sale" value="1" checked> Flash sale
		                            <?php endif; ?>
		                        </label>
								<label class="custom-checkbox">
									<?php if(isUpdate(@$module['action'])): ?>
										<input type="checkbox" name="is_new" value="1" <?php echo e(@$data->is_new == 1 ? 'checked' : null); ?>> Mới
									<?php else: ?>
		                            	<input type="checkbox" name="is_new" value="1" checked> Mới
		                            <?php endif; ?>
		                        </label>
		                        <label class="custom-checkbox">
									<?php if(isUpdate(@$module['action'])): ?>
										<input type="checkbox" name="is_apply_gift" value="1" <?php echo e(@$data->is_apply_gift == 1 ? 'checked' : null); ?>> Kích hoạt quà tặng
									<?php else: ?>
		                            	<input type="checkbox" name="is_apply_gift" value="1"> Kích hoạt quà tặng
		                            <?php endif; ?>
		                        </label> 
		                        <div class="form-group" style="margin-top: 10px">
		                        	<label for="">Số thứ tự trang khuyến mại</label>
		                        	<?php if(isUpdate(@$module['action'])){
										$orders = old('orders', @$data->order_sale_page);
									}else{
										$orders = old('orders', \App\Models\Products::where('is_flash_sale', 1)->count());
									} ?>
		                        	<input type="number" value="<?php echo e(@$orders); ?>" class="form-control" name="order_sale_page">
		                        </div>
		                    </div>
		                    <div class="form-group text-right">
		                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại sản phẩm</button>
		                    </div>
		                </div>
		            </div>
		            <div class="box box-success category-box">
		                <div class="box-header with-border">
		                    <h3 class="box-title">Danh mục sản phẩm </h3>
		                </div>
		                <div class="box-body checkboxlist">
		                	<?php 
		                        $category_list = [];
		                        if(!empty(@$data->category)){
		                           $category_list = @$data->category->pluck('id')->toArray();
		                        }
		                    ?>
		                    <?php if(!empty($categories)): ?>
		                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                            <?php if($item->parent_id == 0): ?>
		                                <label class="custom-checkbox">
		                                    <input type="checkbox" class="category" name="category[]" value="<?php echo e($item->id); ?>" <?php echo e(in_array( $item->id, $category_list ) ? 'checked' : null); ?>> <?php echo e($item->name); ?>

		                                 </label>
		                                 <?php checkBoxCategory( $categories, $item->id, $item, $category_list ) ?>
		                            <?php endif; ?>
		                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		                    <?php endif; ?>
		                </div>
		            </div>
		            <div class="box box-success">
		                <div class="box-header with-border">
		                    <h3 class="box-title">Ảnh sản phẩm</h3>
		                </div>
		                <div class="box-body">
		                    <div class="form-group" style="text-align: center;">
		                        <div class="image">
		                            <div class="image__thumbnail">
		                                <img src="<?php echo e(!empty(@$data->image) ? @$data->image : __IMAGE_DEFAULT__); ?>"
		                                     data-init="<?php echo e(__IMAGE_DEFAULT__); ?>">
		                                <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
		                                    <i class="fa fa-times"></i></a>
		                                <input type="hidden" value="<?php echo e(old('image', @$data->image)); ?>" name="image"/>
		                                <div class="image__button" onclick="fileSelect(this)">
		                                	<i class="fa fa-upload"></i>
		                                    Upload
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
				</div>
			</div>
		</form>
	</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
	<script src="<?php echo e(url('admin_assets/plugins/datetimepicker/bootstrap-datepicker.min.js')); ?>"></script>
	<script>
		jQuery(document).ready(function($) {
			$('#btn-ok').click(function(event) {
		        var slug_new = $('#new-post-slug').val();
		        var name = $('#name').val();
		        $.ajax({
		        	url: '<?php echo e(route('products.get-slug')); ?>',
		        	type: 'GET',
		        	data: {
		        		id: $('#idPost').val(),
		        		slug : slug_new.length > 0 ? slug_new : name,
		        	},
		        })
		        .done(function(data) {
		        	$('#change_slug').show();
			        $('#btn-ok').hide();
			        $('.cancel.button-link').hide();
			        $('#current-slug').val(data);
		        	cancelInput(data);
		        })
		    });
		});	
	</script>
	<script>
		jQuery(document).ready(function($) {
			$('.datepicker').datepicker({
				format: 'dd/mm/yyyy',
		      	autoclose: true
		    });
		});	
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
	<script>
		jQuery(document).ready(function($) {
			$('input[name="time_published"]').click(function(){
			   	if($(this).val() == 2){
			   		$('.time_published_value').show('slow/400/fast');
			   	}else{
			   		$('.time_published_value').hide('slow/400/fast');
			   	}
			});
			$('#reservation').daterangepicker({
		         autoUpdateInput: false,
		         "locale": {
		            "format": "DD-MM-YYYY",
		            "applyLabel": "Áp dụng",
		            "cancelLabel": "Hủy bỏ",
		            "daysOfWeek": [
		                "T2",
		                "T3",
		                "T4",
		                "T5",
		                "T6",
		                "T7",
		                "CN"
		            ],
		            "monthNames": [
		                "Tháng 1 - ",
		                "Tháng 2 - ",
		                "Tháng 3 - ",
		                "Tháng 4 - ",
		                "Tháng 5 - ",
		                "Tháng 6 - ",
		                "Tháng 7 - ",
		                "Tháng 8 - ",
		                "Tháng 9 - ",
		                "Tháng 10 - ",
		                "Tháng 11 - ",
		                "Tháng 12 - "
		            ]
		        }
		    });
		    $('#reservation').on('apply.daterangepicker', function(ev, picker) {
		        $(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
		    });
		    $('#reservation').on('cancel.daterangepicker', function(ev, picker) {
		        $(this).val('');
		    });
		    <?php 
		    	$time_priority = old("time_priority", @$data->time_priority)
		    ?>
		    <?php if(!empty($time_priority)): ?>
		    	<?php $time_priority = explode(' - ', $time_priority); ?>
		    	order = { order_sdate : "<?php echo e($time_priority[0]); ?>", order_edate : "<?php echo e($time_priority[1]); ?>" };
				jQuery( "#reservation" ).val( order.order_sdate + " - " + order.order_edate );
				jQuery( "#reservation" ).data('daterangepicker').startDate = moment( order.order_sdate, "DD-MM-YYYY" );
				jQuery( "#reservation" ).data('daterangepicker').endDate = moment( order.order_edate, "DD-MM-YYYY" );
				jQuery( "#reservation" ).data('daterangepicker').updateView();
				jQuery( "#reservation" ).data('daterangepicker').updateCalendars();
		    <?php endif; ?>
			$('.nav-tabs-custom li').on('click',function(){
				var tab_name = $(this).data('tab');
				$('#active_tab').val(tab_name);
			})
		});
	</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
	<link rel="stylesheet" href="<?php echo e(url('admin_assets/plugins/datetimepicker/bootstrap-timepicker.css')); ?>">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/gdigital/resources/views/backend/products/create-edit.blade.php ENDPATH**/ ?>