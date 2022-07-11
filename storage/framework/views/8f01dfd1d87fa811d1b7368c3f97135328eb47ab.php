 
<?php $__env->startSection('controller','Filter'); ?>
<?php $__env->startSection('controller_route', route('list-category-filter')); ?>
<?php $__env->startSection('action','Sắp xếp'); ?>
<?php $__env->startSection('content'); ?>
	<div class="content">
        <div class="clearfix"></div>
        <?php echo $__env->make('backend.components.messages-error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="box box-primary">
            <div class="box-body">
                <div class="col-sm-12">
                    <div class="dd" id="nestable">
                        <ol class="dd-list">
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="dd-item" data-id="<?php echo e($item->id); ?>">
                                    <div class="dd-handle">
                                        <?php echo e($item->name); ?>

                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" id="token">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function() {
            var updateOutput = function(e){
                var list   = e.length ? e : $(e.target),
                    output = list.data('output');
                if (window.JSON) {
                    output.val(window.JSON.stringify(list.nestable('serialize')));
                    var param = window.JSON.stringify(list.nestable('serialize'));
                    $.ajax({
                        url: '<?php echo e(route('sort.filter.update')); ?>',
                        type: 'POST',
                        data: {
                            _token : $('#token').val(),
                            jsonMenu: param
                        },
                    }).done(function() {
                            $.toast({
                            text: "Cập nhật thành công !",
                            heading: 'Thông báo',
                            icon: 'success',
                            showHideTransition: 'fade',
                            allowToastClose: true, // Boolean value true or false
                            hideAfter: 1000, 
                            stack: 5, 
                            position: 'top-right', 
                            textAlign: 'left',
                            loader: true,
                            loaderBg: '#9ec600',
                        });
                    })
                } else {
                    output.val('JSON browser support required for this demo.');
                }
            };
            $('#nestable').nestable({
                group: 1,
                maxDepth : 1
            }).on('change', updateOutput);
            updateOutput($('#nestable').data('output', $('#nestable-output')));
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\m\resources\views/backend/filter/sort.blade.php ENDPATH**/ ?>