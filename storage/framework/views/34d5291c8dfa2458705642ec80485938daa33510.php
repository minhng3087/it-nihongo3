<?php $id = isset($id) ? $id : (int) round(microtime(true) * 1000); ?>
<tr>
	<td class="index"><?php echo e($index); ?></td>
	<td>
		<select name="content[category_moblie][<?php echo e($id); ?>][category_id]" class="form-control">
			<?php $categories = \App\Models\Categories::where('type','brand_category')->where('parent_id', null)->get(); ?>
			<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<option value="<?php echo e($item->id); ?>" <?php echo e($item->id == @$value->category_id ? 'selected' : null); ?>><?php echo e($item->name); ?></option>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</select>
	</td>
    <td style="text-align: center;">
        <a href="javascript:void(0);" onclick="$(this).closest('tr').remove()" class="text-danger buttonremovetable" title="Xóa">
            <i class="fa fa-minus"></i>
        </a>
    </td>
</tr><?php /**PATH C:\xampp\htdocs\gdigital\resources\views/backend/repeater/row-category-moblie.blade.php ENDPATH**/ ?>