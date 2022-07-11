<?php $__env->startSection('controller', @$module['name']); ?>
<?php $__env->startSection('controller_route', route('brand.index') ); ?>
<?php $__env->startSection('action', 'Danh sách'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="btnAdd">
                    <a href="<?php echo e(route($module['module'].'.create')); ?>">
                        <button class="btn btn-primary"><i class="fa fa-plus"></i> Thêm</button>
                    </a>
                </div>
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="30px"><input type="checkbox" name="chkAll" id="chkAll"></th>
                            <th width="30px">STT</th>
                            <th>Tên thương hiệu</th>
                            <th>Liên kết</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><input type="checkbox" name="chkItem[]" value="<?php echo $item['id']; ?>"></td>
                                <td><?php echo e($loop->index + 1); ?></td>
                                <td><?php echo $item->name; ?></td>
                                <td><a href="<?php echo e(url('thuong-hieu/'.$item->slug)); ?>" target="_blank"><?php echo e(url('thuong-hieu/'.$item->slug)); ?></a></td>
                                <td>
                                    <div>
                                        <a href="<?php echo e(route('brand.edit', ['id'=> $item->id ])); ?>" title="Sửa">
                                            <i class="fa fa-pencil fa-fw"></i> Sửa
                                        </a> &nbsp; &nbsp; &nbsp;
                                          <a href="javascript:void(0);" class="btn-destroy" 
                                          data-href="<?php echo e(route( 'brand.destroy',  $item->id )); ?>"
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/gdigital/resources/views/backend/brand/list.blade.php ENDPATH**/ ?>