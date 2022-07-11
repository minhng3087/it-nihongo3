<?php $__env->startSection('controller', @$module['name'] ); ?>
<?php $__env->startSection('controller_route', route('category.index')); ?>
<?php $__env->startSection('action', 'Danh sách'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <?php echo $__env->make('backend.components.messages-error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="btnAdd">
                    <a href="<?php echo e(route($module['module'].'.create')); ?>">
                        <button class="btn btn-primary"><i class="fa fa-plus"></i> Thêm</button>
                    </a>
                </div>
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="chkAll" id="chkAll"></th>
                            <th>Danh mục</th>
                            <th>Số danh mục con</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php listCate($data); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/gdigital/resources/views/backend/category/list.blade.php ENDPATH**/ ?>