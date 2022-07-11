<?php $__env->startSection('controller','Đơn hàng'); ?>
<?php $__env->startSection('action','Cập nhật'); ?>
<?php $__env->startSection('controller_route', route('orders.index')); ?>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <form action="<?php echo e(route('orders.update', $data->id)); ?>" method="POST">
					<?php echo method_field('PUT'); ?>
                	<?php echo csrf_field(); ?>
                	<div class="row">
                		<div class="col-sm-2"></div>
                		<div class="col-sm-8">
                			<div class="row">
				                <div class="col-md-3"><label>Mã đơn hàng:</label></div>
				                <div class="col-md-9">
				                  	<a href="#"><?php echo '#ORDER_'.$data['id']; ?></a>
				                </div>
				            </div>
				            <div class="row">
				                <div class="col-md-3"><label>Tên người nhận:</label></div>
				                <div class="col-md-9">
				                  	<b><?php echo $data->Customers->name; ?></b>
				                </div>
				            </div>
				            <div class="row">
				                <div class="col-md-3"><label>Email:</label></div>
				                <div class="col-md-9">
				                  	<b><?php echo $data->Customers->email; ?></b>
				                </div>
				            </div>
				            <div class="row">
				                <div class="col-md-3"><label>Số điện thoại người nhận:</label></div>
				                <div class="col-md-9">
				                  	<b><?php echo $data->Customers->phone; ?></b>
				                </div>
				            </div>
				            <div class="row">
				                <div class="col-md-3"><label>Địa chỉ:</label></div>
				                <div class="col-md-9">
				                  	<b><?php echo $data->Customers->address; ?> - <?php echo e(getFullAddress($data->Customers->id_province, $data->Customers->id_district, $data->Customers->id_ward)); ?></b>
				                </div>
				            </div>
				            <div class="row">
				            	<div class="col-md-3"><label>Nội dung :</label></div>
				            	<div class="col-md-9">
				                  	<b><?php echo e($data->note); ?></b>
				                </div>
				            </div>
				            <div class="row">
				            	<div class="col-md-3"><label>Ngày đặt</label></div>
				            	<div class="col-md-9">
				                  	<b><?php echo e($data->created_at->format('d/m/Y H:i:s')); ?></b>
				                </div>
				            </div>
				            <div class="row">
				            	<div class="col-md-3"><label>Ngày nhận</label></div>
				            	<div class="col-md-9">
				                  	<b><?php echo e($data->status == 4 ? $data->updated_at->format('d/m/Y H:i:s') : "-----------"); ?></b>
				                </div>
				            </div>
				            <div class="row">
				            	<div class="col-md-3"><label>Tổng tiền :</label></div>
				            	<div class="col-md-9">
				                  	<b><?php echo e(number_format($data->subtotal_total)); ?>đ</b>
				                </div>
							</div>
				            <div class="row">
				            	<div class="col-md-3"><label>Hình thức thanh toán:</label></div>
				            	<div class="col-md-9">
				            		<?php if($data->type_pay == "COD"): ?>
				            			<label class="label label-success">Thanh toán khi nhận hàng</label>
				            		<?php else: ?>
										<label class="label label-success">Thanh toán</label>
				            		<?php endif; ?>
				                </div>
				            </div>
				            <div class="row">
				            	<div class="col-md-3"><label>Trạng thái:</label></div>
				            	<div class="col-md-9">
				                  	<?php if($data->status == 1): ?>
				                  		<span class="label label-warning"> Mới đặt</span>
				                  	<?php elseif($data->status == 2): ?>
										<span class="label label-primary"> Xác nhận</span>
									<?php elseif($data->status == 3): ?>
										<span class="label label-info"> Đang giao hàng</span>
									<?php elseif($data->status == 4): ?>
										<span class="label label-success"> Hoàn thành</span>
									<?php else: ?>
										<span class="label label-danger">Hủy</span>
				                  	<?php endif; ?>
				                  	<a href="javascript;;"  data-toggle="modal" data-target="#exampleModal" style="text-decoration: underline;">
				                  		Thay đổi trạng thái đơn hàng
				                  	</a>
				                  	<!-- Modal -->
									<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									    <div class="modal-dialog" role="document">
									        <div class="modal-content">
									        	<form action="<?php echo e(route('orders.update', $data->id)); ?>" method="POST">
													<?php echo method_field('PUT'); ?>
									        		<?php echo csrf_field(); ?>
										            <div class="modal-header">
										                <h5 class="modal-title" id="exampleModalLabel">Trạng thái</h5>
										                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										                    <span aria-hidden="true">&times;</span>
										                </button>
										            </div>
										            <div class="modal-body">
										                <div class="row">
										                	<div class="col-sm-3">
										                		<b>Chọn trạng thái:</b>
										                	</div>
										                	<div class="col-sm-9">
										                		<select class="form-control" name="status">
											                        <option value="1" <?php if($data['status'] == 1): ?> selected <?php endif; ?>>Mới đặt</option>
											                        <option value="2" <?php if($data['status'] == 2): ?> selected <?php endif; ?>>Xác nhận</option>
											                        <option value="3" <?php if($data['status'] == 3): ?> selected <?php endif; ?>>Đang giao hàng</option>
											                        <option value="4" <?php if($data['status'] == 4): ?> selected <?php endif; ?>>Hoàn thành</option>
											                        <option value="5" <?php if($data['status'] == 5): ?> selected <?php endif; ?>>Hủy</option>
											                    </select>
										                	</div>
										                </div>
										            </div>
										            <div class="modal-footer">
										                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										                <button type="submit" class="btn btn-primary">Lưu lại</button>
										            </div>
									            </form>
									        </div>
									    </div>
									</div>
				                </div>
				            </div>
				            <hr>
				            <h3 class="text-center">CHI TIẾT ĐƠN HÀNG</h3>
				            <table class="table table-bordered table-striped">
				            	<?php $total_product = 0; ?>
				                <thead>
				                    <tr>
				                        <th>STT</th>
				                        <th>Sản phẩm</th>
				                        <th>Hình ảnh</th>
				                        <th>Số lượng</th>
				                        <th>Đơn giá</th>
				                        <th>Thành tiền</th>
				                        <th>Quà tặng</th>
				                        
				                    </tr>
				                </thead>
				                <tbody>
				                    <?php if(!empty($data->OrderDetail)): ?>
				                        <?php $__currentLoopData = $data->OrderDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

				                            <tr>
				                                <td><?php echo e($loop->index + 1); ?></td>
				                                <td>
				                                    <?php echo e(@$item->products->name); ?> 
													<?php if(!empty($item->options)): ?>
														<label for="" class="label label-success"><?php echo e($item->options); ?></label>
													<?php endif; ?>
				                                    <br>
				                                    <?php if(!empty($item->product->deleted_at)): ?>
				                                        <label for="" class="label label-danger">Sản phẩm đã xóa</label>
				                                    <?php endif; ?>
				                                </td>
				                                <td>
				                                    <img src="<?php echo e($item->products->image); ?>" class="img-thumbnail" width="50px" alt="">
				                                </td>
				                                <td>
				                                    <?php echo e(@$item->product_quantity); ?>

				                                    <?php $total_product = $total_product + $item->product_quantity; ?>
				                                </td>
				                                <td>
				                                    <?php echo e(number_format($item->price)); ?>

				                                </td>
				                                <td>
				                                    <?php echo e(number_format($item->price_total)); ?>

				                                </td>
				                                
				                                <td>
				                                	<?php if(!empty($item->choice)): ?>
				                                		<?php $choice = json_decode( $item->choice ); ?>
				                                		<?php $__currentLoopData = $choice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				                                			<li><?php echo e($value); ?></li>
				                                		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				                                	<?php else: ?>
				                                	---
				                                	<?php endif; ?>
				                                </td>
				                            </tr>
				                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				                    <?php endif; ?>
				                </tbody>
			              	</table>
			              	<div class="row" style="font-size: 15px">
			              		<div class="col-sm-4"></div>
			              		<div class="col-sm-8">
			              			
									  <div class="row" style="margin-top: 10px">
										<div class="col-sm-6"><b>Tổng tiền khách phải trả </b> </div>
										<div class="col-sm-6"> <b><?php echo e(number_format($data->subtotal_total)); ?>đ</b></div>
									  </div>
			              		</div>
			              	</div>
			              	<hr>
                		</div>
                	</div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gdigital\resources\views/backend/orders/edit.blade.php ENDPATH**/ ?>