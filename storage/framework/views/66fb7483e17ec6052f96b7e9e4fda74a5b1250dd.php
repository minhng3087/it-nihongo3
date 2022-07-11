<?php $__env->startSection('controller','Users'); ?>
<?php $__env->startSection('action','Danh sách'); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <?php echo $__env->make('backend.components.messages-error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="box-body">
          <div class="box-header">
            <a href="<?php echo e(route('backend.users.adduse')); ?>">
                <fa class="btn btn-primary"><i class="fa fa-plus"></i> Thêm tài khoản</fa>
            </a>
          </div>

          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center with_dieuhuong">Stt</th>
                <th>Loại tài khoản</th>
                <th>Tên tài khoản</th>
                <th>Tên người dùng</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    		      	<tr class="action-number">
    		      		<td class=""><?php echo e($k+1); ?></td>
                  <td><?php if($item->level==1): ?> Quản trị admin <?php elseif($item->level==3): ?> Quản trị viên <?php endif; ?></td>
    		      	  <td><?php echo $item->user_name; ?></td>
    		      	  <td><?php echo $item->name; ?></td>
    		      	  <td><?php echo $item->phone; ?></td>
    		      		<td><?php echo $item->email; ?></td>
    		      	    <td>
                    <?php if($item->status>0): ?>
                        <a href="backend/users/edituse?id=<?php echo e($item->id); ?>&hienthi=<?php echo e(time()); ?>" class="label label-success"><i class="fa fa-eye"></i> Tài khoản đang hoạt động</a>
                    <?php else: ?>
                      <a href="backend/users/edituse?id=<?php echo e($item->id); ?>&hienthi=<?php echo e(time()); ?>" class="label label-danger"><i class="fa fa-eye"></i> Đã Khóa tài khoản</a>
                    <?php endif; ?>
                  </td>
    		      		<td>
                    <a href="backend/users/edituse?id=<?php echo e($item->id); ?>" class="btn btn_edit">Chi tiết</a>
                    <a onClick="if(!confirm('Xác nhận xóa')) return false;" href="backend/users/<?php echo e($item->id); ?>/deleteuse" class="btn btn_del">Xóa</button></td>
    		      	</tr>
    		        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
         <?php echo e($data->links()); ?>

        </div><!-- /.box-body -->
      
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
<!------------------------------------------------------------------------->  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gdigital\resources\views/backend/users/listuse.blade.php ENDPATH**/ ?>