<?php $id = isset($id) ? $id : (int) round(microtime(true) * 1000); ?>
<tr>
	<td class="index"><?php echo e($index); ?></td>
	<td>
		<input type="text" name="content[filter][<?php echo e($id); ?>][name]" class="form-control" value="<?php echo e(@$value->name); ?>">
	</td>
	<td>
		<select name="content[filter][<?php echo e($id); ?>][brand_id]" class="form-control">
			<?php $data = \App\Models\Categories::where('type', 'brand_category')->get(); ?>
			<?php if(count($data)): ?>
				<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($item->id); ?>" <?php echo e(@$value->brand_id == $item->id ? 'selected' : null); ?>><?php echo e($item->name); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>
		</select>
	</td>
    <td style="text-align: center;">
        <a href="javascript:void(0);" onclick="$(this).closest('tr').remove()" class="text-danger buttonremovetable" title="Xóa">
            <i class="fa fa-minus"></i>
        </a>
    </td>
</tr>
<?php /**PATH C:\xampp\htdocs\gdigital\resources\views/backend/repeater/row-filter-brand.blade.php ENDPATH**/ ?>