 
<?php $__env->startSection('controller','Menu'); ?>
<?php $__env->startSection('controller_route', route('setting.menu')); ?>
<?php $__env->startSection('action','Chỉnh sửa'); ?>
<?php $__env->startSection('content'); ?>
	<div class="content">
		<div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
               	<?php echo $__env->make('backend.components.messages-error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<div class="row">
			        <div class="col-sm-12" style="padding-bottom: 30px; padding-top: 10px;">
			            <form action="<?php echo e(route('setting.menu.update')); ?>" method="POST">
			                <input type="hidden" id="nestable-output" name="jsonMenu">
			                <?php echo csrf_field(); ?>
			                <button class="btn btn-success" type="submit" style="">Cập nhật menu</button>
			                <button class="btn btn-info" data-toggle="modal" data-target="#addMenu" type="button">Thêm mới</button>
			            </form>
			        </div>
			        <div class="col-sm-12">
			            <div class="dd" id="nestable">
			                <ol class="dd-list">
			                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                        <?php if(empty($item->parent_id)): ?>
			                            <li class="dd-item" data-id="<?php echo e($item->id); ?>">
			                                <div class="dd-handle">
			                                    <?php echo e($item->title); ?> (<i><?php echo e($item->url); ?></i>)
			                                </div>
			                                <div class="button-group">
			                                    <a href="javascript:;" class="modalEditMenu" data-id="<?php echo e($item->id); ?>"> 
			                                        <i class="fa fa-pencil fa-fw"></i> Sửa
			                                    </a> &nbsp; &nbsp; &nbsp;
			                                    <a class="text-danger" href="<?php echo route('setting.menu.delete',$item['id']); ?>" onclick="return confirm('Bạn có chắc chắn xóa không ?')" title="Xóa"> <i class="fa fa-trash-o fa-fw"></i> Xóa</a>
			                                </div>
			                                <?php menuChildren($data, $item->id, $item ) ?>
			                            </li>
			                         <?php endif; ?>
			                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			                </ol>
			            </div>
			        </div>
			    </div>
			    <div class="modal" id="addMenu">
			        <div class="modal-dialog">
			            <div class="modal-content">
			                <div class="modal-header">
			                    <button type="button" class="close" data-dismiss="modal">&times;</button>
			                    <h4 class="modal-title">Thêm mới</h4>
			                </div>
			                <form action="<?php echo e(route('setting.menu.addItem', $id )); ?>" method="POST" class="frm_add">
			                    <div class="modal-body">
			                        <?php echo csrf_field(); ?>
			                        <fieldset class="form-group">
			                            <label>Tiêu đề</label>
			                            <input type="text" class="form-control" placeholder="Nhập tiêu đề" name="title" required>
			                        </fieldset>
			                        <div class="form-group">
	                        			<label for="">Icon ( Nêu có )</label>
				                        <div class="image">
				                            <div class="image__thumbnail " style="">
				                                <img src="<?php echo e(__IMAGE_DEFAULT__); ?>"
				                                     data-init="<?php echo e(__IMAGE_DEFAULT__); ?>">
				                                <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
				                                    <i class="fa fa-times"></i></a>
				                                <input type="hidden" value="" name="icon"/>
				                                <div class="image__button" onclick="fileSelect(this)">
				                                	<i class="fa fa-upload"></i>
				                                    Upload
				                                </div>
				                            </div>
				                        </div>
				                    </div>
			                        <fieldset class="form-group">
			                            <label>Đường đẫn</label><br>
			                            <label>Chỉ coppy phần bôi đỏ: <br>
			                                <?php echo e(url('/')); ?><span style="color: red; font-weight: bold;">/gioi-thieu</span>
			                            </label>
			                            <div class="input-group">
			                                <span class="input-group-addon"><?php echo e(url('/')); ?></span>
			                                <input type="text" class="form-control" placeholder="Nhập đường dẫn" name="url" required>
			                            </div>
			                        </fieldset>
			                        <fieldset class="form-group">
			                            <label>Loại trang</label>
			                            <select name="class" class="form-control">
			                                <option value="">Trang bình thường</option>
			                                <option value="page-product">Trang sản phẩm</option>
			                                 <option value="page-blog">Trang tin tức</option>
			                            </select>
			                        </fieldset>
			                    </div>
			                    <div class="modal-footer">
			                        <button type="submit" class="btn btn-success">Thêm mới</button>
			                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			                    </div>
			                </form>
			            </div>
			        </div>
			    </div>
			    <div class="modal" id="editMenu">
			        <div class="modal-dialog">
			            <div class="modal-content">
			                <div class="modal-header">
			                    <button type="button" class="close" data-dismiss="modal">&times;</button>
			                    <h4 class="modal-title">Sửa Menu</h4>
			                </div>
			                <form action="<?php echo e(route('setting.menu.editItem' )); ?>" method="POST" class="frm_add">
			                    <div class="modal-body">
			                        <?php echo csrf_field(); ?>
			                        <fieldset class="form-group">
			                            <label>Tiêu đề</label>
			                            <input type="text" class="form-control" id="editTitle" name="title" required >
			                            <input type="hidden" value="" id="id_menu" name="id">
			                        </fieldset>
			                         <div class="form-group">
	                        			<label for="">Icon ( Nêu có )</label>
				                        <div class="image">
				                            <div class="image__thumbnail " id="iconEdit">
				                                <img src="<?php echo e(__IMAGE_DEFAULT__); ?>" data-init="<?php echo e(__IMAGE_DEFAULT__); ?>">
				                                <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
				                                    <i class="fa fa-times"></i></a>
				                                <input type="hidden" value="" name="icon"/>
				                                <div class="image__button" onclick="fileSelect(this)">
				                                	<i class="fa fa-upload"></i>
				                                    Upload
				                                </div>
				                            </div>
				                        </div>
				                    </div>
			                        <fieldset class="form-group">
			                            <label>Đường đẫn</label>
			                            <input type="text" class="form-control" id="editUrl" name="url" required>
			                        </fieldset>
			                    </div>
			                    <div class="modal-footer">
			                        <button type="submit" class="btn btn-success">Sửa</button>
			                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			                    </div>
			                </form>
			            </div>
			        </div>
			    </div>
			    
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        jQuery(document).ready(function($) {
            var updateOutput = function(e){
                var list   = e.length ? e : $(e.target),
                    output = list.data('output');
                if (window.JSON) {
                    output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                    var param = window.JSON.stringify(list.nestable('serialize'));
                } else {
                    output.val('JSON browser support required for this demo.');
                }
            };
            $('#nestable').nestable({
                group: 3,
                maxDepth : 3
            }).on('change', updateOutput);
            updateOutput($('#nestable').data('output', $('#nestable-output')));
        });
        $('.modalEditMenu').click(function(event) {
			var id = $(this).attr("data-id");
            $.get('<?php echo e(asset('/backend/menu/edit-item/')); ?>/'+id, function(data) {
				if(data.status == "success"){
                	if(data.data.icon !=  null){
                		$('#iconEdit img').attr("src", data.data.icon);
                		$('#iconEdit input').val(data.data.icon);
                	}else{
                		$('#iconEdit img').attr("src", '<?php echo e(__IMAGE_DEFAULT__); ?>');
                		$('#iconEdit input').val("");
                	}
                    $('#editTitle').val(data.data.title);
                    $('#editUrl').val(data.data.url);
                    $('#id_menu').val(id);
                    $('#editMenu').modal('show')
                }
            });
        });
        $('.frm_add').on('submit', function(event) {
            string  = $(this).children().find('.url').val();
            substring  = '<?php echo e(url('/')); ?>';
            if(string.includes(substring) == true){
                $.alert({
                    title: 'Thông báo',
                    content: 'Bạn nhập sai định dạng URL',
                });
                return false;
            }
        });
    </script>
   
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gdigital\resources\views/backend/menu/menu-edit.blade.php ENDPATH**/ ?>