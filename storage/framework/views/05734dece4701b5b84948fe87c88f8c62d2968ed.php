<?php $__env->startSection('controller', $module['name'] ); ?>
<?php $__env->startSection('controller_route', route($module['module'].'.index')); ?>
<?php $__env->startSection('action', 'Danh sách'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <?php echo $__env->make('backend.components.messages-error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <form action="<?php echo route($module['module'].'.postMultiDel'); ?>" method="POST">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="btnAdd" style="display: none;">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn xóa không ?')">
                            <i class="fa fa-trash-o"></i> Xóa
                        </button>
                    </div>
                    <?php echo $__env->make('backend.components.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </form>

                <p style="color: red">Nhấn vào trạng thái để duyệt nhanh bình luận.</p>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(function() {
            $('#table-ajax').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    'url': '<?php echo route('contact.anyData'); ?>',
                },
                columns: [
                    {data: 'checkbox', name: 'checkbox'},
                    {data: 'DT_RowIndex',name: 'DT_RowIndex'},
                    <?php $__currentLoopData = $module['table']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        {data: '<?php echo e($key); ?>', name: '<?php echo e($key); ?>'},
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    {data: 'action', name: 'action'},

                ],
                'columnDefs': [{
                    'targets': [0, 1],
                    'orderable': false,
                    'searchable': false,
                    'checkboxes': {
                        'selectRow': true
                    }
                }],
                language: {
                    "sProcessing": "Đang xử lý...",
                    "sLengthMenu": "Xem _MENU_ mục",
                    "sZeroRecords": "Không tìm thấy dòng nào phù hợp",
                    "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                    "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
                    "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                    "sInfoPostFix": "",
                    "sSearch": "Tìm:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "Đầu",
                        "sPrevious": "Trước",
                        "sNext": "Tiếp",
                        "sLast": "Cuối"
                    }
                }
            });
        });

    </script>
    <script>
        jQuery(document).ready(function($) {
            $('body').on('click', '.activeq', function(event) {
                id = $(this).data('id');
                var btn = $(this);
                $.get('<?php echo e(route('contact.active')); ?>?id='+id, function(data) {
                    btn.html(data);
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/gdigital/resources/views/backend/contact/list.blade.php ENDPATH**/ ?>