<?php $id = isset($id) ? $id : (int) round(microtime(true) * 1000); ?>
<tr>
	<td class="index"><?php echo e($index); ?></td>
	<td>
		<div class="form-group">
			<label for="">Liên kết</label>
	       	<div class="image">
	           	<div class="image__thumbnail">
	               	<img src="<?php echo e(!empty($value->image) ?  $value->image : __IMAGE_DEFAULT__); ?>"  
	               		data-init="<?php echo e(__IMAGE_DEFAULT__); ?>">
	               	<a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
	                <i class="fa fa-times"></i></a>
	               	<input type="hidden" value="<?php echo e(@$value->image); ?>" name="content[banner_head][<?php echo e($id); ?>][image]"  />
	               	<div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
	           	</div>
	       	</div>
	   </div>
	</td>
	<td>
		<div class="form-group">
			<label for="">Liên kết</label>
			<input type="text" name="content[banner_head][<?php echo e($id); ?>][link]" value="<?php echo e(@$value->link); ?>" class="form-control" required="">
		</div>
		<div class="form-group">
			<label for="">Mô tả</label>
			<textarea class="form-control" rows="5" name="content[banner_head][<?php echo e($id); ?>][desc]" required=""><?php echo e(@$value->desc); ?></textarea>
		</div>
	</td>
    <td style="text-align: center;">
        <a href="javascript:void(0);" onclick="$(this).closest('tr').remove()" class="text-danger buttonremovetable" title="Xóa">
            <i class="fa fa-minus"></i>
        </a>
    </td>
</tr><?php /**PATH C:\xampp\htdocs\gdigital\resources\views/backend/repeater/row-banner-home-head.blade.php ENDPATH**/ ?>