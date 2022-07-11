<?php $__env->startSection('controller','Trang'); ?>
<?php $__env->startSection('controller_route',route('pages.list')); ?>
<?php $__env->startSection('action','Danh sách'); ?>
<?php $__env->startSection('content'); ?>
	<div class="content">
		<div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
               	<?php echo $__env->make('backend.components.messages-error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               	<div class="nav-tabs-custom">
			        <ul class="nav nav-tabs">
			            <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Tất cả các trang</a></li>
			        </ul>
			    </div>

			    <div class="table-translate">
			        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default" >Thêm mới trang</button>
			        <table class="table table-hover">
			            <thead>
			                <tr>
			                    <th width="30px">STT</th>
			                    <th width="">Tên trang</th>
			                    <th width="">Liên kết</th>
			                    <th width="">Hành động</th>
			                </tr>
			            </thead>
			            <tbody class="table-body-pro">
			                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                    <tr>
			                        <td><?php echo e($loop->index + 1); ?></td>
			                        <td><?php echo e($item->name_page); ?></td>
			                        <td>
			                            <?php if(\Route::has($item->route)): ?>
			                                <a href="<?php echo e(route($item->route)); ?>" target="_blank">
			                                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>
			                                    Link: <?php echo e(route($item->route)); ?>

			                                </a>
			                            <?php else: ?>
			                            ---------------
			                            <?php endif; ?>
			                        </td>
			                        <td>
			                            <a href="<?php echo e(route('pages.build', ['page'=> $item->type ])); ?>" 
			                                class="btn btn-success btn-sm">
			                            <i class="fa fa-pencil fa-fw" aria-hidden="true"></i> Xây dựng trang</a>
			                        </td>
			                    </tr>
			                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			            </tbody>
			        </table>
			    </div>
			    <div class="modal fade" id="modal-default">
			        <form action="<?php echo e(route('pages.create')); ?>" method="POST">
			            <?php echo csrf_field(); ?>
			            <div class="modal-dialog">
			                <div class="modal-content">
			                    <div class="modal-header">
			                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                            <span aria-hidden="true">×</span></button>
			                        <h4 class="modal-title">Thêm mới</h4>
			                    </div>
			                    <div class="modal-body">
			                        <div class="form-group">
			                            <label for="">Tiêu đề</label>
			                            <input type="text" name="name_page" class="form-control">
			                        </div>
			                        <div class="form-group">
			                            <label for="">Type</label>
			                            <input type="text" name="type" class="form-control">
			                        </div>
			                        <div class="form-group">
			                            <label for="">Route</label>
			                            <input type="text" name="route" class="form-control">
			                        </div>
			                    </div>
			                    <div class="modal-footer">
			                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
			                        <button type="submit" class="btn btn-primary">Lưu lại</button>
			                    </div>
			                </div>
			            </div>
			        </form>
			    </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/gdigital/resources/views/backend/pages/list.blade.php ENDPATH**/ ?>